<?php 
    get_header(); 
    if ( have_posts() ) :
        get_template_part( 'tpl/posts/posts' );
    else :
        get_template_part( 'tpl/posts/posts', 'none' );
    endif;  
    get_footer(); 
?>