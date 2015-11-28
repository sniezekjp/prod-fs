<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( !function_exists( 'shortcode_gmap' ) ) {
	function shortcode_gmap($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'height' => '500',
				'lat' => '',
				'lng' => '',
				'icon' => '',
				'zoom' => '14',
				'dragging' => 'yes',
				'mousewheel' => 'yes'
		), $atts));

		$dragging = $dragging=='yes'? '1':'0';
		$mousewheel = $mousewheel=='yes'? '1':'0';
		$icon = $icon? $icon:TWOOT_URL.'/images/location.png';


		$html = '<div class="shortcode-gmap">';
		$html .= '<div id="gmap" style="width:100%; height:'.$height.'px;"></div>';
		$html .= '<ul class="map-controls">';
		$html .= '<li><a id="zoom-in"><i class="icon-plus-1"></i></a></li>';
		$html .= '<li><a id="zoom-out"><i class="icon-minus-1"></i></a></li>';
		$html .= '<li><a id="reset"><i class="icon-arrows-cw"></i></a></li>';
		$html .= '</ul>';
		$html .= '</div>';

		$html .= '
		<script type="text/javascript">
		jQuery(document).ready(function() {
			var myMarkers = {
				"markers": [
					{
						"latitude": "'.$lat.'",		// latitude
						"longitude": "'.$lng.'",		// longitude
						"icon": "'.$icon.'"
					}
				]
			};

			jQuery(".shortcode-gmap #gmap").mapmarker({
				zoom : '.$zoom.',							// Zoom
				center: "'.$lat.', '.$lng.'",		// Center of map
				type: "roadmap",					// Map Type
				controls: "HORIZONTAL_BAR",			// Controls style
				dragging: '.$dragging.',							// Allow dragging?
				mousewheel: '.$mousewheel.',	// Allow zooming with mousewheel
				markers: myMarkers,		
				styling: 0,							// Bool - do you want to style the map?
				featureType:"all",
				visibility: "on",
				elementType:"geometry",
				hue:"#00AAFF",
				saturation:-100,
				lightness:0,
				gamma:1,
				navigation_control:0
			});
		});
		</script>
		';

		return $html;
	}

	add_shortcode('gmap', 'shortcode_gmap');
}
?>