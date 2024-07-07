<?php

/**
 * CONTROLLER.
 * 
 * Add a robot page.
 * 
 * VIEW: \includes\Admin\views\robots-table\add-robot.view.php
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

mxsfwnView('robots-table/add-robot', [
    'robotsTable'   => $instance
]);
