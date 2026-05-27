<?php 
$image = get_sub_field('image');
$name = get_sub_field('name');
$role = get_sub_field('role');
$company = get_sub_field('company');
$testimonial = get_sub_field('testimonial');
?>

<section class="singletestimonial">
	<div class="container-large">
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
	</div>
</section>