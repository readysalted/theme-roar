<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$swapsides = get_sub_field('swap_sides');
$aligntextleft = get_sub_field('align_text_left');
$addpinkoverlay = get_sub_field('add_pink_overlay');
//$fullheightimage = get_sub_field('full_height_image');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$sideimage = get_sub_field('side_image');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} ?>

<section class="boxedcontentcentredcontentlargeicons<?php if ($swapsides): ?> swapsides<?php endif ?>">
	<div class="container-large">
		<div class="content-holder">
			<div class="flex-holder">
				<?php if ($sideimage): ?>
					<div class="content-left">
						<div class="image-holder full-height<?php if ($addpinkoverlay): ?> pinkoverlay<?php endif ?>">
							<img src="<?php echo $sideimage['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimage['alt']; ?>">
						</div>
					</div>
				<?php endif ?>
				<div class="content-right<?php if ($aligntextleft): ?> aligntextleft<?php endif ?>">
					<div class="content">
						<?php if ($subheading): ?>
							<p class="eyebrow"><?php echo $subheading; ?></p>
						<?php endif ?>
						<?php if ($heading): ?>
							<h2><?php echo $heading; ?></h2>
						<?php endif ?>
						<?php if ($sideimage): ?>
							<div class="image-holder">
								<img src="<?php echo $sideimage['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimage['alt']; ?>">
							</div>
						<?php endif ?>
						<?php if( have_rows('icon_&_content') ): ?>
							<div class="icons-holder">
								<?php while ( have_rows('icon_&_content') ) : the_row(); ?>
									<?php 
									$icon = get_sub_field('icon');
									$heading = get_sub_field('heading');
									?>
									<div class="row">
										<?php if ($icon): ?>
											<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
										<?php endif ?>
										<?php if ($heading): ?>
											<p><?php echo $heading; ?></p>
										<?php endif ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
						<?php if ($content): ?>
							<?php echo $content; ?>
						<?php endif ?>
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
		</div>
	</div>
</section>