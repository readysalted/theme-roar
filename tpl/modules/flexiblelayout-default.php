<?php
if( have_rows('flexible_layout') ):
    while ( have_rows('flexible_layout') ) : the_row();
        
        if( get_row_layout() == 'standard_content' ): ?>
            <?php get_template_part('tpl/modules/content', 'standardcontent'); ?>
        <?php endif;
        if( get_row_layout() == 'latest_news' ): ?>
            <?php get_template_part('tpl/modules/content', 'latestnews'); ?>
        <?php endif;
        if( get_row_layout() == 'brand_slider' ): ?>
            <?php get_template_part('tpl/modules/content', 'brandslider'); ?>
        <?php endif;
        if( get_row_layout() == 'numbered_column_content' ): ?>
            <?php get_template_part('tpl/modules/content', 'numberedcolumncontent'); ?>
        <?php endif;
        if( get_row_layout() == 'boxed_content_with_logos' ): ?>
            <?php get_template_part('tpl/modules/content', 'boxedcontentwithlogos'); ?>
        <?php endif;
        if( get_row_layout() == 'content_&_circular_list' ): ?>
            <?php get_template_part('tpl/modules/content', 'contentcircularlist'); ?>
        <?php endif;
        if( get_row_layout() == 'tabbed_content' ): ?>
            <?php get_template_part('tpl/modules/content', 'tabbedcontent'); ?>
        <?php endif;
        if( get_row_layout() == 'value_hover_tiles' ): ?>
            <?php get_template_part('tpl/modules/content', 'valuehovertiles'); ?>
        <?php endif;
        if( get_row_layout() == 'faqs' ): ?>
            <?php get_template_part('tpl/modules/content', 'faqs'); ?>
        <?php endif;
        if( get_row_layout() == 'boxed_content_with_side_image' ): ?>
            <?php get_template_part('tpl/modules/content', 'boxedcontentwithsideimage'); ?>
        <?php endif;
        if( get_row_layout() == 'testimonials' ): ?>
            <?php get_template_part('tpl/modules/content', 'testimonials'); ?>
        <?php endif;
        if( get_row_layout() == 'alternating_content' ): ?>
            <?php get_template_part('tpl/modules/content', 'alternatingcontent'); ?>
        <?php endif;
        if( get_row_layout() == 'content_&_listed_stats' ): ?>
            <?php get_template_part('tpl/modules/content', 'contentlistedstats'); ?>
        <?php endif;
        if( get_row_layout() == 'boxed_content_with_side_image_centred_content_large_icons' ): ?>
            <?php get_template_part('tpl/modules/content', 'boxedcontentwithsideimagecentredcontentlargeicons'); ?>
        <?php endif;
        if( get_row_layout() == 'content_&_image' ): ?>
            <?php get_template_part('tpl/modules/content', 'contentimage'); ?>
        <?php endif;
        if( get_row_layout() == 'calculator' ): ?>
            <?php get_template_part('tpl/modules/content', 'calculator'); ?>
        <?php endif; 
        if( get_row_layout() == 'calculator_seo' ): ?>
            <?php get_template_part('tpl/modules/content', 'calculatorseo'); ?>  
        <?php endif; 
        if( get_row_layout() == 'meet_the_team' ): ?>
            <?php get_template_part('tpl/modules/content', 'meettheteam'); ?>
        <?php endif;  
        if( get_row_layout() == 'google_map' ): ?>
            <?php get_template_part('tpl/modules/content', 'googlemap'); ?>
        <?php endif; 
        if( get_row_layout() == 'reach_us_at' ): ?>
            <?php get_template_part('tpl/modules/content', 'reachusat'); ?>
        <?php endif; 
        if( get_row_layout() == 'single_testimonial' ): ?>
            <?php get_template_part('tpl/modules/content', 'singletestimonial'); ?>
        <?php endif; 
        if( get_row_layout() == 'two_column_image_links' ): ?>
            <?php get_template_part('tpl/modules/content', 'twocolumnimagelinks'); ?>
        <?php endif; 
        if( get_row_layout() == 'case_studies_slider_two_columns' ): ?>
            <?php get_template_part('tpl/modules/content', 'casestudiesslidertwocolumns'); ?>
        <?php endif; 
        if( get_row_layout() == 'case_studies_slider_single_column' ): ?>
            <?php get_template_part('tpl/modules/content', 'casestudiesslidersinglecolumn'); ?>
        <?php endif; 
        if( get_row_layout() == 'two_column_image_hovers' ): ?>
            <?php get_template_part('tpl/modules/content', 'twocolumnimagehovers'); ?>
        <?php endif; 
        if( get_row_layout() == 'four_column_image_hovers' ): ?>
            <?php get_template_part('tpl/modules/content', 'fourcolumnimagehovers'); ?>
        <?php endif; 
        if( get_row_layout() == 'generic_cta' ): ?>
            <?php get_template_part('tpl/modules/content', 'genericcta'); ?>
        <?php endif;      
        if( get_row_layout() == 'case_studies_slider_specific' ): ?>
            <?php get_template_part('tpl/modules/content', 'casestudiessliderspecific'); ?>
        <?php endif;   


    endwhile;
endif;
?>