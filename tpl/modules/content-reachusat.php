<?php
$heading = get_sub_field('heading');
$telephonefor = get_field('contact_telephone_formatted', 'options');
$telephoneunf = get_field('contact_telephone_unformatted', 'options');
$address = get_field('contact_address', 'options');
$email = get_field('contact_email_address', 'options');
?>

<section class="reachusat">
	<div class="container">
		<div class="flex-holder">
			<?php if ($heading): ?>
				<div class="col">
					<h2><?php echo $heading; ?></h2>
				</div>	
			<?php endif ?>
			<?php if ($telephonefor): ?>
				<div class="col">
					<span class="phone"></span>
					<div class="content">
						<p><strong>Phone:</strong></p>
						<p>
							<a href="tel:<?php echo $telephoneunf; ?>">
								<?php echo $telephonefor; ?>
							</a>
						</p>
					</div>
				</div>	
			<?php endif ?>
			<?php if ($telephonefor): ?>
				<div class="col">
					<span class="location"></span>
					<div class="content">
						<p><strong>Address:</strong></p>
						<p><?php echo $address; ?></p>
					</div>
				</div>	
			<?php endif ?>
			<?php if ($telephonefor): ?>
				<div class="col">
					<span class="email"></span>
					<div class="content">
						<p><strong>Email:</strong></p>
						<p>
							<a href="mailto:<?php echo $email; ?>">
								<?php echo $email; ?>
							</a>
						</p>
					</div>
				</div>	
			<?php endif ?>
		</div>
	</div>
</section>