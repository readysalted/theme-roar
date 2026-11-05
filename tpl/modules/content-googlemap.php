<section class="googlemap">
	<div class="container-large">
	<div id="foot-map" style="height: 650px; width: 100%;"></div>
	<script>
	 	function initMap(){
	 		var location = {lat: 55.01595575060401, lng: -1.5029244700157987 }; 
	 		const icon = {
			    url: "<?php echo get_bloginfo('template_directory'); ?>/assets/images/map-pin.png", // url
			    scaledSize: new google.maps.Size(100, 100), // scaled size
			    origin: new google.maps.Point(0, 0), // origin
			    //anchor: new google.maps.Point(170, 135) // anchor
			    anchor: new google.maps.Point(50, 100) // anchor
			};
	 		var map = new google.maps.Map(document.getElementById("foot-map"),{
	 			zoom: 17,
	 			center: location,
	 			styles: [{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#343332"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#343332"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"color":"#ff0000"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"color":"#343332"},{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"visibility":"on"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.stroke","stylers":[{"color":"#ff0000"},{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#343332"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#302f2e"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#343332"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#302f2e"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#000000"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"color":"#f1a8d4"},{"visibility":"on"},{"weight":"10.00"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#454545"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#191a1a"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"icon","stylers":[{"visibility":"off"}]}],
	 		});
			var marker = new google.maps.Marker({
	 			position: location,
	 			map: map,
	 			icon: icon
	 		});
	 	}
	</script> 
	<script async defer src="<?php echo esc_url( add_query_arg( array( 'key' => get_option( 'roar_google_maps_api_key', '' ), 'callback' => 'initMap' ), 'https://maps.googleapis.com/maps/api/js' ) ); ?>"></script>
	</div>
</section>