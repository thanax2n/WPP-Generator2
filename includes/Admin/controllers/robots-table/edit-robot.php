<?php

/**
 * Controller.
 * Make PATCH request to this file.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

$instance->editRobot();

mxsfwnGoBack(admin_url());
