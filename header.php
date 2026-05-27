<!DOCTYPE html>
<html lang="en">
    <head>
		<?php /* old code
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TKSRPFW');</script>
		<!-- End Google Tag Manager -->
		*/ ?>
	
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://sst.roardigitalmarketing.co.uk/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TKSRPFW');</script>
		<!-- End Google Tag Manager -->
		
        <meta charset="utf-8" />
        <title><?php wp_title(); ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        <link href="<?php bloginfo('template_directory'); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- Google Font Below -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@500&display=swap" rel="stylesheet"> 
        <?php wp_head(); ?>
        <?php if( get_field('analytics_header_code', 'option') ):  echo get_field('analytics_header_code', 'option'); endif; ?>		
		<meta name="facebook-domain-verification" content="pi5domk47d249agkwsqd3xhvcrxawg" />
    </head>
	<body <?php body_class('no-fouc'); ?>>  
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKSRPFW"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php  get_template_part( 'tpl/header/header' ); ?>