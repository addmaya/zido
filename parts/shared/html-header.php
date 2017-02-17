<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto+Condensed:700|Source+Code+Pro" rel="stylesheet">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">

		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/vendors.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/app.js"></script>
		
		<?php wp_head(); ?>
	</head>
	<body class="is-booting <?php 
		if(is_front_page()){echo 't-home';}
		if(is_page('team')){echo 't-team';}
		if(is_page('weddings')){echo 't-weddings';}
		if(is_page('engagements')){echo 't-engagements';}
		if(is_page('video')){echo 't-video';}
		if(is_single()){echo 't-single';}
		?>">