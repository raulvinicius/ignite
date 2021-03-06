$(document).ready(function() {


	$( window ).scroll(function() 
	{
		setTimeout(showInAnimation,400);

		if( $(window).scrollTop() > 200 )
		{
			$('.go-top').addClass('up');
		}
		else
		{
			$('.go-top').removeClass('up');
		}
	});
	$( window ).trigger('scroll');


	$( window ).resize(function(e) 
	{

		//-----------------FULL HEIGHT-----------------//

		//usa data-offset-fh (em px ou em %) para descontar o valor da altura total da tela
		$('.full-h').each(function() {
			$(this).css('height', 'auto')
			var offset = 0;
			var unit = 'px'
			if( $(this).attr('data-offset-fh') != undefined )
			{
				offset = $(this).attr('data-offset-fh');
			}

			if( $(this).attr('data-offset-fh').indexOf('%') >= 0 )
			{
				unit = '%';
			}
			console.log(unit);

			if( unit == 'px')
			{
				$(this).height($(window).height() - parseInt(offset));
			}
			else
			{
				$(this).height($(window).height() - ($(window).height() * (parseInt(offset) / 100) ) );
			}
		});

		
		if( window.innerWidth < 768 )
		{
			$('.full-h-xs').height($(window).height());
		}

		if( window.innerWidth >= 768 )
		{
			$('.full-h-sm').height($(window).height());
		}
		
		if( window.innerWidth >= 992 )
		{
			$('.full-h-md').height($(window).height());
		}

		if( window.innerWidth >= 1200 )
		{
			$('.full-h-lg').height($(window).height());
		}

		//-----------------FULL HEIGHT-----------------//


	});
	$( window ).trigger('resize');


	$('.go-top').on('click', function() {
		$("html, body").animate({scrollTop: 0}, 800);
	});


	//-----------------MASONRY-----------------//
/*
	var grid = $('.grid').masonry({
	  // options
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-item'
	});

	function callMasonry ()
	{
		grid.masonry();
	}
	
	setInterval( callMasonry, 2000 );
*/
	//-----------------MASONRY-----------------//




	//-----------------PARALLAXES-----------------//
	$('.bg-parallax')
	.css('background-attachment', 'fixed')
	.each(function(){
		var $obj = $(this);

		$(window).scroll(function() {

			var yPos = -($obj.offset().top +( $(window).scrollTop() / $obj.data("speed"))); 
	 
			var bgpos = '50% '+ yPos + 'px';
	
			$obj.css({
				'-ms-background-position-y': yPos, 
				'background-position-y': yPos, 
			});
	 
		}); 
	});
	//-----------------PARALLAXES-----------------//
	
	


	$( 'body' ).on( 'click', 'button.dead', function(){ return false; } );
	
	if( $( '#map-canvas' ).length > 0 )
	{
		initializeMap();
	}


	$('.segredo').remove();


	$( '.telefone' ).mask('(00) 0000 0000', {placeholder: "(__) ____ ____"});
	//incluindo o nono dígito
	var maskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '00 00000 0000' : '00 0000 00009';
	}

	options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(maskBehavior.apply({}, arguments), options);
		},
		placeholder: "__ ____ ____"
	};
	 
	$('.celular').mask(maskBehavior, options);
	$( '.data' ).mask('00/00/0000', {placeholder: "__/__/____"});


	$('form.js').submit(function(e){return false;e.preventDefault();});

	$('form.js input[type="submit"]').bind('click', 
		function()
		{
			$(this).closest('form').validate({
				submitHandler: function(form)
				{

					$(form).find('#success').hide();
					$(form).find('#error').hide();
					$(form).find('.form-text').hide();
					$(form).find('fieldset').hide();
					$(form).find('.form-text').hide();
					$(form).find('input[type=submit]').hide();

					$(form).find('#process').show();

					$(form).ajaxSubmit({
						type: 'post',
						success: contatoOk
					});

				}, 
				rules: {
					nm: {
						required: true
					},
					ml: {
						email: true,
						required: true
					},
					msgm: {
						required: true
					}
				},
				messages: {
					nm: {
						required: 'Campo obrigatório'
					},
					ml: {
						email: 'E-mail inválido',
						required: 'Campo obrigatório'
					},
					msgm: {
						required: 'Deixe sua mensagem'
					}
				}
			});
		}
	)

	$('.alert button').bind('click', function()
	{
		$(this).closest('.alert').hide();
	})

}); //end $(document).ready

function contatoOk (data)
{
	console.log($(this));
	console.log(data);

	$('#contato #process').hide();
	$('#contato form fieldset').show();
	$('#contato form .form-text').show();
	$('#contato form input[type=submit]').show();


	if( data == 'sucesso')
	{
		$('#contato form #success').show();
		$('#contato form')[0].reset();
	}
	else
	{
		$('#contato form #error').show();
	}

}

function URLize (s) 
{
    var r=s.toLowerCase();
    r = r.replace(new RegExp(/\s/g),"");
    r = r.replace(new RegExp(/[àáâãäå]/g),"a");
    r = r.replace(new RegExp(/æ/g),"ae");
    r = r.replace(new RegExp(/ç/g),"c");
    r = r.replace(new RegExp(/[èéêë]/g),"e");
    r = r.replace(new RegExp(/[ìíîï]/g),"i");
    r = r.replace(new RegExp(/ñ/g),"n");                
    r = r.replace(new RegExp(/[òóôõö]/g),"o");
    r = r.replace(new RegExp(/œ/g),"oe");
    r = r.replace(new RegExp(/[ùúûü]/g),"u");
    r = r.replace(new RegExp(/[ýÿ]/g),"y");
    r = r.replace(new RegExp(/\W/g),"");
    return r;
};

function pluralize (s, p, n)
{
	if( n != 1)
	{
		return p;
	}
	else
	{
		return s;
	}
}

function initializeMap()
{

	var myLatLgn = new google.maps.LatLng( -16.675207,-49.260501 );

	var mapCanvas = document.getElementById( 'map-canvas' );
	var mapOptions = {
		center: myLatLgn,
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		backgroundColor: '7030a0',
		scrollwheel: false
	}
	var map = new google.maps.Map( mapCanvas, mapOptions );

	var marker = new google.maps.Marker({
	    position: myLatLgn,
	    map: map,
	    title:"Hello World!"
	});

}

function showInAnimation () 
{

	$('.hided').each(function()
	{
		if( $( window ).scrollTop() + ( $( window ).height() * 0.8 ) > $(this).offset().top - 300 )
		{
			$(this).addClass('appeared').removeClass('hided');
		}
	})
}
