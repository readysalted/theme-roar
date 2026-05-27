<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$heading = get_sub_field('heading');
$subheading = get_sub_field('sub_heading');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} 
?>
<section class="numberedcolumncontent">
	<div class="container">
		<div class="intro">
			<?php if ($subheading): ?>
				<p class="eyebrow"><?php echo $subheading; ?></p>	
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>	
			<?php endif ?>
		</div>

		<?php if( have_rows('columns') ): ?>
			<div class="flex-holder">
				<?php $i=0; while ( have_rows('columns') ) : the_row(); $i++; ?>
					<?php 
					$image = get_sub_field('image');
					$content = get_sub_field('content');
					?>
					<div class="column">
						<?php if ($image): ?>
							<div class="image-holder">
								<img src="<?php echo $image['sizes']['standard-horizontal']; ?>" alt="<?php echo $image['alt']; ?>">
							</div>
						<?php endif ?>
						<span class="number"><?php echo $i; ?></span>
						<?php if ($content): ?>
							<?php echo $content; ?>
						<?php endif ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<div class="outro">
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
</section>