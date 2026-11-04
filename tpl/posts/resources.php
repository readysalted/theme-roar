<main>

	<?php 
	$heading = get_field('hc_r_heading', 'options');
	$subheading = get_field('hc_r_sub_heading', 'options');
	$content = get_field('hc_r_content', 'options');
	$sideimg = get_field('hc_r_side_image', 'options');
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
                        <?php /*
                        <div class="category-select-search">
						    <select onchange="if (this.value) window.location.href=this.value;">
						        <option value=""><?php echo esc_attr('Search by Resource Type...'); ?></option>
						        <option value="<?php echo get_post_type_archive_link('resource'); ?>">All Resources</option>
						        <?php
						        $terms = get_terms(array(
						            'taxonomy' => 'resource-type',
						            'hide_empty' => true,
						        ));
						        foreach ($terms as $term) {
						            $link = get_term_link($term);
						            echo '<option value="' . esc_url($link) . '">' . esc_html($term->name) . '</option>';
						        }
						        ?>
						    </select>
						</div>
						*/ ?>
						<div class="category-select-search">
						    <select onchange="if (this.value) window.location.href=this.value;">
						        <option value=""><?php echo esc_attr('Search by Resource Type...'); ?></option>
						        <option value="<?php echo get_post_type_archive_link('resource'); ?>" <?php if (is_post_type_archive('resource')) echo 'selected'; ?>>All Resources</option>
						        <?php
						        $terms = get_terms(array(
						            'taxonomy' => 'resource-type',
						            'hide_empty' => true,
						        ));

						        // Get the current queried object (could be a term on taxonomy archive)
						        $queried_object = get_queried_object();
						        $current_term_id = isset($queried_object->term_id) ? $queried_object->term_id : 0;

						        foreach ($terms as $term) {
						            $link = get_term_link($term);
						            $selected = ($current_term_id === $term->term_id) ? 'selected' : '';
						            echo '<option value="' . esc_url($link) . '" ' . $selected . '>' . esc_html($term->name) . '</option>';
						        }
						        ?>
						    </select>
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

	<section class="resources">
	    <div class="container-large">
	        <div class="flex-holder">
	            <?php while (have_posts()) : the_post(); ?>
	            	<div class="study-tile">
	            		<a href="<?php echo get_permalink(); ?>">
	            			<div class="content">
	            				<?php if (get_the_post_thumbnail_url('','standard-portrait')){ ?>
				        			<div class="featured-image">
			                    		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			                    	</div>
			                	<?php } ?>
	            				<h2 class="h4"><?php the_title(); ?></h2>
	            				<p class="eyebrow">View Resource</p>
	            			</div>
	            		</a>	
	            	</div>
	            <?php endwhile; ?>
	        </div>
	    </div>
	</section>

    <?php
    $pagination = paginate_links( array(
        'next_text' => '<span class="screen-reader-text">Next page</span>',
        'prev_text' => '<span class="screen-reader-text">Previous page</span>',
    ) );
    if ( $pagination ) :
        global $wp_query;
        $paged = max( 1, (int) get_query_var( 'paged' ) );
        ?>
        <nav class="pagination" aria-label="Resources pagination">
            <div class="container-large">
                <div class="flex-holder">
                    <div class="pageination-left">
                        <?php echo esc_html( 'Page ' . $paged . ' of ' . $wp_query->max_num_pages ); ?>
                    </div>
                    <div class="pageination-right">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <?php get_template_part('tpl/modules/content', 'brandslider'); ?>
    <?php get_template_part('tpl/modules/content', 'genericcta'); ?>

</main>