<main>

	<?php 
	$client = get_field('client');
	$client_logo = get_field('client_logo');
	$client_bio = get_field('client_bio');
	$client_testimonial = get_field('client_testimonial');
	$stat = get_field('stat');
	$stat_info = get_field('stat_info');
	?>

	<section class="standard-content standard-resource">
        <div class="container-large">
        	<div class="flex-holder">
	        	<div class="content-left">
	        		<div class="content">
		        		<?php if (get_the_post_thumbnail_url()){ ?>
	        			<div class="featured-image">
                    		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    	</div>
                	<?php } ?>
		        	</div>
	        	</div>
	        	<div class="content-right">
	        		<h1><?php the_title(); ?></h1>
		            <?php the_content(); ?>
		            <div class="form-holder">
		            	<?php echo do_shortcode('[gravityform id="2" title="true"]'); ?>
		            </div>
	        	</div>
        	</div>
        </div>
    </section>

</main>