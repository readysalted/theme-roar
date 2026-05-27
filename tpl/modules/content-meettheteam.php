<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$unique_id = uniqid('swiper_'); 
$sub_heading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} ?>

<section class="meettheteam">
	<div class="container">
		<div class="intro">
			<?php if ($sub_heading): ?>
				<p class="eyebrow"><?php echo $sub_heading; ?></p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
		</div>
	</div>

	<?php if( have_rows('team_members') ): ?>
		<div class="swiper teamSwiper <?php echo $unique_id; ?>">
        	<div class="swiper-wrapper"> 
				<?php while ( have_rows('team_members') ) : the_row(); ?>
					<?php 
					$name = get_sub_field('name');
					$role = get_sub_field('role');
					$bio = get_sub_field('bio');
					$image = get_sub_field('image');
					$linkedinlink = get_sub_field('linkedin_link');
					?>
					<div class="swiper-slide member">
						<div class="content-holder">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							<div class="overlay-small"></div>
							<div class="overlay"></div>
							<div class="content">
								<?php if ($name): ?>
									<h3 class="h4"><?php echo $name; ?></h4>
								<?php endif ?>
								<?php if ($bio): ?>
									<p class="bio"><?php echo $bio; ?></p>
								<?php endif ?>
								<?php if ($role): ?>
									<p class="eyebrow"><?php echo $role; ?></p>
								<?php endif ?>
								<?php if ($linkedinlink): ?>
									<a href="<?php echo $linkedinlink; ?>" target="_blank">
										<span class="linkedin"></span>
									</a>
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="outro">
			<div class="arrows"> 
				<div class="swiper-arrow swiper-button-prev <?php echo $unique_id; ?>-prev"></div>
				<div class="swiper-arrow swiper-button-next <?php echo $unique_id; ?>-next"></div>
			</div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper('.<?php echo $unique_id; ?>', { 
            direction: 'horizontal',
            autoHeight: false,
            loop: false,
            slidesPerView: 1.25,
            spaceBetween: 24,
            slidesOffsetBefore: 20,
            slidesOffsetAfter: 20,
            observer: true,
            observeParents: true, 
            mousewheel: true,
	        mousewheel:{
	            forceToAxis: true,
	        },
            navigation: {
                nextEl: ".<?php echo $unique_id; ?>-next",
                prevEl: ".<?php echo $unique_id; ?>-prev",
            },
            breakpoints: {
              550: {
                slidesPerView: 1.75, 
              },
              768: {
                slidesOffsetBefore: 32,
                slidesOffsetAfter: 32,
              },
              800: {
                slidesPerView: 2.3, 
              },
              992: {
                slidesOffsetBefore: 28,
                slidesOffsetAfter: 28,
                slidesPerView: 3.25, 
              },
              1300: {
              	slidesOffsetBefore: 0,
                slidesOffsetAfter: 0,
                slidesPerView: 3, 
                spaceBetween: 32, 
                width: 1300,
              },
            },
        });
    });
</script>