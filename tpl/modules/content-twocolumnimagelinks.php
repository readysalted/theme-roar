<?php 
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
?>

<section class="twocolumnimagelinks">
	<div class="container">
		<div class="intro">
			<?php if ($subheading): ?>
				<p class="eyebrow">
					<?php echo $subheading; ?>
				</p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
		</div>
		<?php if( have_rows('image_links') ): ?>
			<div class="flex-holder">
				<?php while ( have_rows('image_links') ) : the_row(); ?>
					<?php $bgimage = get_sub_field('background_image');
					$link = get_sub_field('link');
					if ($link) {
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self'; 
					} ?>
					<div class="image-link">
						<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
							<div class="content-holder">
								<?php if ($bgimage): ?>
									<img src="<?php echo $bgimage['sizes']['large-square']; ?>" alt="<?php echo $bgimage['alt']; ?>">	
								<?php endif ?>
								<div class="overlay"></div>
								<h3><?php echo $link_title; ?></h3>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>