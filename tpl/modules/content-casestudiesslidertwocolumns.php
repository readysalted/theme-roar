<?php $postid = get_the_ID();
$heading = get_sub_field('heading');

$filterbyservice = get_sub_field('filter_by_service');
$service = get_sub_field('service');
?>

<section class="casestudiesslidertwocolumns">
	<div class="container">
		<div class="intro">
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
			<?php if (is_single()): ?>
				<h2>More case studies</h2>
			<?php endif ?>
		</div>	
		<?php
		if ($filterbyservice) {
			$the_query = new WP_Query(array(
			    'post_type'         => 'case-study',
			    'order'             => 'DESC',
			    'orderby'           => 'date',
			    'posts_per_page'    => 6,
			    'post__not_in'      => array($postid),
			    'tax_query'         => array(
			        array(
			            'taxonomy' => 'service',
			            'field'    => 'slug',
			            'terms'    => $service,
			        ),
			    ),
			));
		} else {
			$the_query = new WP_Query(array(
			    'post_type'         => 'case-study',
			    'order'             => 'DESC',
			    'orderby'           => 'date',
			    'posts_per_page'    => 6,
			   	'post__not_in'      => array($postid),
			)); 
		}
		if ( $the_query->have_posts() ) : ?>
			<div class="swiperHolder">
				<div class="swiper latestcasetwoSwiper">
					<div class="swiper-wrapper">
					<?php $i=0; while ( $the_query->have_posts() ) :$the_query->the_post(); $i++; ?>
						<?php
						$excerpt = get_field('excerpt');
						$excerptlimit = get_field('excerpt_limit');
						$client = get_field('client');
						$tilestat = get_field('tile_stat');
						$tilestatinfo = get_field('tile_stat_info');
						?>
						<div class="swiper-slide project">	
							<a href="<?php echo get_permalink(); ?>">
								<div class="holder">
									<?php
									$terms = get_the_terms(get_the_ID(), 'project-type'); 
									$categories = get_the_category(); ?>
				                    <div class="image-holder">
										<img src="<?php echo get_the_post_thumbnail_url( '', 'standard-horizontal' ); ?>" alt="">
										<span class="tax">
					                        <?php if ($terms && !is_wp_error($terms)) {
					                            $term_names = wp_list_pluck($terms, 'name');
					                            echo esc_html(implode(', ', $term_names));
					                        } ?>
					                    </span>
									</div>
									<?php if ($client){ ?>
										<h3><?php echo $client; ?></h3>	
									<?php } else { ?>
										<h3><?php echo the_title(); ?></h3>	
									<?php } ?>
									<div class="tile-stat">
										<p class="stat"><?php echo $tilestat; ?></p>
										<p class="statinfo"><?php echo $tilestatinfo; ?></p>
									</div>
									<div class="excerpt">
										<?php echo $excerptlimit; ?>
									</div>
									<p class="btn">View Case Study</p>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
				<div class="swiper-arrow swiper-button-next latestcasetwo-next"></div>
    			<div class="swiper-arrow swiper-button-prev latestcasetwo-prev"></div>
			</div>
		<?php endif; wp_reset_query(); ?>
		<p class="btn alt">
			<a href="<?php echo get_home_url(); ?>/case-studies">
				View all case studies
			</a>
		</p>
	</div>
</section>		