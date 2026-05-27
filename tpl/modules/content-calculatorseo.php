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
                    <label for="keywordTraffic">Target Keyword Monthly Search Volume</label>
                    <input type="number" id="keywordTraffic" placeholder="e.g. 3000">
                </div>
                <div class="col">
                    <label for="clickThroughRate">Estimated Click-Through Rate (%)</label>
                    <input type="number" id="clickThroughRate" placeholder="e.g. 30">
                </div>
                <div class="col">
                    <label for="conversionRate">Conversion Rate (%)</label>
                    <input type="number" id="conversionRate" placeholder="e.g. 2">
                </div>
                <div class="col">
                    <label for="orderValue">Average Order Value (£)</label>
                    <input type="number" id="orderValue" placeholder="e.g. 100">
                </div>
                <button onclick="calculateKeywordValue()">Calculate</button>
                <div class="results" id="results" style="display: none;">
                    <h3>Results</h3>
                    <p><strong>Estimated Monthly Organic Visitors:</strong> <span id="organicVisitors"></span></p>
                    <p><strong>Estimated Monthly Conversions:</strong> <span id="monthlyConversions"></span></p>
                    <p><strong>Estimated Monthly Revenue:</strong> £<span id="monthlyRevenue"></span></p>
                </div>
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
    function calculateKeywordValue() {
      const keywordTraffic = parseFloat(document.getElementById('keywordTraffic').value);
      const clickThroughRate = parseFloat(document.getElementById('clickThroughRate').value);
      const conversionRate = parseFloat(document.getElementById('conversionRate').value);
      const orderValue = parseFloat(document.getElementById('orderValue').value);

      if (isNaN(keywordTraffic) || isNaN(clickThroughRate) || isNaN(conversionRate) || isNaN(orderValue)) {
        alert('Please fill in all fields with valid numbers.');
        return;
      }

      const organicVisitors = keywordTraffic * (clickThroughRate / 100);
      const monthlyConversions = organicVisitors * (conversionRate / 100);
      const monthlyRevenue = monthlyConversions * orderValue;

      document.getElementById('organicVisitors').textContent = organicVisitors.toFixed(0);
      document.getElementById('monthlyConversions').textContent = monthlyConversions.toFixed(0);
      document.getElementById('monthlyRevenue').textContent = monthlyRevenue.toFixed(2);

      document.getElementById('results').style.display = 'block';
    }
  </script>
  