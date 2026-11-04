<?php
/**
 * Reusable inline GHL form. Pass a registered form type in $args['type'].
 * Form fields, styling, consent and automation settings remain managed in GHL.
 */
defined( 'ABSPATH' ) || exit;

$forms = array(
    'contact' => array(
        'id' => '2jjxSXg7p63p2Wt0NvJj',
        'title' => 'ROAR Website - Contact Page Form',
        'height' => 954,
    ),
    'newsletter' => array(
        'id' => 'tJhUWQRpxbMMMmLn84mn',
        'title' => 'ROAR Website - Newsletter Form',
        'height' => 400,
    ),
    'resource' => array(
        'id' => 'KTsWvzBF1C1QWKKGNOu0',
        'title' => 'ROAR Website - Resources Form',
        'height' => 548,
    ),
    'ppc' => array(
        'id' => 'FohYtdDLYd8Q6nmXvbF7',
        'title' => 'ROAR Website - PPC Form',
        'height' => 809,
    ),
    'seo-content-analytics' => array(
        'id' => 'MU9VKQzkcK6MuFg6JCUn',
        'title' => 'ROAR Website - SEO, Content and Analytics Pages Form',
        'height' => 793,
    ),
);

$form_type = isset( $args['type'] ) ? $args['type'] : '';
if ( ! isset( $forms[ $form_type ] ) ) {
    return;
}

$form = $forms[ $form_type ];
$iframe_id = wp_unique_id( 'inline-' . $form['id'] . '-' );

// WordPress prints the shared resize/consent script once, even with multiple forms.
wp_enqueue_script( 'roar-ghl-form-embed', 'https://link.msgsndr.com/js/form_embed.js', array(), null, true );
?>
<div class="roar-ghl-form">
    <iframe
        src="<?php echo esc_url( 'https://api.leadconnectorhq.com/widget/form/' . $form['id'] ); ?>"
        style="width:100%;height:<?php echo (int) $form['height']; ?>px;border:none;border-radius:8px"
        id="<?php echo esc_attr( $iframe_id ); ?>"
        data-layout="{'id':'INLINE'}"
        data-trigger-type="alwaysShow"
        data-trigger-value=""
        data-activation-type="alwaysActivated"
        data-activation-value=""
        data-deactivation-type="neverDeactivate"
        data-deactivation-value=""
        data-form-name="<?php echo esc_attr( $form['title'] ); ?>"
        data-height="<?php echo (int) $form['height']; ?>"
        data-layout-iframe-id="<?php echo esc_attr( $iframe_id ); ?>"
        data-form-id="<?php echo esc_attr( $form['id'] ); ?>"
        data-cookie-consent="true"
        data-cookie-consent-provider="auto"
        title="<?php echo esc_attr( $form['title'] ); ?>"
    ></iframe>
</div>
