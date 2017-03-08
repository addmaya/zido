<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '-' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Paramount Images is a dynamic photography studio based in Uganda, Kampala specialising in Weddings and Engagements.">
		<meta property="og:url" content="<?php echo get_permalink();?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name');?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php echo get_the_title(); ?>"/>
		<meta property="og:description" content="Paramount Images is a dynamic photography studio based in Uganda, Kampala specialising in Weddings and Engagements." />
		<meta property="og:image" content="<?php $seo_img = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'full'); if($seo_img){echo $seo_img;} else{echo get_stylesheet_directory_uri().'/images/dummy-1.jpg';} ?>"/>

		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto+Condensed:700|Source+Code+Pro" rel="stylesheet">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v0.901" rel="stylesheet">		
		<?php wp_head(); ?>
	</head>
	<body class="is-booting">