<?php

defined('ABSPATH') || exit;

/**
 * Image.
 */
?>

<?php $image_url = ''; ?>

<?php if ($metaBoxValue !== '') : ?>

    <?php $image_url = wp_get_attachment_url($metaBoxValue); ?>

<?php endif; ?>

<!-- Image upload. -->
<div class="mx-image-uploader">

    <button class="mxsfwn_upload_image" <?php echo $image_url !== '' ? 'style="display: none;"' : ''; ?>>Choose image</button>

    <input 
        type="hidden"
        name="<?php echo esc_attr($postMetaKey); ?>"
        id="<?php echo esc_attr($postMetaKey); ?>"
        class="mxsfwn_upload_image_save"
        value="<?php echo esc_html($metaBoxValue); ?>"
    />

    <!-- Show an image. -->
    <img 
        src="<?php echo $image_url !== '' ? esc_url($image_url) : ''; ?>"
        style="width: 300px;"
        alt=""
        class="mxsfwn_upload_image_show"
        <?php echo $image_url == '' ? 'style="display: none;"' : ''; ?>
    />

    <!-- Remove image. -->
    <a
        href="#"
        class="mxsfwn_upload_image_remove"
        <?php echo $image_url === '' ? 'style="display: none;"' : ''; ?>
    >Remove Image</a>

</div>