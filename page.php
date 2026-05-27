<?php 
    get_header();
	while ( have_posts() ) : the_post();
        get_template_part( 'tpl/pages/page' );  
	endwhile; 
    get_footer();  
?>