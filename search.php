<?php 
    get_header(); if ( have_posts() ) :
        get_template_part( 'tpl/search/search');
    else :
        get_template_part( 'tpl/search/search', 'none' );
    endif;  
    get_footer(); 
?>