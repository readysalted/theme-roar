<main>

	<?php 
	$heading = get_field('hc_cs_heading', 'options');
	$subheading = get_field('hc_cs_sub_heading', 'options');
	$content = get_field('hc_cs_content', 'options');
	$sideimg = get_field('hc_cs_side_image', 'options');
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
                        <?php } else { ?>
                            <h2 class="h1">Digital Marketing Case Studies: No ROAR Without Results</h2>
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

	<section class="case-studies">
	    <div class="container-large">
	        <div class="flex-holder">
	            <?php while (have_posts()) : the_post(); ?>
	            	<?php 
	            	$excerpt = get_field('excerpt');
	            	$excerptlimit = get_field('excerpt_limit');
					$tilestat = get_field('tile_stat');
					$tilestatinfo = get_field('tile_stat_info');
					?>
	            	<div class="study-tile">
	            		<a href="<?php echo get_permalink(); ?>">
	            			<div class="content">
	            				<?php if (get_the_post_thumbnail_url()){ ?>
				        			<div class="featured-image">
			                    		<img src="<?php echo get_the_post_thumbnail_url('', 'standard-horizontal'); ?>" alt="">
			                    	</div>
			                	<?php } ?>
	            				<h2 class="h4"><?php the_title(); ?></h2>
	            				<div class="tile-stat">
									<p class="stat"><?php echo $tilestat; ?></p>
									<p class="statinfo"><?php echo $tilestatinfo; ?></p>
								</div>
								<?php /*
								<div class="excerpt">
									<?ph
									p echo $excerpt; ?>
								</div>
								*/ ?>
								<div class="excerpt">
									<?php echo $excerptlimit; ?>
								</div>
	            				<p class="btn">View Case Study</p>
	            			</div>
	            		</a>	
	            	</div>
	            <?php endwhile; ?>
	        </div>
	    </div>
	</section>

	<?php $pagination = paginate_links( array( "next_text" => '', "prev_text" => '' ) ); 
    if( $pagination ) :
        global $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        ?>
        <div class="pagination">
            <div class="container-large">
                <div class="flex-holder">
                    <div class="pageination-left">
                        <?php echo 'Page ' . $paged . ' of ' . $wp_query->max_num_pages; ?>
                    </div>
                    <div class="pageination-right">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part('tpl/modules/content', 'brandslider'); ?>
    <?php get_template_part('tpl/modules/content', 'genericcta'); ?>

</main>