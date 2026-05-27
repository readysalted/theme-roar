<?php
$heading = get_sub_field('heading');
$intro = get_sub_field('intro');
$content = get_sub_field('content');
$incnav = get_sub_field('include_sidenav');
//$incdownloads = get_sub_field('include_file_downloads');
//$incteam = get_sub_field('include_team_members');
//$navtype = get_sub_field('sidenav_type');
//$navtype = 'sidenav_' . $navtype;
?>

<section class="standard-content<?php if ($incnav): ?> inc-nav<?php endif ?>">
	<div class="container">
		<div class="flex-holder">
			<div class="content-left">
				<div class="content">
					<?php if ($heading): ?>
						<h2><?php echo $heading; ?></h2>
					<?php endif ?>
					<?php if ($intro): ?>
						<div class="intro">
							<?php echo $intro; ?>
						</div>
					<?php endif ?>
					<?php if ($content): ?>
						<?php echo $content; ?>
					<?php endif ?>
				</div>
				<?php /*
				if ($incdownloads): ?>
					<?php if( have_rows('downloads') ): ?>
						<?php while ( have_rows('downloads') ) : the_row(); ?>
							<?php
							$filetitle = get_sub_field('file_name');
							$desc = get_sub_field('file_description');
							$file = get_sub_field('file');
							$ftype = $file['subtype'];
							$fsize = $file['filesize'];
							?> 

							<a href="<?php echo $file['url']; ?>" target="_blank">
								<div class="file-holder">
									<p><?php echo $filetitle; ?></p>
									<p><?php echo $desc; ?></p>
									<p class="file-info"><?php echo esc_html($ftype); ?>, <?php echo formatSizeUnits( esc_html($fsize) ); ?></p>
								</div>
							</a> 

						<?php endwhile; ?>
					<?php endif; ?>	
				<?php endif */ ?>
			</div>

			<?php /*
			if ($incnav): ?>
			<div class="content-right">
				<div class="content">
					<div class="heading">
						<h3>In this section:</h3>
					</div>
					<div class="nav-list">
						<?php if( have_rows($navtype , 'options') ): ?>
							<?php while ( have_rows($navtype , 'options') ) : the_row(); ?>
								<?php $link = get_sub_field('link_and_title', 'options');
								$desc = get_sub_field('description', 'options');
								if ($link) {
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self'; 
								}
								$current_url = get_permalink( get_the_ID() );
								$active = 0;
								if ($link_url == $current_url) {
									$active = 1;
								} ?>

								<a class="nav-item<?php if ($active): ?> active<?php endif ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
									<div class="list-item">
										<p class="title"><?php echo $link_title; ?><span></span></p>
										<p class="desc"><?php echo $desc; ?></p>	
									</div>
								</a>
							<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</div>
			</div>
			<?php endif */ ?>

		</div>
	</div>
</section>