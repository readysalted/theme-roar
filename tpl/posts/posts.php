<main>

    <?php 
    $heading = get_field('hc_b_heading', 'options');
    $subheading = get_field('hc_b_sub_heading', 'options');
    $content = get_field('hc_b_content', 'options');
    $sideimg = get_field('hc_b_side_image', 'options');
    ?>

    <section class="hero inner-hero standard">
        <div class="container-large">
            <div class="flex-holder">
                <div class="content-left">
                    <div class="content">
                        <?php if ($subheading){ ?>
                            <h1 class="eyebrow"><?php echo $subheading; ?></h1>
                        <?php } ?> 
                        <?php if ($heading){ ?>
                            <h2 class="h1"><?php echo $heading; ?></h2>
                        <?php } ?> 
                        <?php if ($sideimg): ?>
                            <div class="image-holder">
                                <img src="<?php echo $sideimg['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimg['alt']; ?>">
                            </div>
                        <?php endif ?>
                        <?php if ($content): ?>
                            <?php echo $content; ?>
                        <?php endif ?>
                        <div class="search-cat-forms">
                            <div class="post-search-form">
                                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" name="s" placeholder="Search posts..." value="<?php echo get_search_query(); ?>" />
                                    <input type="hidden" name="post_type" value="post" />
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                            <div class="category-select-search">
                                <select onchange="if (this.value) window.location.href=this.value;">
                                    <option value=""><?php echo esc_attr('Search by Category...'); ?></option>
                                    <option value="<?php echo get_permalink(45); ?>">All Blogs</option>
                                    <?php
                                    $categories = get_categories(array(
                                        'hide_empty' => true
                                    ));
                                    foreach ($categories as $category) {
                                        $link = get_category_link($category->term_id);
                                        echo '<option value="' . esc_url($link) . '">' . esc_html($category->name) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
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
        </div>
    </section>

    <section class="news-articles">
        <div class="container-large">
            <div class="flex-holder">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $post_index = 0; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php $post_index++; ?>
                    <?php if ( has_post_thumbnail() ) {
                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $thumb_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
                    }
                    $excerpt = get_field('excerpt'); ?>
                    <div class="column<?php if ( is_home() && $paged == 1 && ($post_index == 1 || $post_index == 2) ) { ?> featured<?php } ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div class="tile">
                                <div class="content-top">
                                    <div class="bgimg">
                                        <?php if (get_the_post_thumbnail_url()){ ?>
                                            <img src="<?php echo get_the_post_thumbnail_url( '', 'large-horizontal' ); ?>" alt="<?php echo esc_html( $thumb_alt ); ?>">
                                        <?php } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/blog-placeholder.jpg" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="content">
                                        <?php /*
                                        <p class="eyebrow date">
                                            <?php the_time( 'j F, Y' ); ?> · 
                                            <?php
                                                $categories = get_the_category();
                                                if ( ! empty( $categories ) ) {
                                                    $output = array();
                                                    foreach ( $categories as $category ) {
                                                        $output[] = esc_html( $category->name );
                                                    }
                                                    echo implode( ', ', $output );
                                                }
                                            ?>
                                        </p>
                                        <p class="eyebrow author">By <?php
                                            // Author avatar and name
                                            $author_id = get_the_author_meta('ID');
                                            //echo get_avatar( $author_id, 24, '', '', ['class' => 'eyebrow__avatar'] ); // 24 is the size of the avatar
                                            echo esc_html( get_the_author() );
                                        ?> · <?php echo get_reading_time(); ?></p>
                                        */ ?>
                                        <h3 class="h4"><?php the_title(); ?></h3>
                                        <?php if ( is_home() && $paged == 1 && ($post_index == 1 || $post_index == 2) ) { ?>
                                            <?php if ($excerpt): ?>
                                                <div class="excerpt"><?php echo $excerpt; ?></div>
                                            <?php endif ?>
                                        <?php } ?>
                                        <p class="new">
                                            <?php the_time( 'j F, Y' ); ?> | <?php echo get_reading_time(); ?> | By <?php
                                            $author_id = get_the_author_meta('ID'); echo esc_html( get_the_author() ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <?php $pagination = paginate_links( array( "next_text" => '', "prev_text" => '' ) ); 
    if( $pagination ) :
        global $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        ?>
        <div class="pagination">
            <div class="container-large">
                <div class="flex-holder">
                    <div class="pageination-left">
                        <?php echo 'Page ' . $paged . ' of ' . $wp_query->max_num_pages; ?>
                    </div>
                    <div class="pageination-right">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part('tpl/modules/content', 'brandslider'); ?>
    <?php get_template_part('tpl/modules/content', 'genericcta'); ?>
    
</main>