<?php
function enqueue_leaflet_scripts()
{
   // Enqueue Leaflet.js library
   wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js');

   // Enqueue Leaflet CSS
   wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css');
}
add_action('wp_enqueue_scripts', 'enqueue_leaflet_scripts');

function custom_leaflet_map_shortcode($atts)
{
   // Extract shortcode attributes
   $atts = shortcode_atts(array(
      'width' => '600px',
      'height' => '400px',
      'latitude' => '51.505',
      'longitude' => '-0.09',
      'zoom' => '13',
      'city' => 'Your City',
   ), $atts);

   // Sanitize and escape attribute values
   $width = esc_attr($atts['width']);
   $height = esc_attr($atts['height']);
   $latitude = esc_attr($atts['latitude']);
   $longitude = esc_attr($atts['longitude']);
   $zoom = esc_attr($atts['zoom']);
   $city = esc_attr($atts['city']);
 
   // Generate the Leaflet map HTML
   $map_html = "<div id='leaflet-map' style='width: {$width}; height: {$height};'></div>
                 <script>
                     var map = L.map('leaflet-map').setView([$latitude, $longitude], $zoom);
                     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                     L.marker([$latitude, $longitude]).addTo(map)
                        .bindPopup('City: {$city}')
                        .openPopup();
                 </script>";

   return $map_html;
}
add_shortcode('leaflet_map', 'custom_leaflet_map_shortcode');
