<main>
	
	<?php 
	$heading = get_field('hc_c_heading', 'options');
	$subheading = get_field('hc_c_sub_heading', 'options');
	$content = get_field('hc_c_content', 'options');
	$sideimg = get_field('hc_c_side_image', 'options');
	?>

	<section class="hero inner-hero standard">
   		<div class="container-large">
            <div class="flex-holder">
                <div class="content-left">
                    <div class="content">
                        <?php if ($subheading){ ?>
                            <h1 class="eyebrow"><?php echo $subheading; ?></h1>
                        <?php } ?> 
                        <?php if ($heading){ ?>
                            <h2 class="h1"><?php echo $heading; ?></h2>
                        <?php } ?> 
                        <?php if ($sideimg): ?>
                            <div class="image-holder">
                                <img src="<?php echo $sideimg['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimg['alt']; ?>">
                            </div>
                        <?php endif ?>
                        <?php if ($content): ?>
                        	<?php echo $content; ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="content-right">
                    <?php if ($sideimg): ?>
                        <div class="image-holder">
                            <img src="<?php echo $sideimg['sizes']['standard-horizontal']; ?>" alt="<?php echo $sideimg['alt']; ?>">
                        </div>
                    <?php endif ?>
                </div>
            </div>  
        </div>
    </section>

	<section class="careers">
	    <div class="container-large">
	        <div class="flex-holder">
	            <?php while (have_posts()) : the_post(); ?>
	            	<?php 
	            	$type = get_field('job_type');
	            	$level = get_field('job_level');
	            	$salary = get_field('salary');
	            	?>
	            	<div class="career-tile">
	            		<a href="<?php echo get_permalink(); ?>">
	            			<div class="content">
	            				<h2 class="h4"><?php the_title(); ?></h2>
	            				<?php if ($type): ?>
	            					<p><strong>Type:</strong> <?php echo $type; ?></p>
	            				<?php endif ?>
	            				<?php if ($level): ?>
	            					<p><strong>Level:</strong> <?php echo $level; ?></p>
	            				<?php endif ?>
	            				<?php if ($salary): ?>
	            					<p><strong>Salary:</strong> <?php echo $salary; ?></p>
	            				<?php endif ?>
	            			</div>
	            		</a>	
	            	</div>
	            <?php endwhile; ?>
	        </div>
	    </div>
	</section>

</main>