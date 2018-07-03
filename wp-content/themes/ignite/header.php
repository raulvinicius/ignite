<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<?php if ( strpos( $_SERVER[ "REQUEST_URI" ], "frontend" ) ) : ?>

    <!-- 
        NÃO ESQUEÇA DE ADICIONAR UMA PÁGINA FRONTEND/"SUAPAGINA" NO PAINEL ADMIN 
        E DE ALTERAR OS PERMALINKS PARA "NOME DO POST"
    -->
    <?php $frontendUrl = "/frontend"; //variável usada nos urls dentro do ambiente de desenvolvimento frontend?>

<?php endif; ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--[if lt IE 7]>
      <html 
        xmlns='http://www.w3.org/1999/xhtml' 
        xmlns:og='http://ogp.me/ns#' 
        class="no-js lt-ie9 lt-ie8 lt-ie7" 
        lang="pt-br">
<![endif]-->
<!--[if IE 7]>
    <html 
        xmlns='http://www.w3.org/1999/xhtml' 
        xmlns:og='http://ogp.me/ns#' 
        class="no-js lt-ie9 lt-ie8" 
        lang="pt-br">
<![endif]-->
<!--[if IE 8]>
    <html 
        xmlns='http://www.w3.org/1999/xhtml' 
        xmlns:og='http://ogp.me/ns#' 
        class="no-js lt-ie9" 
        lang="pt-br">
<![endif]-->
<!--[if gt IE 8]><!-->
<html
    xmlns='http://www.w3.org/1999/xhtml'
    xmlns:og='http://ogp.me/ns#'
    class="no-js"
    lang="pt-br">
<!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo ( $post->post_name != '' ) ? get_the_title() . " | " : ""; ?>Ignite by Humano</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--[if IE]><link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico"><![endif]-->
        <link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.ico?<?php echo rand(0, 65165843); ?>">
        <link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/apple-touch-icon.png?<?php echo rand(0, 65165843); ?>">

        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.css?<?php echo rand(0, 65165843); ?>">
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/animate.css?<?php echo rand(0, 65165843); ?>">

        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap-theme.min.css?<?php echo rand(0, 65165843); ?>">
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css?<?php echo rand(0, 65165843); ?>">

        
        <!-- http://www.favicon-generator.org/ -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url') ?>/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url') ?>/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url') ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url') ?>/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url') ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php bloginfo('template_url') ?>/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#f7931e">
        <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#f7931e">


        <!-- PUBLICAÇÃO EM REDES SOCIAIS -->

        <!-- FACEBOOK -->
        <meta property='fb:admins' content='fanpagedofacebook' /> <!-- essa configuração diz ao Facebook que você é o administrador da fanpage -->
        <meta property='og:locale' content='pt_BR' />
        <meta property='og:locale:alternate' content='en_US' /> <!-- idiomas alternativos em que o site também pode estar disponível -->
        <meta property='og:title' content='<?php bloginfo('name') ?>' /> <!-- título interessante para a página (ex.: Conhecendo a equipe) -->
        <meta property='og:site_name' content='<?php bloginfo('name') ?>' /> <!-- nome do site (ex.: Empresa X) -->
        <meta property='og:description' content='<?php bloginfo('description') ?>' /> <!-- Descrição do conteúdo/site para intrigar os usuários (ex.: Fazendo o bem para o mundo), max: 200 caracteres -->
        <meta property='og:url' content='<?php bloginfo('url') ?>' />
<!--         <meta property='og:image' content='<?php bloginfo('template_url') ?>/img/imagem.png'/>
        <meta property='og:image:type' content="image/png">
        <meta property="og:image:width" content="800">
        <meta property="og:image:height" content="600"> -->
        <meta property='og:type' content='website' />
        <!-- caso o tipo seja um "ARTICLE" -->
        <!-- 
        <meta property="og:type" content="article">
        <meta property="article:author" content="Autor">
        <meta property="article:section" content="Tutoriais">
        <meta property="article:tag" content="Facebook, tags, og, open graph">
        <meta property="article:published_time" content="date_time">
         -->

        <!-- TWITTER -->
        <meta name='twitter:card' content='summary'> <!-- photo (para imagens), player (para vídeos), Summary (para todo o resto) -->
        <meta name='twitter:url' content='<?php bloginfo('url') ?>'>
        <meta name='twitter:title' content='' /> <!-- título interessante para a página (ex.: Conhecendo a equipe) -->
        <meta name='twitter:description' content='' /> <!-- Descrição do conteúdo/site para intrigar os usuários (ex.: Fazendo o bem para o mundo), max: 200 caracteres -->
        <meta name='twitter:image' content='<?php bloginfo('template_url') ?>/img/imagem.png'/> <!-- entre 60x60px e 120x120px -->

        <!-- GOOGLE+ -->
        <!-- Atualize a tag html para incluir os atributos itemscope e itemtype. -->
        <meta itemprop='name' content=''> <!-- nome ou título interessante para a página (ex.: Conhecendo a equipe) -->
        <meta itemprop='description' content=''>  <!-- Descrição do conteúdo/site para intrigar os usuários (ex.: Fazendo o bem para o mundo), max: 200 caracteres -->
        <meta itemprop='image' content='<?php bloginfo('template_url') ?>/img/imagem.png'/> <!-- entre 60x60px e 120x120px -->


    </head>

    <body>
        <?php wp_path_to_js(); ?>

        <!--[if lt IE 8]>

            <div class="alert">

                <p class="browserupgrade">Você está usando um navegador <strong>desatualizado</strong>. Por favor, <a href="http://browsehappy.com/">atualize seu browser</a> para melhorar sua experiência na internet.</p>
                <button type="button" class="close">×</button>

            </div>

        <![endif]-->


        
