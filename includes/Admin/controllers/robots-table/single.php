<?php

/**
 * Controller.
 * This file is used for Custom table single item.
 * Here a user can edit an element.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$itemId = isset($_GET['edit-item']) ? trim(sanitize_text_field($_GET['edit-item'])) : 0;

if (0 === $itemId) {

    mxsfwnGoBack(admin_url());
} else {

    $instance = new RobotsTable();

    $table = $instance->getTableName();

    $robot = $instance->getWPDB()->get_row(

        $instance->getWPDB()->prepare(
            "SELECT * FROM $table
            WHERE id='%d'",
            $itemId
        )
    );

    if ($robot) {

        mxsfwnView('robots-table/single', [
            'robot'         => $robot,
            'robotsTable'   => $instance
        ]);
    } else {

        mxsfwnView('robots-table/404', [
            'message' => 'Robot not found!'
        ]);
    }
}
