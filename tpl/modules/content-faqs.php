<?php 
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
?>

<section class="faqs">
	<div class="container">
		<div class="intro">
			<?php if ($subheading): ?>
			<p class="eyebrow"><?php echo $subheading; ?></p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>
		</div>
		<?php if( have_rows('faqs') ): ?>
			<div class="flex-holder">
				<?php while ( have_rows('faqs') ) : the_row(); ?>
					<?php 
					$question = get_sub_field('question');
					$answer = get_sub_field('answer');
					?>
					<div class="faq">
						<?php if ($question): ?>
							<p class="question"><?php echo $question; ?></p>
						<?php endif ?>
						<?php if ($answer): ?>
							<div class="answer">
								<?php echo $answer; ?>
							</div>
						<?php endif ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>