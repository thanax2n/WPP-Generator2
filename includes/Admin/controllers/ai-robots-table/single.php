<?php

/**
 * CONTROLLER.
 * 
 * Generate data for single robot's page.
 * 
 * VIEW: \includes\Admin\views\ai-robots-table\single.view.php
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\Tables\RobotsDataManager;

$itemId = isset($_GET['edit-item']) ? trim(sanitize_text_field($_GET['edit-item'])) : 0;

if (0 === $itemId) {

    mxsfwnGoBack(admin_url());
} else {

    $instance = new RobotsDataManager();

    $table = $instance->getTableName();

    $robot = $instance->getWPDB()->get_row(

        $instance->getWPDB()->prepare(
            "SELECT * FROM $table
            WHERE id='%d'",
            $itemId
        )
    );

    if ($robot) {

        mxsfwnView('ai-robots-table/single', [
            'robot'         => $robot,
            'robotsTable'   => $instance
        ]);
    } else {

        mxsfwnView('ai-robots-table/404', [
            'message' => 'Robot not found!'
        ]);
    }
}
