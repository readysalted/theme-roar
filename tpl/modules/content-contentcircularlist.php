<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} ?>

<section class="contentcircularlist">
	<div class="container-large">
		<div class="flex-holder">
			<div class="content-left">
				<div class="background">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/middle-first-circle.png" alt="<?php the_title(); ?>" width="429" height="429">
				</div>
				<?php if( have_rows('list_items') ): ?>
					<div class="list-holder">
						<?php while ( have_rows('list_items') ) : the_row(); ?>
							<?php 
							$icon = get_sub_field('icon');
							$licontent = get_sub_field('content');
							?>
							<div class="item-holder">
								<div class="icon-content">
									<?php if ($icon): ?>
										<img src="<?php echo $icon['url']; ?>" alt="">
									<?php endif ?>
									<?php if ($licontent): ?> 
										<p><?php echo $licontent; ?></p>
									<?php endif ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="content-right">
				<?php if ($subheading): ?>
					<p class="eyebrow"><?php echo $subheading; ?></p>
				<?php endif ?>
				<?php if ($heading): ?>
					<h2><?php echo $heading; ?></h2>
				<?php endif ?>
				<?php if ($content): ?>
					<?php echo $content; ?>
				<?php endif ?>
				<?php /* if ($link): ?>
					<p class="btn">
						<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
							<?php echo $link_title; ?>
						</a>
					</p>
				<?php endif */ ?>
				<?php if ($link): ?>
					<div class="link-flex">
                        <p class="btn">
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
                            </a>
                        </p>
	                     <?php if ($rtratingtext): ?>
		                    <div class="rating">
		                        <div class="stars">
		                            <span></span>
		                            <span></span>
		                            <span></span>
		                            <span></span>
		                            <span></span>
		                        </div>
		                        <p><?php echo $rtratingtext; ?></p>
		                    </div>
	                    <?php endif ?>
                	</div> 
                <?php endif ?>
			</div>
		</div>
	</div>
</section>