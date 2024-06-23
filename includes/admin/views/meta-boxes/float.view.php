<?php

defined('ABSPATH') || exit;

/**
 * Input type number/float.
*/
?>

<input 
    type="number"
    id="<?php echo esc_attr($postMetaKey); ?>"
    name="<?php echo esc_attr($postMetaKey); ?>"
    value="<?php echo floatval($metaBoxValue); ?>"
    <?php echo $readonly == true ? 'readonly' : ''; ?>
/>
