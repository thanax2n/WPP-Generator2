<?php

/**
 * CONTROLLER.
 * 
 * STORE ACTION.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

$robotId = $instance->storeRobot();

$url = is_numeric($robotId) ?
    sprintf(
        "%s&edit-item=%d",
        esc_url_raw(admin_url("admin.php?page={$instance->getSingleMenuSlug()}")),
        $robotId
    ) :
    esc_url_raw(
        admin_url("admin.php?page={$instance->mainMenuSlug()}")
    );

mxsfwnRedirectTo($url);
