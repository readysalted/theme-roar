<?php $postid = get_the_ID(); ?>

<section class="latestarticles">
	<div class="container-large">
		<h2>Further reading...</h2> 
	</div>
	 <div class="swiper swiperlatest">
        <div class="swiper-wrapper">
		<?php
        $args = array(
            'post_type' => 'post', // Post type (assuming it's a regular post)
            'posts_per_page' => 6, // Retrieve all posts in the category
            'post__not_in'	 => array($postid),
        );
        $query = new WP_Query($args); 

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
            	<?php if ( has_post_thumbnail() ) {
                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $thumb_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
                    }
                    $excerpt = get_field('excerpt'); ?>
                    <div class="column swiper-slide">
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
                                        */ ?>
                                        <h2 class="h4"><?php the_title(); ?></h2>
                                        <?php /*if ($excerpt): ?>
                                            <p class="excerpt"><?php echo $excerpt; ?></p>
                                        <?php endif */ ?>
                                        <p class="new">
                                            <?php the_time( 'j F, Y' ); ?> | <?php echo get_reading_time(); ?> | By <?php
                                            $author_id = get_the_author_meta('ID'); echo esc_html( get_the_author() ); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php endwhile;
        else :
            echo 'No posts found.';
        endif;
        wp_reset_postdata(); // Restore global post data
        ?>	
        </div>	
	</div>
</section>