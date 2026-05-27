<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$swapsides = get_sub_field('swap_sides');
//$fullheightimage = get_sub_field('full_height_image');
$thinnerimage = get_sub_field('thinner_image');
$addsecondarycontentblock = get_sub_field('add_secondary_content_block');
$addpinkoverlay = get_sub_field('add_pink_overlay');
$addsecondbutton = get_sub_field('add_second_button');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$secondarycontent = get_sub_field('secondary_content');
$sideimage = get_sub_field('side_image');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} 
$secondlink = get_sub_field('second_link');
if ($secondlink) {
    $link_url2 = $secondlink['url'];
    $link_title2 = $secondlink['title'];
    $link_target2 = $secondlink['target'] ? $secondlink['target'] : '_self'; 
} ?>

<section class="boxedcontentwithsideimage<?php if ($swapsides): ?> swapsides<?php endif ?><?php if ($fullheightimage): ?> fullheightimage<?php endif ?><?php if ($thinnerimage): ?> thinnerimage<?php endif ?>">
	<div class="container-large">
		<div class="content-holder">
			<div class="flex-holder">
				<div class="content-left">
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
						<?php if ($content): ?>
							<?php echo $content; ?>
						<?php endif ?>
						<?php if( have_rows('icon_&_content') ): ?>
							<div class="icons-holder">
								<?php while ( have_rows('icon_&_content') ) : the_row(); ?>
									<?php 
									$icon = get_sub_field('icon');
									$content = get_sub_field('content');
									?>
									<div class="row">
										<?php if ($icon): ?>
											<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
										<?php endif ?>
										<?php if ($content): ?>
											<?php echo $content; ?>
										<?php endif ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
						<?php if ($addsecondarycontentblock){ ?>
							<?php if ($secondarycontent): ?>
								<div class="further-content">
									<?php echo $secondarycontent; ?>
								</div>
							<?php endif ?>
						<?php } ?>
						<?php if ($link): ?>
							<div class="link-flex<?php if ($addsecondbutton){ ?> column<?php } ?>">
		                        <p class="btn">
		                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
		                                <?php echo $link_title; ?>
		                            </a>
		                            <?php if ($addsecondbutton): ?>
		                            	<a href="<?php echo $link_url2; ?>" target="<?php echo $link_target2; ?>">
		                                	<?php echo $link_title2; ?>
		                            	</a>
		                            <?php endif ?>
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
				<?php if ($sideimage): ?>
					<div class="content-right">
						<div class="image-holder<?php if ($addpinkoverlay): ?> pinkoverlay<?php endif ?>">
							<img src="<?php echo $sideimage['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimage['alt']; ?>">
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>