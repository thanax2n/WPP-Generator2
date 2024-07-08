<?php

/**
 * CONTROLLER.
 * 
 * Add a robot page.
 * 
 * VIEW: \includes\Admin\views\ai-robots-table\add-robot.view.php
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\Tables\RobotsDataManager;

$instance = new RobotsDataManager();

mxsfwnView('ai-robots-table/add-robot', [
    'robotsTable'   => $instance
]);
