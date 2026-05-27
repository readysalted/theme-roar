<?php 
$heading = get_field('bs_heading', 'options');
$addcircle = get_sub_field('add_background_circle');
$override = get_sub_field('override_slider');
if ($override) {
	$heading = get_sub_field('heading');	
}
?>

<section class="brandslider<?php if ($addcircle): ?> add-circle<?php endif ?>">
	<div class="container">
		<?php if ($heading): ?>
			<h2 class="h4"><?php echo $heading; ?></h2>
		<?php endif ?>
	</div> 
	<?php if (!$override){ ?>
		<?php if( have_rows('bs_brands', 'options') ): ?>
			<div class="swiper swiperMarquee">
	     		<div class="swiper-wrapper">
					<?php while ( have_rows('bs_brands', 'options') ) : the_row(); ?>
						<?php 
						$logo = get_sub_field('logo');
						$stat = get_sub_field('stat');
						$explainer = get_sub_field('explainer');
						?>
						<div class="swiper-slide">
	              			<div class="image-holder">
								<?php if ($logo): ?>
									<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
								<?php endif ?>
								<div class="content">
									<p class="stat"><?php echo $stat; ?></p>
									<p><?php echo $explainer; ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php } else { ?>
		<?php if( have_rows('brands') ): ?>
			<div class="swiper swiperMarquee">
	     		<div class="swiper-wrapper">
					<?php while ( have_rows('brands') ) : the_row(); ?>
						<?php 
						$logo = get_sub_field('logo');
						$stat = get_sub_field('stat');
						$explainer = get_sub_field('explainer');
						$link = get_sub_field('link');
						if ($link) {
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self'; 
						} ?>
						<div class="swiper-slide">
							<?php if ($link_url): ?>
								<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
							<?php endif ?>
		              			<div class="image-holder">
									<?php if ($logo): ?>
										<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
									<?php endif ?>
									<div class="content">
										<p class="stat"><?php echo $stat; ?></p>
										<p><?php echo $explainer; ?></p>
									</div>
								</div>
							<?php if ($link_url): ?>
								</a>
							<?php endif ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php } ?>
</section>
