<main>

	<?php 
	$client = get_field('client');
	$client_logo = get_field('client_logo');
	$client_bio = get_field('client_bio');
	$client_testimonial = get_field('client_testimonial');
	$testimonial_name = get_field('testimonial_name');
	$testimonial_role = get_field('testimonial_role');
	$stat = get_field('stat');
	$stat_info = get_field('stat_info');
	?>

	<section class="standard-content standard-casestudy">
        <div class="container-large">
        	<div class="flex-holder">
	        	<div class="content-left">
	        		<div class="content-holder">
		        		<div class="content">
			        		<?php if ($client): ?>
			        			<div class="client-info">
			        				<?php if ($client_logo): ?>
			        					<div class="client-img">
			        						<img src="<?php echo $client_logo['url']; ?>" alt="<?php echo $client_logo['alt']; ?>">
			        					</div>
			        				<?php endif ?>
			        				<div class="client-name">
			        					<h2><?php echo $client; ?></h2>
			        				</div>
			        			</div>
			        		<?php endif ?>
			        		<?php if( have_rows('services_used') ): ?>
			        			<h3>Services used</h3>
								<ul>
								<?php while ( have_rows('services_used') ) : the_row(); ?>
									<?php 
									$link = get_sub_field('service');
									if ($link) {
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self'; 
									} ?>
									<?php if ($link): ?>
										<li>
											<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
												<?php echo $link_title; ?>
											</a>
										</li>
									<?php endif ?>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
			        		<?php if ($client_bio): ?>
			        			<h3>Client bio</h3>
			        			<p><?php echo $client_bio; ?></p>
			        		<?php endif ?>
			        		<?php if ($client_testimonial): ?>
			        			<h3>Client testimonial</h3>
			        			<p>"<?php echo $client_testimonial; ?>"</p>
			        			<?php if ($testimonial_name){ ?>
			        				<p class="name"><strong><?php echo $testimonial_name; ?></strong></p>
			        			<?php } ?>
			        			<?php if ($testimonial_role){ ?>
			        				<p class="role"><?php echo $testimonial_role; ?></p>
			        			<?php } ?>
			        		<?php endif ?>
			        	</div>
			        </div>
	        	</div>
	        	<div class="content-right">
	        		<?php if (get_the_post_thumbnail_url()){ ?>
	        			<div class="featured-image">
                    		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    	</div>
                	<?php } ?>
	        		<p class="eyebrow"><?php the_time( 'j F, Y' ); ?></p>
	        		<h1><?php the_title(); ?></h1>
		            <?php the_content(); ?>	
		            <?php if( have_rows('stats') ): ?>
						<div class="list-holder">
							<?php while ( have_rows('stats') ) : the_row(); ?>
								<?php 
								$statistic = get_sub_field('statistic');
								$stat_heading = get_sub_field('stat_heading');
								$stat_content = get_sub_field('stat_content');
								$icon = get_sub_field('icon');
								?>
								<div class="row">
									<?php if ($icon): ?>
										<div class="icon">
											<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
										</div>
									<?php endif ?>
									<div class="row-left">
										<?php if ($statistic): ?>
											<p><?php echo $statistic; ?></p>
										<?php endif ?>	
									</div>
									<div class="row-right">
										<?php if ($stat_heading): ?>
											<p class="heading"><?php echo $stat_heading; ?></p>
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

    <?php get_template_part('tpl/modules/content', 'casestudiesslidertwocolumns'); ?>

</main>