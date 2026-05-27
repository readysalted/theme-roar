<?php 
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
?>

<section class="twocolumnimagehovers">
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
		<?php if( have_rows('image_hovers') ): ?>
			<div class="flex-holder">
				<?php while ( have_rows('image_hovers') ) : the_row(); ?>
					<?php
					$bgimage = get_sub_field('background_image');
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					?>
					<div class="image-link">
						<div class="content-holder">
							<?php if ($bgimage): ?>
								<img src="<?php echo $bgimage['sizes']['large-square']; ?>" alt="<?php echo $bgimage['alt']; ?>">	
							<?php endif ?>
							<div class="overlay"></div> 
							<div class="content">
								<?php if ($heading): ?>
									<h3><?php echo $heading; ?></h3>	
								<?php endif ?>
								<?php if ($content): ?>
									<p><?php echo $content; ?></p>	
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>