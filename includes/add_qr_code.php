<?php
add_filter('the_content', 'pqc_image_show');
function pqc_image_show($content)
{
   $get_current_post_id = get_the_ID();
   $get_current_post_title = get_the_title($get_current_post_id);
   $get_current_post_url = urldecode(get_the_permalink($get_current_post_id));
   $current_post_type = get_post_type($get_current_post_id);
   //?####### find post type########
   $excluded_post_types = apply_filters('pqc_excluded_post_type', array());

   if (in_array($current_post_type, $excluded_post_types)) {
      return $content;
   }
   //?###### qr code size#########
   $height = get_option('pqc_height');
   $width = get_option('pqc_width');
   $height = $height ? $height : 250;
   $width = $width ? $width : 250;
   $demission = apply_filters('pqc_qrcode_image_dimension', "{$width}x{$height}");
   $image_attribute = apply_filters('pqc_qrcode_image_attribute', '');

   // ?######qr code functionality######

   $image_src = sprintf('https://api.qrserver.com/v1/create-qr-code/?size=%s&ecc=L&qzone=1&data=https:%s', $demission, $get_current_post_url);
   $content .= sprintf('<div class="post-qrcode"><img %s src="%s" alt="%s"></div>', $image_attribute, $image_src, $get_current_post_title);
   return $content;
}
