<?php 
$swapsides = get_sub_field('swap_sides');
$squareimage = get_sub_field('square_image');
$addpinkoverlay = get_sub_field('add_pink_overlay');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$sideimage = get_sub_field('side_image');
?>

<section class="contentimage<?php if ($swapsides): ?> swapsides<?php endif ?>">
	<div class="container-large">
		<div class="flex-holder">
			<div class="content-left">
				<?php if ($sideimage): ?>
					<div class="image-holder<?php if ($addpinkoverlay): ?> pinkoverlay<?php endif ?><?php if ($squareimage): ?> squareimg<?php endif ?>">
						<img src="<?php echo $sideimage['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimage['alt']; ?>">
					</div>
				<?php endif ?>
			</div>
			<div class="content-right">
				<div class="content">
					<?php if ($subheading): ?>
						<p class="eyebrow"><?php echo $subheading; ?></p>
					<?php endif ?>
					<?php if ($heading): ?>
						<h2><?php echo $heading; ?></h2>
					<?php endif ?>
					<?php if ($content): ?>
						<?php echo $content; ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>