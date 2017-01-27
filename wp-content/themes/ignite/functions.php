<?php 

// CUSTOM POST

/*function codex_custom_init() {
	$labelsAcomodacoes = array(
		'name' => _x('Acomodações', 'nome plural do tipo de post'),
		'singular_name' => _x('Acomodação', 'nome singular do tipo de post'),
		'add_new' => _x('Adicionar Acomodação', 'acomodacoes'),
		'add_new_item' => __('Adicionar Acomodação'),
		'edit_item' => __('Editar Acomodação'),
		'new_item' => __('Nova Acomodação'),
		'all_items' => __('Todas as Acomodações'),
		'view_item' => __('Ver Acomodação'),
		'search_items' => __('Procurar por Acomodação'),
		'not_found' =>  __('Nenhuma Acomodação foi encontrada'),
		'not_found_in_trash' => __('Não há Acomodações na lixeira'), 
		'parent_item_colon' => '',
		'menu_name' => 'Acomodações'

	);
	$argsAcomodacoes = array(
		'labels' => $labelsAcomodacoes,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 5,
	    //'taxonomies' => array('nome-da-taxonomy') //DESCOMENTAR CASO TENHA CRIADO UMA TAXONOMY PARA ESSE "POST TYPE"
		'supports' => array( 'title' )
	); 
	register_post_type('acomodacoes',$argsAcomodacoes);
}
add_action( 'init', 'codex_custom_init' );
*/



/*
//ADD CUSTOM TAXONOMY
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() 
{

	// PARA VÁRIAS TAXONOMIES, DUPLIQUE ESSE BLOCO
	register_taxonomy(
	    'nome-da-taxomomy',
	    'object-type', //NOME(S) TO "POST TYPE(S)" LIGADO(S) À ESSA TAXONOMY. 
	    array(
	        'hierarchical' => true, //TRUE = CATEGORIA | FALSE = TAG
	        'label' => 'Label da Taxonomia',
	        'query_var' => true,
	        'rewrite' => false
	    )
	);


}
*/




// CUSTOM IMAGE SIZE
/*
if ( function_exists( 'add_image_size' ) ) 
{
	add_image_size( 'foto-destaque', 360, 300, true );
	add_image_size( 'zoom-destaque', 240, 300, true );
	add_image_size( 'tb-lista', 220, 215, true );
	add_image_size( 'tb-foto', 102, 100, true );
	add_image_size( 'foto', 470, 460, true );
}
*/


function get_post_by_type($type, $meta_key = NULL, $order = 'DESC', $per_page = -1, $paged = NULL)
{
	$args = array();
	if (!isset( $paged ) )
	{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	if (isset( $meta_key ) )
	{
		$args['meta_key'] = $meta_key;
		$args['orderby'] = 'meta_value_num';
	}

	$args = array(
		'post_type'			=>		$type,
		'posts_per_page' 	=>		$per_page,
		'paged'			 	=>		$paged,
		'order'				=>		$order
	);

	return new WP_Query( $args );
}


// ALTERA O COMPORTAMENTO DO TITLE FIELD
function change_default_title( $title ){

    $screen = get_current_screen();

	// ALTERAR O PLACEHOLDER DO TITLE FIELD
    if ( 'depoimentos' == $screen->post_type )
    {
        $title = 'Autor do depoimento';
    }

    // ESCONTE O TITLE FIELD DE POST EDITS DO TIPO PÁGINA
	/*
    if ( 'page' == $screen->post_type )
    {
    ?>
	    <style class="euquero" type="text/css">
	    <!--
	    #post-body-content
	    {
	    	margin-bottom: 0;
	    }
	    #titlediv
	    {
	        display: none;
	    }
	    -->
	    </style>
    <?php
    }
	*/

    return $title;
}

add_filter( 'enter_title_here', 'change_default_title' );


function wp_path_to_js()
{
	echo "
	    <script class='segredo' type=\"text/javascript\">

	        templateUrl = '" . get_bloginfo('template_url') . "/';
	        blogUrl = '" . get_bloginfo('url') . "/';

	    </script>
	";
}

function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}

function pluralize ($num, $plural = 's', $single = '')
{ 
    if ($num == 1) :
    	return $single; 
 	else :
 		return $plural; 
 	endif;
}


// ADICIONA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		echo get_bloginfo('url') . $urlAdicional;
	}
}

// RETORNA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function get_completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		return get_bloginfo('url') . $urlAdicional;
	}
}
