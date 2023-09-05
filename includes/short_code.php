<?php
add_shortcode('button', 'rez_button');
function rez_button($attrs)
{
   $default = array(
      'type' => 'primary',
      'title' => 'Button',
      'url' => '',
   );

   $get_attrs = shortcode_atts($default, $attrs);



   $output = sprintf(
      '<a type="button"  class="btn btn-%s" href="%s">%s</a>',
      $get_attrs['type'],
      $get_attrs['url'],
      $get_attrs['title']
   );



   return $output;
}

add_shortcode('button2', 'rez_button2');

function rez_button2($attrs, $content = null)
{
   $default = array(
      'type' => 'primary',
      'title' => 'Button',
      'url' => '',
   );

   $get_attrs = shortcode_atts($default, $attrs);


   if (empty($content)) {
      $content = 'mukto';
   }

   $output = sprintf(
      '<a type="button"  class="btn btn-%s" href="%s">%s</a>',
      $get_attrs['type'],
      $get_attrs['url'],
      do_shortcode($content)
   );
   return $output;
}
