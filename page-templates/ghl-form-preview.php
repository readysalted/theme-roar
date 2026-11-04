<?php
/**
 * Template Name: GHL Form Preview
 * Template Post Type: page
 *
 * Isolated review pages. Existing contact, blog, resource and service templates
 * keep their current forms until the replacement has been reviewed.
 */
defined( 'ABSPATH' ) || exit;

add_filter( 'wp_robots', function ( $robots ) {
    $robots['noindex'] = true;
    $robots['nofollow'] = true;
    return $robots;
} );

wp_enqueue_style(
    'roar-ghl-form-preview',
    get_template_directory_uri() . '/assets/css/ghl-form-preview.css',
    array(),
    filemtime( get_template_directory() . '/assets/css/ghl-form-preview.css' )
);

get_header();
while ( have_posts() ) :
    the_post();
    $form_type = get_post_meta( get_the_ID(), '_roar_ghl_form_type', true );
    ?>
    <main class="roar-ghl-preview">
        <section>
            <div class="container-large">
                <?php if ( 'newsletter' === $form_type ) : ?>
                    <div class="roar-ghl-preview__columns">
                        <aside class="roar-ghl-preview__newsletter" aria-label="Newsletter sign up">
                            <?php get_template_part( 'tpl/modules/content', 'ghlform', array( 'type' => $form_type ) ); ?>
                        </aside>
                        <div>
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php else : ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <div class="roar-ghl-preview__form">
                        <?php get_template_part( 'tpl/modules/content', 'ghlform', array( 'type' => $form_type ) ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php endwhile;
get_footer();
