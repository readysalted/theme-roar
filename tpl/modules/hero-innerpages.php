<?php 
// Both
$heading = get_field('page_heading');
$subheading = get_field('page_sub_heading');

// Standard
$sideimg = get_field('page_side_image');
$intro = get_field('page_intro');
$fieldtype = get_field_object('hero_type');
if ($fieldtype) {
    $type = $fieldtype['value'];
} else {
    $type = 'standard';
} 
$link = get_field('page_link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
}
$addsecondlink = get_field('page_add_second_link');
$secondlink = get_field('page_second_link');
if ($secondlink) {
    $link_url2 = $secondlink['url'];
    $link_title2 = $secondlink['title'];
    $link_target2 = $secondlink['target'] ? $secondlink['target'] : '_self'; 
}

//Form
$testi = get_field('page_testimonial');
$testi_name = get_field('page_testimonial_name');
$testi_role = get_field('page_testimonial_role');
$testi_company = get_field('page_testimonial_company');
$testi_image = get_field('page_testimonial_image');

// Backup/Blog/repeating
$rtratingtext = get_field('rt_rating_text', 'options');
$bubgimg = get_field('backup_hero_image', 'options');
$blogheading = get_field('page_heading', get_option("page_for_posts"));
$blogbgimg = get_field('background_image', get_option("page_for_posts"));

// Remove Centered Content
$removecenteredcontent = get_field('remove_centered_content');
?>

