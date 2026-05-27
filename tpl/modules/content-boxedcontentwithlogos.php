<?php 
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$removebgbox = get_sub_field('remove_background_box');
?>

<section class="boxedcontentwithlogos<?php if ($removebgbox): ?> removebgbox<?php endif ?>">
	<div class="container-large">
		<div class="content">
			<div class="intro">
				<?php if ($subheading): ?>
					<p class="eyebrow"><?php echo $subheading; ?></p>
				<?php endif ?>
				<?php if ($heading): ?>
					<h2><?php echo $heading; ?></h2>
				<?php endif ?>
			</div>
			<div class="flex-holder">
				<div class="content-left">
					<?php if ($content): ?>
						<?php echo $content; ?>
					<?php endif ?>
				</div> 
				<div class="content-right">
					<?php $images = get_sub_field('logos');
					if( $images ): ?>
						<div class="gallery-holder">
					        <?php foreach( $images as $image ): ?>
					           	<div class="logo-holder">
					           		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					          	</div>
					        <?php endforeach; ?>
				        </div>
					<?php endif; ?>
				</div>		
			</div>
		</div>
	</div>
</section>