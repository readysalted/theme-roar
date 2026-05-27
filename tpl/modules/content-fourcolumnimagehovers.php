<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$link = get_sub_field('link'); 
if ($link) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} ?>

<section class="fourcolumnimagehovers"> 
	<div class="container">
		<div class="intro">
			<?php if ($subheading): ?>
				<p class="eyebrow">
					<?php echo $subheading; ?>
				</p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
		</div>
		<?php if( have_rows('image_hovers') ): ?>
			<div class="flex-holder">
				<?php while ( have_rows('image_hovers') ) : the_row(); ?>
					<?php
					$bgimage = get_sub_field('background_image');
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					?>
					<div class="image-link">
						<div class="content-holder">
							<?php if ($bgimage): ?>
								<img src="<?php echo $bgimage['sizes']['standard-square']; ?>" alt="<?php echo $bgimage['alt']; ?>">	
							<?php endif ?>
							<div class="overlay"></div> 
							<div class="overlay-hover"></div> 
							<div class="content">
								<?php if ($heading): ?>
									<h3><?php echo $heading; ?></h3>	
								<?php endif ?>
								<?php if ($content): ?>
									<p><?php echo $content; ?></p>	
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php if ($link): ?>
			<div class="outro">
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
	        </div>
        <?php endif ?>
	</div>
</section>