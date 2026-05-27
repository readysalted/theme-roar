<?php 
$subheading = get_field('test_sub_heading', 'options');
$heading = get_field('test_heading', 'options');
?>

<section class="testimonials">
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

		<div class="testimonials-masonry">
			<?php if( have_rows('testimonials', 'options') ): ?>
				<div class="masonry-wrapper">
					<div class="holder">
						<?php while ( have_rows('testimonials', 'options') ) : the_row(); ?>
							<?php 
							$image = get_sub_field('image');
							$name = get_sub_field('name');
							$role = get_sub_field('role');
							$company = get_sub_field('company');
							$testimonial = get_sub_field('testimonial');
							?>
							<div class="testimonial-box">
								<span class="stars">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</span>
								<?php if ($testimonial): ?>
									<?php echo $testimonial; ?>
								<?php endif ?> 
								<div class="info">
									<div class="info-left">
										<?php if ($image): ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
										<?php endif ?>
									</div>
									<div class="info-right">
										<?php if ($name): ?>
											<p class="name"><?php echo $name; ?></p>
										<?php endif ?>
										<?php if ($role): ?>
											<p class="role"><?php echo $role; ?></p>
										<?php endif ?> 
										<?php if ($company): ?>
											<p class="company"><?php echo $company; ?></p>
										<?php endif ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="fade-overlay"></div>
				</div>
			<?php endif; ?>	
			<button class="view-more-button">View More Reviews</button>
		</div>
	</div>
</section>