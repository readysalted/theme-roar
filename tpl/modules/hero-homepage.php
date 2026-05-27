<?php
//Includes
$inc_icon_columns   = get_field('page_include_large_icon_columns');
$inc_star_rating    = get_field('page_include_star_rating');
$inc_three_stats    = get_field('page_include_three_stats');
//Hero Content
$heading            = get_field('page_heading');
$subheading         = get_field('page_subheading');
$intro              = get_field('page_intro');
$video_image        = get_field('page_video_placeholder_image');
$video_url          = get_field('page_video_url');
$link               = get_field('page_link');
if ($link) {
    $link_url       = $link['url'];
    $link_title     = $link['title'];
    $link_target    = $link['target'] ? $link['target'] : '_self'; 
}
$rtratingtext = get_field('rt_rating_text', 'options');
?>

<section class="hero home-hero">
    <div class="container-large">
        <div class="flex-holder">
            <div class="content-left">
                <div class="content">
                    <?php if ($subheading): ?>
                        <p class="eyebrow"><?php echo $subheading; ?></p>
                    <?php endif ?>
                    <?php if ($heading): ?>
                        <h1><?php echo $heading; ?></h1>
                    <?php endif ?>
                    <?php if ($intro): ?>
                        <?php echo $intro; ?>
                    <?php endif ?>
                    <div class="desktop-content">
                        <?php if ($inc_icon_columns): ?>
                            <?php if( have_rows('page_large_icon_columns') ): ?>
                                <div class="icons-holder">
                                    <?php while ( have_rows('page_large_icon_columns') ) : the_row(); ?>
                                        <?php 
                                        $icon = get_sub_field('icon');
                                        $heading = get_sub_field('heading');
                                        ?>
                                        <div class="column">
                                            <?php if ($icon): ?>
                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <?php endif ?>
                                            <?php if ($heading): ?>
                                                <p><?php echo $heading; ?></p>
                                            <?php endif ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>            
                        <?php endif ?>
                        <div class="link-flex">
                            <?php if ($link): ?>
                                <p class="btn">
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                        <?php echo $link_title; ?>
                                    </a>
                                </p>
                            <?php endif ?>
                            <?php if ($inc_star_rating): ?>
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
                            <?php endif ?>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="content-right">
                <div class="hero-video-container" itemscope itemtype="https://schema.org/VideoObject">
                    <!-- Schema.org Metadata -->
                    <meta itemprop="name" content="Roar Marketing Intro Video" />
                    <meta itemprop="thumbnailUrl" content="<?php echo $video_image['url']; ?>" />
                    <meta itemprop="uploadDate" content="2025-05-01" />
                    <meta itemprop="contentUrl" content="<?php echo $video_url; ?>" />
                    <meta itemprop="description" content="Introduction to Roar Marketing's services and team." />
                    <!-- Placeholder with Overlay -->
                    <div class="video-placeholder" id="videoPlaceholder">
                        <img src="<?php echo $video_image['url']; ?>" alt="Intro Video Placeholder" loading="lazy">
                        <?php if ($video_url): ?>
                            <div class="overlay-text">Watch intro video</div>    
                        <?php endif ?>
                    </div>
                    <?php if ($video_url): ?>
                        <!-- Video Element (Initially Hidden) -->
                        <video id="heroVideo" preload="none" controls style="display: none;" playsinline>
                            <source src="<?php echo $video_url; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif ?>
                </div>

                <?php if ($inc_three_stats): ?>
                    <?php if( have_rows('page_statistic_columns') ): ?>
                        <div class="stats-holder">
                            <?php while ( have_rows('page_statistic_columns') ) : the_row(); ?>
                                <?php 
                                $heading = get_sub_field('heading');
                                $small_heading = get_sub_field('small_heading');
                                ?>
                                <div class="column">
                                    <?php if ($heading): ?>
                                        <p class="large"><?php echo $heading; ?></p>
                                    <?php endif ?>
                                    <?php if ($small_heading): ?>
                                        <p class="small"><?php echo $small_heading; ?></p>
                                    <?php endif ?>
                                </div>
                                <div class="breaker"></div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endif ?>
            </div>
            <div class="mobile-content">
                <div class="link-flex">
                    <?php if ($link): ?>
                        <p class="btn">
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
                            </a>
                        </p>
                    <?php endif ?>
                    <?php if ($rtratingtext): ?>
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
                    <?php endif ?>
                </div> 
                <?php if ($inc_icon_columns): ?>
                    <?php if( have_rows('page_large_icon_columns') ): ?>
                        <div class="icons-holder">
                            <?php while ( have_rows('page_large_icon_columns') ) : the_row(); ?>
                                <?php 
                                $icon = get_sub_field('icon');
                                $heading = get_sub_field('heading');
                                ?>
                                <div class="column">
                                    <?php if ($icon): ?>
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    <?php endif ?>
                                    <?php if ($heading): ?>
                                        <p><?php echo $heading; ?></p>
                                    <?php endif ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>            
                <?php endif ?>
            </div>
        </div>
    </div>
</section>