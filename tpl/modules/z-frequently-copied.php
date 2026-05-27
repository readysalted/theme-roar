<?php /******************************* LINK ACF FIELD *******************************************/ ?>

<?php  
$link = get_field('fwb_link', 'options');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} 
?>

<?php if ($link): ?>
	<p class="btn">
		<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
			<?php echo $link_title; ?>
		</a>
	</p>	
<?php endif ?>

<?php /******************************* REPEATER FIELD *******************************************/ ?>

<?php if( have_rows('fieldname') ): ?>
	<div class="flex-holder">
		<?php while ( have_rows('fieldname') ) : the_row(); ?>
			<?php 
			$heading = get_sub_field('heading');
			?>
			<?php if ($heading): ?>
				<p><?php echo $heading; ?></p>
			<?php endif ?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php /******************************* PLACEHOLDER IMAGE *******************************************/ ?>

<img src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.jpg" alt="<?php the_title(); ?>" width="300" height="300">

<?php /******************************* MODEL LINK AND POPUP *******************************************/ ?>

<a href="#team-member-<?php echo get_row_index(); ?>" data-fancybox data-touch="false"></a>

<div class="member-modal" id="team-member-<?php echo get_row_index(); ?>">
	<div class="content-scroll"></div>
</div>