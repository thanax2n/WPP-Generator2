<?php

defined('ABSPATH') || exit;

/**
 * Input type number/int.
*/
?>

<input 
    type="number"
    id="<?php echo esc_attr($postMetaKey); ?>"
    name="<?php echo esc_attr($postMetaKey); ?>"
    value="<?php echo intval($metaBoxValue); ?>"
    <?php echo $readonly == true ? 'readonly' : ''; ?>
/>
