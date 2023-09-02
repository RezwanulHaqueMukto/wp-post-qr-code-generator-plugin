<?php
add_action('admin_init', 'pqc_display_qr_code_settings');
function pqc_display_qr_code_settings()
{
   add_settings_field(
      'pqc_height',
      __('Qr code Height', 'pqc_settings_init'),
      'pqc_display_height',
      'general'
   );
   register_setting('general', 'pqc_height', array('sanitize_callback' => 'esc_attr'));

  
}
function pqc_display_height()
{
   $height = get_option('pqc_height');
?>
   <input type="text" name="pqc_height" value="<?php echo esc_attr($height); ?>" />
   <p class="description"><?php _e('Enter the QR code height in pixels.', 'pqc_settings_init'); ?></p>
<?php
}