<section class="hero inner-hero <?php echo $type; ?><?php if ($removecenteredcontent): ?> top-aligned<?php endif ?>">
    <div class="container-large">
        <?php //----------------------------------------------------- STANDARD
        if ($type == "standard"){ ?>
            <div class="flex-holder">
                <div class="content-left">
                    <div class="content">
                        <?php if ($subheading): ?>
                            <h1 class="eyebrow"><?php echo $subheading; ?></h1>
                        <?php endif ?>
                        <?php if ($heading){ ?>
                            <h2 class="h1"><?php echo $heading; ?></h1>
                        <?php } else { ?>
                            <h2 class="h1"><?php the_title(); ?></h2>
                        <?php } ?> 
                        <?php if ($sideimg): ?>
                            <div class="image-holder">
                                <img src="<?php echo $sideimg['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimg['alt']; ?>">
                            </div>
                        <?php endif ?>
                        <?php if ($intro): ?>
                            <?php echo $intro; ?>
                        <?php endif ?>
                        <?php if ($link): ?>
                            <div class="link-flex<?php if ($addsecondlink): ?> column<?php endif ?>">
                                <p class="btn">
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                        <?php echo $link_title; ?>
                                    </a>
                                    <?php if ($addsecondlink): ?>
                                        <?php if ($secondlink) { ?>
                                            <a href="<?php echo $link_url2; ?>" target="<?php echo $link_target2; ?>">
                                                <?php echo $link_title2; ?>
                                            </a>
                                        <?php } ?>
                                    <?php endif ?>
                                </p>
                                <?php // if ($inc_star_rating): ?>
                                    <div class="rating">
                                        <div class="stars">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <p><?php echo $rtratingtext; ?></p>
                                    </div>
                                <?php //endif ?>
                            </div> 
                        <?php endif ?>
                    </div>
                </div>
                <div class="content-right">
                    <?php if ($sideimg): ?>
                        <div class="image-holder">
                            <img src="<?php echo $sideimg['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimg['alt']; ?>">
                        </div>
                    <?php endif ?>
                </div>
            </div>    


        <?php //----------------------------------------------------- FORM - PPC 
        } elseif ($type == "formppc") {
			$gravityformid = 5;
			if( get_field('page_heading_gfid') > 0 ) $gravityformid = get_field('page_heading_gfid');
			?>
            <div class="flex-holder">
                <div class="content-left">
                    <div class="content">
                        <?php if ($subheading): ?>
                            <h1 class="eyebrow"><?php echo $subheading; ?></h1>
                        <?php endif ?>
                        <?php if ($heading){ ?>
                            <h2 class="h1"><?php echo $heading; ?></h2>
                        <?php } else { ?>
                            <h2 class="h1"><?php the_title(); ?></h2>
                        <?php } ?> 
                        <?php /*
                        <div class="form-holder">
                            <?php echo do_shortcode('[gravityform id="' . $gravityformid . '" title="true"]'); ?>
                        </div>
                        */ ?>
                        <?php if( have_rows('page_icon_list') ): ?>
                            <div class="icon-list">
                                <?php while ( have_rows('page_icon_list') ) : the_row(); ?>
                                    <?php 
                                    $icon = get_sub_field('icon');
                                    $content = get_sub_field('content');
                                    ?>
                                    <div class="row">
                                        <?php if ($icon): ?>
                                            <img src="<?php echo $icon['url']; ?>" alt="">
                                        <?php endif ?>
                                        <?php if ($content): ?>
                                            <?php echo $content; ?>
                                        <?php endif ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('page_logos') ): ?>
                            <div class="logo-list">
                                <?php while ( have_rows('page_logos') ) : the_row(); ?>
                                    <?php $logo = get_sub_field('logo'); ?>
                                    <div class="logo-holder">
                                        <?php if ($logo): ?>
                                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                        <?php endif ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($testi): ?>
                            <div class="testimonial-box">
                                <div class="stars">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <p><?php echo $testi; ?></p>
                                <div class="info">
                                    <div class="info-left">
                                        <?php if ($testi_image): ?>
                                            <img src="<?php echo $testi_image['url']; ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                    <div class="info-right">
                                        <?php if ($testi_name): ?>
                                            <p class="name"><?php echo $testi_name; ?></p>
                                        <?php endif ?>
                                        <?php if ($testi_role): ?>
                                            <p class="role"><?php echo $testi_role; ?></p>
                                        <?php endif ?>
                                        <?php if ($testi_company): ?>
                                            <p class="company"><?php echo $testi_company; ?></p>
                                        <?php endif ?>    
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="content-right">
                    <div class="form-holder">
						<?php $theshortcode = '[gravityform id="' . $gravityformid . '" title="true"]'; ?>
                        <?php echo do_shortcode($theshortcode); ?>
                    </div>
                </div>
            </div>
        <?php //----------------------------------------------------- FORM - SEO 
        } elseif ($type == "formseo") {
			$gravityformid = 6;
			if( get_field('page_heading_gfid') > 0 ) $gravityformid = get_field('page_heading_gfid');
			?>
            <div class="flex-holder">
                <div class="content-left">
                    <div class="content">
                        <?php if ($subheading): ?>
                            <h1 class="eyebrow"><?php echo $subheading; ?></h1>
                        <?php endif ?>
                        <?php if ($heading){ ?>
                            <h2 class="h1"><?php echo $heading; ?></h2>
                        <?php } else { ?>
                            <h2 class="h1"><?php the_title(); ?></h2>
                        <?php } ?> 
                        <?php /*
                        <div class="form-holder">
                            <?php echo do_shortcode('[gravityform id="' . $gravityformid . '" title="true"]'); ?>
                        </div>
                        */ ?>
                        <?php if( have_rows('page_icon_list') ): ?>
                            <div class="icon-list">
                                <?php while ( have_rows('page_icon_list') ) : the_row(); ?>
                                    <?php 
                                    $icon = get_sub_field('icon');
                                    $content = get_sub_field('content');
                                    ?>
                                    <div class="row">
                                        <?php if ($icon): ?>
                                            <img src="<?php echo $icon['url']; ?>" alt="">
                                        <?php endif ?>
                                        <?php if ($content): ?>
                                            <?php echo $content; ?>
                                        <?php endif ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('page_logos') ): ?>
                            <div class="logo-list">
                                <?php while ( have_rows('page_logos') ) : the_row(); ?>
                                    <?php $logo = get_sub_field('logo'); ?>
                                    <div class="logo-holder">
                                        <?php if ($logo): ?>
                                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                        <?php endif ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($testi): ?>
                            <div class="testimonial-box">
                                <div class="stars">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <p><?php echo $testi; ?></p>
                                <div class="info">
                                    <div class="info-left">
                                        <?php if ($testi_image): ?>
                                            <img src="<?php echo $testi_image['url']; ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                    <div class="info-right">
                                        <?php if ($testi_name): ?>
                                            <p class="name"><?php echo $testi_name; ?></p>
                                        <?php endif ?>
                                        <?php if ($testi_role): ?>
                                            <p class="role"><?php echo $testi_role; ?></p>
                                        <?php endif ?>
                                        <?php if ($testi_company): ?>
                                            <p class="company"><?php echo $testi_company; ?></p>
                                        <?php endif ?>    
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="content-right">
                    <div class="form-holder">
						<?php $theshortcode = '[gravityform id="' . $gravityformid . '" title="true"]'; ?>
                        <?php echo do_shortcode($theshortcode); ?>
                    </div>
                </div>
            </div>
        <?php //----------------------------------------------------- CONATCT FROM 
        } elseif ($type == "contact") { 
			$gravityformid = 1;
			if( get_field('page_heading_gfid') > 0 ) $gravityformid = get_field('page_heading_gfid');
			?>
            <div class="intro">
                <?php if ($subheading): ?>
                    <p class="eyebrow"><?php echo $subheading; ?></p>
                <?php endif ?>
                <?php if ($heading): ?>
                    <h1><?php echo $heading; ?></h1>
                <?php endif ?>
            </div>  
            <div class="contact-form">
                <div class="form-holder">
					<?php $theshortcode = '[gravityform id="' . $gravityformid . '" title="true"]'; ?>
					<?php echo do_shortcode($theshortcode); ?>
                </div>     
            </div>
        <?php } ?>

    </div>
</section>
