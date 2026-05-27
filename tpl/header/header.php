<?php
$switchon = get_field('page_add_header_banner');
$message = get_field('hb_message', 'options');
$bumessage = get_field('page_header_banner'); ?>

<?php if (is_front_page()){ } else { ?>
    <a href="<?php echo get_home_url() ?>/contact-us">
        <section class="headerbanner">
            <div class="container">
                <?php if ($message){ ?>
                    <p><?php echo $message; ?></p>
                <?php } else { ?>
                    <p><?php echo $bumessage; ?></p>
                <?php } ?>
            </div>
        </section>
    </a>
<?php } ?>

<header class="main-header headerbaron">
    <div class="container-large">
        <div class="flex-holder">
            <button class="menu-toggle">
                    <span class="toggle-nav-icon"><?php get_template_part('assets/images/icon-nav.svg'); ?></span>
                    <span class="toggle-nav-label"><?php esc_html_e( 'Menu', 'gud' ); ?></span>
                </button> 
            <div class="logo-holder">
                <a href="<?php echo get_home_url(); ?>">
                    <?php $logo = get_field('company_logo', 'options'); ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                </a>    
            </div>
            <nav>
                <?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container' => false, ) ); ?>
            </nav>  
            <div class="button">
                <p class="btn">
                    <a href="<?php echo get_field("header_contact_button_link", "options"); ?>"><?php echo get_field("header_contact_button_text", "options"); ?></a>                
                </p>
            </div>
        </div>
    </div>   
</header> 

<section class="menu-dropdown services-dropdown headerbaron">
    <div class="container">
        <div class="menu-holder">
            <?php wp_nav_menu( array( 'theme_location' => 'service-menu', 'container' => false, ) ); ?>  
        </div>
    </div>  
</section>
<section class="menu-dropdown sectors-dropdown headerbaron">
    <div class="container">
        <div class="menu-holder">
            <?php wp_nav_menu( array( 'theme_location' => 'sectors-menu', 'container' => false, ) ); ?>  
        </div>
    </div>  
</section>

<div class="slide-nav">
    <div class="container clearfix">
        <div class="flex-holder">
            <div class="nav">
                <nav> 
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'container' => false, ) ); ?>   
                </nav> 
            </div>
            <div class="button">
                <p class="btn">
                    <a href="<?php echo get_field("header_contact_button_link", "options"); ?>"><?php echo get_field("header_contact_button_text", "options"); ?></a>
                </p>
            </div>
        </div>
    </div>
</div> 