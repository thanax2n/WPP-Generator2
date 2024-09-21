<?php

/**
 * VIEW.
 * 
 * Edit robot's page.
 * 
 * CONTROLLER: \includes\Admin\controllers\ai-robots-table\single.php
 */

defined('ABSPATH') || exit;

?>
<div class="mx-single-table-item-wrap">

    <h1><?php esc_html_e( 'Edit Table Item', 'wpp-generator-next' ); ?></h1>

    <a href="<?php echo esc_url_raw(admin_url("admin.php?page={$robotsTable->mainMenuSlug()}")); ?>">

        <?php esc_html_e( 'Go Back', 'wpp-generator-next' ); ?>
    </a>

    <br>
    <br>

    <div class="<?= $robotsTable->getUniqueString() ?>_block_wrap">

        <form 
            id="<?= $robotsTable->getUniqueString() ?>_form_update"
            class="mx-settings"
            method="post"
            action="<?= esc_url_raw(admin_url("admin.php?page={$robotsTable->getEditSlug()}")); ?>"
        >

            <input
                type="hidden"
                id="edit-item"
                name="edit-item"
                value="<?= $robot->id; ?>"
            />

            <div>
                <label for="<?= $robotsTable->getUniqueString() ?>-title">                    
                    <?php esc_html_e( 'Title', 'wpp-generator-next' ); ?>
                </label>

                <br>

                <input
                    type="text"
                    name="title"
                    id="<?= $robotsTable->getUniqueString() ?>-title"
                    value="<?= $robot->title; ?>"
                />
            </div>

            <br>

            <div>
                <label for="<?= $robotsTable->getUniqueString() ?>-description">

                    <?php esc_html_e( 'Description', 'wpp-generator-next' ); ?>
                </label>

                <br>

                <textarea
                    name="description"
                    id="<?= $robotsTable->getUniqueString() ?>-description"
                    rows="8"
                    cols="60"
                ><?php esc_html_e(trim($robot->description)); ?></textarea>
            </div>

            <p class="mx-submit_button_wrap">
                
                <input
                    type="hidden"
                    id="<?= $robotsTable->getUniqueString() ?>-wp-nonce"
                    name="<?= $robotsTable->getUniqueString() ?>-wp-nonce"
                    value="<?= wp_create_nonce("{$robotsTable->getUniqueString()}-edit"); ?>"
                />

                <input
                    class="button-primary"
                    type="submit"
                    name="<?= $robotsTable->getUniqueString() ?>-submit"
                    value="<?php esc_html_e( 'Save', 'wpp-generator-next' ); ?>"
                />
            </p>
        </form>
    </div>
</div>