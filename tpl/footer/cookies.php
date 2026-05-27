<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#000"
            },
            "button": {
                <?php if( get_field('cookies_layout', 'option') == 'wire' ){ ?>
                "background": "transparent",
                "text": "#f1d600",
                "border": "#f1d600"
                <?php } else { ?>                
                "background": "#f1d600"
                <?php } ?>
            }
        },
        <?php if( get_field('cookies_layout', 'option') == 'edge' ): ?> "theme": "edgeless",<?php endif; ?>
        "position": "<?php echo get_field('cookies_type', 'option'); ?>",
        "content": {
            "message": "<?php echo get_field('cookies_message_text', 'option'); ?>",
            "dismiss": "<?php echo get_field('cookies_dismiss_button', 'option'); ?>",
            "link": "<?php echo get_field('cookies_policy_link', 'option'); ?>",
            "href": "<?php echo get_field('cookies_privacy_policy', 'option'); ?>"
        }
    });
</script>