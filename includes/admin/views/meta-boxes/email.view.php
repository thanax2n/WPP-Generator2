<?php

defined('ABSPATH') || exit;

/**
 * Input type email.
*/
?>

<input 
    type="email"
    id="<?php echo esc_attr($postMetaKey); ?>"
    name="<?php echo esc_attr($postMetaKey); ?>"
    value="<?php echo esc_html($metaBoxValue); ?>"
    <?php echo $readonly == true ? 'readonly' : ''; ?>
/>
