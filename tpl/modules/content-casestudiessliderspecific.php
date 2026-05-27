<?php
$postid = get_the_ID();
$heading = get_sub_field('heading');
$related_posts = get_sub_field('select_case_studies'); // ACF relationship field returning array of post objects
?>

<section class="casestudiesslidersinglecolumn">
	<div class="container">
		<div class="intro">
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
		</div>

		<?php if ($related_posts): ?>
			<div class="swiperHolder">
				<div class="swiper latestcaseoneSwiper">
					<div class="swiper-wrapper">
						<?php foreach ($related_posts as $post): setup_postdata($post); ?>
							<?php
							$excerpt = get_field('excerpt');
							$client = get_field('client');
							$excerptlimit = get_field('excerpt_limit');
							$tilestat = get_field('tile_stat');
							$tilestatinfo = get_field('tile_stat_info');
							$clientlogo = get_field('client_logo');
							$clienttestimonial = get_field('client_testimonial');
							?>
							<div class="swiper-slide project">	
								<a href="<?php echo get_permalink(); ?>">
									<div class="holder">
										<?php
										$terms = get_the_terms(get_the_ID(), 'project-type'); 
										$categories = get_the_category(); ?>
										<div class="image-holder">
											<img src="<?php echo get_the_post_thumbnail_url('', 'standard-horizontal'); ?>" alt="">
										</div>
										<div class="content">
											<?php if ($client): ?>
												<h3><?php echo $client; ?></h3>	
											<?php else: ?>
												<h3><?php the_title(); ?></h3>	
											<?php endif; ?>
											<div class="tile-stat">
												<p class="stat"><?php echo $tilestat; ?></p>
												<p class="statinfo"><?php echo $tilestatinfo; ?></p>
											</div>
											<?php echo $excerptlimit; ?>
											<?php if ($clienttestimonial): ?>
												<div class="testimonial">
													<?php if ($clientlogo): ?>
														<div class="logo">
															<img src="<?php echo $clientlogo['url']; ?>" alt="<?php echo $clientlogo['alt']; ?>">	
														</div>
													<?php endif; ?>
													<div class="testim">
														<div class="stars">
															<span></span><span></span><span></span><span></span><span></span>
														</div>
														<p>"<?php echo $clienttestimonial; ?>"</p>
													</div>
												</div> 
											<?php endif; ?>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				</div>
				<div class="swiper-arrow swiper-button-next latestcaseone-next"></div>
				<div class="swiper-arrow swiper-button-prev latestcaseone-prev"></div>
			</div>
		<?php endif; ?>

		<p class="btn alt">
			<a href="<?php echo get_home_url(); ?>/case-studies">
				View all case studies
			</a>
		</p>
	</div>
</section>
