<section class="alternatingcontent">
	<?php if( have_rows('content_blocks') ): ?>
		<?php while ( have_rows('content_blocks') ) : the_row(); ?>
			<?php 
			$heading = get_sub_field('heading');
			$subheading = get_sub_field('sub_heading');
			$sideimage = get_sub_field('side_image');
			$content = get_sub_field('content');
			$link = get_sub_field('link');
			if ($link) {
			    $link_url = $link['url'];
			    $link_title = $link['title'];
			    $link_target = $link['target'] ? $link['target'] : '_self'; 
			} ?>		
			<div class="content-block">
				<div class="container-large">
					<div class="flex-holder">
						<div class="content-left">
							<?php if ($sideimage): ?>
								<div class="image-holder">
									<img src="<?php echo $sideimage['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimage['alt']; ?>">
								</div>
							<?php endif ?> 
						</div> 
						<div class="content-right">
							<div class="content">
								<?php if ($heading): ?>
									<h2><?php echo $heading; ?></h2>
								<?php endif ?>
								<?php if ($subheading): ?>
									<p class="eyebrow"><?php echo $subheading; ?></p>
								<?php endif ?>
								<?php if ($content): ?>
									<?php echo $content; ?>
								<?php endif ?>
								<?php if( have_rows('arrowed_links') ): ?>
									<div class="links-holder"> 
										<?php while ( have_rows('arrowed_links') ) : the_row(); ?>
											<?php $arrowlink = get_sub_field('arrow_link');
											if ($arrowlink) {
											    $alink_url = $arrowlink['url'];
											    $alink_title = $arrowlink['title'];
											    $alink_target = $arrowlink['target'] ? $arrowlink['target'] : '_self'; 
											} ?>
											<div class="link">
												<a href="<?php echo $alink_url; ?>" target="<?php echo $alink_target; ?>">
													<?php echo $alink_title; ?>
												</a>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
								<?php if ($link): ?>
									<p class="btn">
										<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
											<?php echo $link_title; ?>
										</a>
									</p>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>