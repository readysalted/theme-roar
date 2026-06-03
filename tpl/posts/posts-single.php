<main>    



    <section class="standard-content standard-casestudy">
        <div class="container-large">
            <div class="flex-holder">
                <div class="content-left">
                    <?php if( have_rows('contents') ): ?>
                        <div class="content contents">
                            <h3>Contents</h3>
                            <?php while ( have_rows('contents') ) : the_row(); ?>
                                <?php 
                                $title = get_sub_field('title');
                                $sectionid = get_sub_field('section_id');
                                ?>
                                <?php if ($title): ?>
                                    <p><a href="#<?php echo $sectionid; ?>"><?php echo $title; ?></a></p>
                                <?php endif ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-holder">
                        <?php echo do_shortcode('[gravityform id="3" title="true"]'); ?>   
                    </div>
                </div>
                <div class="content-right">
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <p class="meta">
                            <?php
                                // Author avatar and name
                                $author_id = get_the_author_meta('ID');
                                echo get_avatar( $author_id, 24, '', '', ['class' => 'eyebrow__avatar'] ); // 24 is the size of the avatar
                                echo '<a class="eyebrow__author" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author() ) . '</a>';
                            ?> | 
                            <?php the_time( 'j F, Y' ); ?> |
                            <?php echo get_reading_time(); ?> |
                            <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    $output = array();
                                    foreach ( $categories as $category ) {
                                        $output[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                                    }
                                    echo implode( ', ', $output );
                                }
                            ?>
                        </p>
                        <?php if (get_the_post_thumbnail_url()){ ?>
                            <div class="featured-image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                        <?php } ?>
                        <?php the_content(); ?>
                    </article> 
                </div> 
            </div>
        </div>
    </section> 

    <?php get_template_part('tpl/modules/content', 'latestblogs'); ?>

</main>