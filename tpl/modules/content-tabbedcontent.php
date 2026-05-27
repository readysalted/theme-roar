<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$sub_heading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
//$centeraligntabs = get_sub_field('center_align_tabs');
?>
<section class="tabbedcontent">
	<div class="container">
		<div class="intro">
			<?php if ($sub_heading): ?>
				<p class="eyebrow"><?php echo $sub_heading; ?></p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
		</div>
		<?php if( have_rows('tabs') ): ?>
			<div class="tabs-block">
				<div class="tabs centred-tabs">
					<?php $i = 0; while ( have_rows('tabs') ) : the_row(); ?>
						<?php $tabtext = get_sub_field('tab_text'); ?>
						<div class="tab<?php echo ($i === 0) ? ' active' : ''; ?>" data-tab="<?php echo $i; ?>">
							<?php if ($tabtext ): ?>
								<p><?php echo $tabtext; ?></p>
							<?php endif ?>
						</div>
					<?php $i++; endwhile; ?>
				</div>
				<div class="contents">
					<?php $i = 0; while ( have_rows('tabs') ) : the_row(); ?>
						<?php 
						$swapsides = get_sub_field('swap_sides');
						$heading = get_sub_field('heading');
						$sub_heading = get_sub_field('sub_heading');
						$content = get_sub_field('content');
						$side_image = get_sub_field('side_image');
						$link = get_sub_field('link');
						if ($link) {
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self'; 
						} 
						?>
						<div class="content-block<?php echo ($i === 0) ? ' active' : ''; ?>" data-tab="<?php echo $i; ?>">
							<div class="flex-holder<?php if ($swapsides): ?> swap-sides<?php endif ?>">
								<div class="content-left">
									<div class="content">
										<?php if ($heading): ?>
											<h3><?php echo $heading; ?></h3>
										<?php endif ?>
										<?php if ($sub_heading): ?>
											<p class="eyebrow"><?php echo $sub_heading; ?></p>
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
								<div class="content-right">
									<?php if ($side_image): ?>
										<div class="image-holder">
											<img src="<?php echo $side_image['sizes']['standard-horizontal']; ?>" alt="<?php echo $side_image['alt']; ?>">
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>