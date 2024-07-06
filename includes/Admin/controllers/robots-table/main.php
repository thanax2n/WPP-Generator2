<?php

/**
 * Controller.
 * This file is used for Custom table.
 * Here there will be display a custom table.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$robotsTableInstance = new RobotsTable();

global $wpdb;

$tableName = $wpdb->prefix . 'ai_robots';

$isTable = $wpdb->get_var(
    $wpdb->prepare(
        'SHOW TABLES LIKE %s',
        $wpdb->esc_like($tableName)
    )
);

mxsfwnView('robots-table/main', [
    'message' => 'The table is not available!',
    'tableInstance' => new RobotsTable(),
    'isTable' => $isTable,
    'uniqueString' => MXSFWN_PLUGIN_UNIQUE_STRING
]);
