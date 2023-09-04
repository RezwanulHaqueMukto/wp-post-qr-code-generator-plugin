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
      'pqc_display_field',
      'general',
      'pqc_section',
      array('pqc_height')
   );
   add_settings_field(
      'pqc_width',
      __('Qr code Width', 'pqc_settings_init'),
      'pqc_display_field',
      'general',
      'pqc_section',
      array('pqc_width')
   );
   add_settings_field(
      'pqc_country', 
      __('Select Country', 'pqc_settings_init'),
      'pqc_display_select_field', 
      'general',
      'pqc_section'
   );
   register_setting('general', 'pqc_height', array('sanitize_callback' => 'esc_attr'));
   register_setting('general', 'pqc_width', array('sanitize_callback' => 'esc_attr'));
   register_setting('general', 'pqc_country', array('sanitize_callback' => 'esc_attr'));
}

function pqc_display_select_field()
{
   $option = get_option('pqc_country'); 
   $countries = array('None', 'Afghanistan', 'Bangladesh', 'India', 'Nepal');

   printf('<select id="%s" name="%s"  >', 'pqc_country', 'pqc_country'); 
   foreach ($countries as $country) {
      $selected = ($option == $country) ? 'selected' : '';
      printf('<option value="%s" %s>%s</option>', $country, $selected, $country);
   }
   echo '</select>';
}

function    pqc_section_callback()
{
   $settings_heading = 'Settings for posts to QR plugin';
   echo '<p>' . esc_html__($settings_heading, 'pqc-by-rez') . '</p>';
}

function pqc_display_field($args)
{
   $option = get_option($args[0]);
?>
   <?php
   printf('<input type="text" id="%s" name="%s" value="%s" />', $args[0], $args[0], $option);   ?>

   <p class="description"><?php _e('Enter the QR code height in pixels.', 'pqc_settings_init'); ?></p>
<?php
}
