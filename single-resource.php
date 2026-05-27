<?php
    get_header(); 
    while ( have_posts() ) : the_post();
        get_template_part( 'tpl/posts/resources', 'single' ); 
    endwhile; 
    get_footer(); 
?>