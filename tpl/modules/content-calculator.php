<?php 
$rtratingtext = get_field('rt_rating_text', 'options');
$subheading = get_sub_field('sub_heading');
$heading = get_sub_field('heading');
$link = get_sub_field('link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; 
} ?>

<section class="calculator">
	<div class="container-large">
		<div class="content-holder">
			<?php if ($subheading): ?>
				<p class="eyebrow"><?php echo $subheading; ?></p>
			<?php endif ?>
			<?php if ($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif ?>

            <div class="calc-holder">
                <div class="col">
                    <label for="budget">Monthly Budget (£):</label>
                    <input type="number" id="budget" placeholder="e.g. 2000">
                </div>
                <div class="col">
                    <label for="cpc">Cost Per Click (£):</label>
                    <input type="number" step="0.01" id="cpc" placeholder="e.g. 2.50">
                </div>
                <div class="col">
                    <label for="conversionRate">Conversion Rate (%):</label>
                    <input type="number" step="0.1" id="conversionRate" placeholder="e.g. 5">
                </div>
                <div class="col">
                    <label for="value">Lead/Order Value (£):</label>
                    <input type="number" step="0.01" id="value" placeholder="e.g. 150">
                </div>
                <div class="result" id="results"></div> 
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
    const inputs = document.querySelectorAll('input');
    const results = document.getElementById('results');

    inputs.forEach(input => input.addEventListener('input', calculate));

    function calculate() {
      const budget = parseFloat(document.getElementById('budget').value);
      const cpc = parseFloat(document.getElementById('cpc').value);
      const conversionRate = parseFloat(document.getElementById('conversionRate').value);
      const value = parseFloat(document.getElementById('value').value);

      if (!budget || !cpc || !conversionRate) {
        results.innerHTML = '<em>Please fill in at least Budget, CPC, and Conversion Rate.</em>';
        return;
      }

      const clicks = budget / cpc;
      const conversions = clicks * (conversionRate / 100);
      const costPerConversion = budget / conversions;

      let output = `<strong>Estimated Results:</strong><br>`;
      output += `Clicks per Month: <strong>${clicks.toFixed(0)}</strong><br>`;
      output += `Conversions per Month: <strong>${conversions.toFixed(0)}</strong><br>`;
      output += `Cost per Conversion: <strong>£${costPerConversion.toFixed(2)}</strong><br>`;

      if (value) {
        const revenue = conversions * value;
        const roas = revenue / budget;
        output += `Estimated Revenue: <strong>£${revenue.toFixed(2)}</strong><br>`;
        output += `ROAS: <strong>${roas.toFixed(2)}x</strong>`;
      }

      results.innerHTML = output;
    }
  </script>
