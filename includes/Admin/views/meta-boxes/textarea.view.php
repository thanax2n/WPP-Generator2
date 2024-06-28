<?php

defined('ABSPATH') || exit;

/**
 * Input type textarea.
*/
?>

<textarea 
    id="<?php echo esc_attr($postMetaKey); ?>"
    name="<?php echo esc_attr($postMetaKey); ?>"
    cols="30" rows="10"
><?php echo esc_html( $metaBoxValue ); ?></textarea>
