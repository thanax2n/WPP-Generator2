<?php

defined('ABSPATH') || exit;

/**
 * Image.
 */

$imageUrl = is_numeric($metaBoxValue) ? wp_get_attachment_url((int) $metaBoxValue) : false;

$styleHidden = 'style="display: none;"';

?>

<!-- Image upload. -->
<div class="mx-image-uploader">

    <button class="mxsfwn_upload_image" <?php echo $imageUrl ? $styleHidden : ''; ?>>
        <?php esc_html_e('Choose image', 'wpp-generator-v2'); ?>
    </button>

    <input type="hidden" name="<?php esc_attr_e($postMetaKey); ?>" id="<?php esc_attr_e($postMetaKey); ?>" class="mxsfwn_upload_image--save" value="<?php esc_html_e($metaBoxValue, 'wpp-generator-v2'); ?>" />

    <!-- Show an image. -->
    <img src="<?php echo $imageUrl ? esc_url($imageUrl) : ''; ?>" style="width: 300px;" alt="" class="mxsfwn_upload_image--show" <?php echo $imageUrl == '' ? $styleHidden : ''; ?> />

    <!-- Remove image. -->
    <a href="#" class="mxsfwn_upload_image--remove" <?php echo !$imageUrl ? $styleHidden : ''; ?>>
        <?php esc_html_e('Remove Image', 'wpp-generator-v2'); ?>
    </a>

</div>