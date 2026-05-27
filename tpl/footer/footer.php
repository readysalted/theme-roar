<?php 
$logo 		= get_field('company_logo', 'options');
$phonefor 	= get_field('contact_telephone_formatted','options');
$phoneunfor = get_field('contact_telephone_unformatted','options');
$address 	= get_field('contact_address','options');
$email 		= get_field('contact_email_address','options');
$tp_txt		= get_field('fc_trustpilot_text','options');
$tp_link 	= get_field('social_trustpilot','options');
$gr_link 	= get_field('social_google_reviews','options');
?>

<footer class="main-footer">
	<div class="container-large">
		<div class="footer-top">
			<div class="flex-holder">
				<div class="col">
					<p class="eyebrow">Our Partners</p>

					<?php if( have_rows('partner_logos', 'options') ): ?>
						<div class="logos-holder">
							<?php while ( have_rows('partner_logos', 'options') ) : the_row(); ?>
								<?php 
								$slogo = get_sub_field('logo');
								$link = get_sub_field('link');
								?>
								<div class="logo-holder">
									<?php if ($link): ?>
										<a href="<?php echo $link; ?>" target="_blank">
									<?php endif ?>
										<?php if ($slogo): ?>
											<img src="<?php echo $slogo['url']; ?>" alt="<?php echo $slogo['alt']; ?>">
										<?php endif ?>
									<?php if ($link): ?>
										</a>
									<?php endif ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

				</div>
				<div class="col">
					<p class="eyebrow"><a href="<?php echo get_home_url(); ?>/services/">Services</a></p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'container' => false, ) ); ?>
				</div>
				<div class="col">
					<p class="eyebrow"><a href="<?php echo get_home_url(); ?>/sectors/">Sectors</a></p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'container' => false, ) ); ?>
				</div>
				<div class="col">
					<p class="eyebrow">Quick Links</p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3', 'container' => false, ) ); ?>
				</div>
				<div class="col">
					<p class="eyebrow"><a href="<?php echo get_home_url(); ?>/contact-us/">Contact</a></p>
					<?php if ($email): ?>
                        <p>
                        	<a href="mailto:<?php echo $email; ?>">
                            	<?php echo $email; ?>
                        	</a>
                        </p>
                    <?php endif ?>
					<?php if ($phonefor): ?>
                        <p>
                        	<a href="tel:<?php echo $phoneunfor; ?>">
                            	<?php echo $phonefor; ?>
                        	</a>
                       	</p>
                    <?php endif ?>
					<?php if ($address): ?>
						<p><?php echo $address; ?></p>
					<?php endif ?>
				</div>
				<div class="col">
					<p class="eyebrow">Socials</p>
					<div class="social-icons">
						<p>
						    <?php if( get_field('social_facebook', 'option') ): ?>
							    <a href="<?php echo get_field('social_facebook', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="facebook social-icon"><use xlink:href="#facebook" /><title>Facebook</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_x', 'option') ): ?>
							    <a href="<?php echo get_field('social_x', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="twitter social-icon"><use xlink:href="#twitter" /><title>X</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_linkedin', 'option') ): ?>
							    <a href="<?php echo get_field('social_linkedin', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="linkedin social-icon"><use xlink:href="#linkedin" /><title>Linkedin</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_instagram', 'option') ): ?>
							    <a href="<?php echo get_field('social_instagram', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="instagram social-icon"><use xlink:href="#instagram" /><title>Instagram</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_youtube', 'option') ): ?>
							    <a href="<?php echo get_field('social_youtube', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="youtube social-icon"><use xlink:href="#youtube" /><title>Youtube</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_gbp', 'option') ): ?>
							    <a href="<?php echo get_field('social_gbp', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="gbp social-icon"><use xlink:href="#gbp" /><title>GBP</title></svg>
							    </a>
						    <?php endif; ?>
						    <?php if( get_field('social_tiktok', 'option') ): ?>
							    <a href="<?php echo get_field('social_tiktok', 'option'); ?>" target="_blank" rel="noopener">
							        <svg role="img" class="tiktok social-icon"><use xlink:href="#tiktok" /><title>TikTok</title></svg>
							    </a>
						    <?php endif; ?>
						</p>
					</div>
					<p class="btn">
						<a href="https://seo.roardigitalmarketing.co.uk/login" target="_blank">
							DIY Platform Login
						</a> 
					</p>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="flex-holder">
				<?php if ($tp_txt): ?>
					<div class="review-links">
						<p><?php echo $tp_txt; ?></p>
						<?php if ($gr_link): ?>
							<a href="<?php echo $gr_link; ?>" target="_blank" style="margin-right: 10px;">
								<img src="<?php bloginfo('template_directory'); ?>/assets/images/googlereviews.webp" alt="Google Reviews">
							</a>	
						<?php endif ?>
						<?php if ($tp_link): ?>
							<a href="<?php echo $tp_link; ?>" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-trustpilot.svg" alt="Trustpilot">
							</a>	
						<?php endif ?>
					</div>
				<?php endif ?>

				<?php if ($logo): ?>
					<div class="logo-holder">
						<a href="<?php echo get_home_url(); ?>">
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
		                </a> 	
					</div>
				<?php endif ?>

				<p>
					Copyright © <?php echo date("Y"); ?> <strong><?php echo get_bloginfo(); ?></strong>
				</p>
			</div>
		</div>

	</div>
</footer>