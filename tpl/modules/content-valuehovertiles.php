<?php 
$sub_heading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
?>

<section class="valuehovertiles">
	<div class="container-large">
		<div class="content">
			<div class="intro">
				<?php if ($sub_heading): ?>
					<p class="eyebrow"><?php echo $sub_heading; ?></p>
				<?php endif ?>
				<?php if ($heading): ?>
					<h2><?php echo $heading; ?></h2>
				<?php endif ?>
			</div>
			<?php if( have_rows('tiles') ): ?>
				<div class="flex-holder">
					<?php $i=0; while ( have_rows('tiles') ) : the_row(); $i++; ?>
						<?php 
						$title = get_sub_field('title');
						$content = get_sub_field('content');
						?>
						<div class="card">
							<div class="card-content">
								<p class="number"><?php echo $i; ?></p>
								<?php if ($title): ?>
									<p class="title"><?php echo $title; ?></p>
								<?php endif ?>
								<?php if ($content): ?>
									<p class="fadein"><?php echo $content; ?></p>
								<?php endif ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>