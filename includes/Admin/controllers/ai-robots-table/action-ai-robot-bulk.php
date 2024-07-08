<?php

/**
 * CONTROLLER.
 * 
 * This file is used for Custom table actions.
 * When a user selects a bulk action 
 * here fires appropriate actions.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\Tables\RobotsDataManager;

$instance = new RobotsDataManager();

$instance->bulkActions();

mxsfwnGoBack(admin_url());
