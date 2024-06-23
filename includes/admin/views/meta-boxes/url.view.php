<?php

defined('ABSPATH') || exit;

/**
 * Input type url.
*/
?>

<input 
    type="url"
    id="<?php echo esc_attr($postMetaKey); ?>"
    name="<?php echo esc_attr($postMetaKey); ?>"
    value="<?php echo esc_url_raw($metaBoxValue); ?>"
    <?php echo $readonly == true ? 'readonly' : ''; ?>
/>
