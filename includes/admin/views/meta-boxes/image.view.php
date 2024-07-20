<?php

defined('ABSPATH') || exit;

/**
 * Image.
 */

?>

<div class="mx-image-uploader"
    data-post-meta-key='<?php esc_attr_e($postMetaKey); ?>'
    data-post-id='<?php echo get_the_ID(); ?>'
    data-image-id='<?php echo intval($metaBoxValue); ?>'
></div>
