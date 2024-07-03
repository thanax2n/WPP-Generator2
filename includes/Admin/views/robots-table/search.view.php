<?php

defined('ABSPATH') || exit;

/**
 * Search form.
*/
// go back and rewrite with sprintf

?>
<p class="search-box">
    <label 
        class="screen-reader-text"
        for="<?php esc_attr_e($inputId); ?>"
    >
        <?php esc_html_e($text); ?>:
    </label>
    <input 
        type="search"
        id="<?php esc_attr_e($inputId); ?>"
        name="s"
        value="<?php _admin_search_query(); ?>" 
    />
    <?php submit_button(esc_html($text), '', '', false, [
        'id' => "{$uniqueString}-search-submit"
    ]); ?>
</p>