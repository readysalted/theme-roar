    <?php  get_template_part( 'tpl/footer/footer' ); ?>

    <?php get_template_part( 'tpl/modules/social/normal/social-icons' ); ?>
    
    <?php wp_footer(); ?>
    <?php if( get_field('analytics_footer_code', 'option') ):  echo get_field('analytics_footer_code', 'option'); endif; ?>
    <?php if( get_field('enable_cookies_pop_up', 'option') ):  get_template_part( 'tpl/footer/cookies' ); endif; ?>
</body>
</html>