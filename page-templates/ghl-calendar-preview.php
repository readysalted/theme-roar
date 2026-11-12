<?php
/**
 * Template Name: GHL Calendar Preview
 * Template Post Type: page
 */
defined( 'ABSPATH' ) || exit;

add_filter( 'wp_robots', function ( $robots ) {
    $robots['noindex'] = true;
    $robots['nofollow'] = true;
    return $robots;
} );

wp_enqueue_style( 'roar-ghl-form-preview', get_template_directory_uri() . '/assets/css/ghl-form-preview.css', array(), null );
wp_enqueue_script( 'roar-ghl-form-embed', 'https://link.msgsndr.com/js/form_embed.js', array(), null, true );

get_header();
while ( have_posts() ) :
    the_post();
    ?>
    <main class="roar-ghl-preview">
        <section>
            <div class="container-large">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <div class="roar-ghl-preview__form">
                    <iframe
                        src="https://api.leadconnectorhq.com/widget/booking/xamvClXfuAQ7iPXUpyx2"
                        id="acHVF39Ds2JAw9KMBMwM_1794412972123"
                        title="ROAR booking calendar"
                        allow="payment"
                        style="width:100%;border:none;overflow:hidden"
                        height="700"
                        scrolling="no"
                    ></iframe>
                </div>
            </div>
        </section>
    </main>
    <?php
endwhile;
get_footer();
