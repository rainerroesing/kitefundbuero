<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <meta name="author" content="">
  <meta property="og:image" content="<?php bloginfo('template_directory');?>/images/kfbpreview.jpg" />

  <title><?php echo get_bloginfo( 'name' ); ?></title>

  <!-- Bootstrap -->
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Custom -->
  <link href="<?php bloginfo('template_directory');?>/css/custom.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5630249313168021"
       crossorigin="anonymous"></script>

  <?php wp_head();?>
</head>

<body>


<div class="jumbotron">
  <div class="imageback"></div>
  <div class="gradientback"></div>

  <div class="container text-center">

    <!--<div class="fb-like" data-href="https://facebook.com/kitelostandfound" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>-->

    <div class="text-center col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
      <div class="logo">

          <a href="<?php bloginfo('wpurl');?>">
            <img src="<?php bloginfo('template_directory');?>/images/logo.svg" alt="logo">  </a>



          </div>
        </div>



        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <?php get_search_form(); ?>
          </div>
        </div>

      </div><!-- container -->

      <div class="text-center">
        <?php wp_nav_menu( array(
          'theme_location' => 'mainmenu',
          'container_class' => 'mainmenuclass' ) ); ?>
        </div>

      </div><!-- jumbotron -->
