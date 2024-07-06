<?php

/**
 * Controller.
 * This file is used for Custom table.
 * Here there will be display a custom table.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

$table = $instance->getTableName();

$isTable = $instance->getWPDB()->get_var(
    $instance->getWPDB()->prepare(
        'SHOW TABLES LIKE %s',
        $instance->getWPDB()->esc_like($table)
    )
);

mxsfwnView('robots-table/main', [
    'message' => 'The table is not available!',
    'tableInstance' => new RobotsTable(),
    'isTable' => $isTable,
    'uniqueString' => MXSFWN_PLUGIN_UNIQUE_STRING
]);
