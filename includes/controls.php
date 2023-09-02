<?php
add_action('admin_init', 'pqc_display_qr_code_settings');
function pqc_display_qr_code_settings()
{
   add_settings_section(
      'pqc_section',
      __('Posts to Qr code', 'pqc-by-rez'),
      'pqc_section_callback',
      'general'
   );

   add_settings_field(
      'pqc_height',
      __('Qr code Height', 'pqc_settings_init'),
      'pqc_display_height',
      'general',
      'pqc_section'
   );
   add_settings_field(
      'pqc_width',
      __('Qr code Width', 'pqc_settings_init'),
      'pqc_display_width',
      'general',
      'pqc_section'
   );
   register_setting('general', 'pqc_height', array('sanitize_callback' => 'esc_attr'));
   register_setting('general', 'pqc_width', array('sanitize_callback' => 'esc_attr'));
}
function    pqc_section_callback()
{
   $settings_heading = 'Settings for posts to QR plugin';
   echo '<p>' . esc_html__($settings_heading, 'pqc-by-rez') . '</p>';
}

function pqc_display_height()
{
   $height = get_option('pqc_height');
?>
   <?php
   printf('<input type="text" id="%s" name="%s" value="%s" />', 'pqc_height', 'pqc_height', $height);   ?>

   <p class="description"><?php _e('Enter the QR code height in pixels.', 'pqc_settings_init'); ?></p>
<?php
}
function pqc_display_width()
{
   $width = get_option('pqc_width');
?>
   <?php
   printf('<input type="text" id="%s" name="%s" value="%s" />', 'pqc_width', 'pqc_width', $width);   ?>

   <p class="description"><?php _e('Enter the QR code width in pixels.', 'pqc_settings_init'); ?></p>
<?php
}
