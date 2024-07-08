<?php

/**
 * CONTROLLER.
 * 
 * Here fires edit an item action.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\Tables\RobotsDataManager;

$instance = new RobotsDataManager();

$instance->editRobot();

mxsfwnGoBack(admin_url());
