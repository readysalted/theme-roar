<main>
	
	<?php 
	$type = get_field('job_type');
	$level = get_field('job_level');
	$salary = get_field('salary');
	$qualifications = get_field('qualifications');
	?>

    <section class="standard-content standard-casestudy">
        <div class="container-large">
        	<div class="flex-holder">
	        	<div class="content-left">
	        		<div class="content-holder">
		        		<div class="content">
			        		<?php if ($type): ?>
								<p class="eyebrow"><strong>Type:</strong></p>
								<p><?php echo $type; ?></p>
							<?php endif ?>
							<?php if ($level): ?>
								<p class="eyebrow"><strong>Level:</strong></p>
								<p><?php echo $level; ?></p>
							<?php endif ?>
							<?php if ($salary): ?>
								<p class="eyebrow"><strong>Salary:</strong></p>
								<p><?php echo $salary; ?></p>
							<?php endif ?>
							<?php if ($salary): ?>
								<p class="eyebrow"><strong>Qualifications:</strong></p>
								<p><?php echo $qualifications; ?></p>
							<?php endif ?>
			        	</div>
			        </div>
	        	</div>
	        	<div class="content-right">
	        		<h1><?php the_title(); ?></h1>
		            <?php the_content(); ?>
	        	</div>
        	</div>
        </div>
    </section>

</main>	