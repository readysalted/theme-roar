<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$swapsides = get_field('gcta_swap_sides', 'options');
$fullheightimage = get_field('gcta_full_height_image', 'options');
$thinnerimage = get_field('gcta_thinner_image', 'options');
$addsecondarycontentblock = get_field('gcta_add_secondary_content_block', 'options');
$addpinkoverlay = get_field('gcta_add_pink_overlay', 'options');
$addsecondbutton = get_field('gcta_add_second_button', 'options');
$subheading = get_field('gcta_sub_heading', 'options');
$heading = get_field('gcta_heading', 'options');
$content = get_field('gcta_content', 'options');
$secondarycontent = get_field('gcta_secondary_content', 'options');
$sideimage = get_field('gcta_side_image', 'options');
$link = get_field('gcta_link', 'options');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} 
$secondlink = get_field('gcta_second_link', 'options');
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
						<?php if( have_rows('gcta_icon_&_content', 'options') ): ?>
							<div class="icons-holder">
								<?php while ( have_rows('gcta_icon_&_content', 'options') ) : the_row(); ?>
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