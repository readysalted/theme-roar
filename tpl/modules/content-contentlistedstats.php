<?php 
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
?>

<section class="contentlistedstats">
	<div class="container-large">
		<div class="flex-holder">
			<div class="content-left">
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
			<div class="content-right">
				<?php if( have_rows('stats') ): ?>
					<div class="list-holder">
						<?php while ( have_rows('stats') ) : the_row(); ?>
							<?php 
							$statistic = get_sub_field('statistic');
							$stat_heading = get_sub_field('stat_heading');
							$stat_content = get_sub_field('stat_content');
							?>
							<div class="row">
								<div class="row-left">
									<?php if ($statistic): ?>
										<p><?php echo $statistic; ?></p>
									<?php endif ?>	
								</div>
								<div class="row-right">
									<?php if ($stat_heading): ?>
										<p class="heading"><?php echo $stat_heading; ?></p>
									<?php endif ?>	
									<?php if ($stat_content): ?>
										<p class="content"><?php echo $stat_content; ?></p>
									<?php endif ?>	
								</div>
							</div>
						<?php endwhile; ?> 
					</div>
				<?php endif; ?>
			</div>
		</div>	
	</div>
</section>