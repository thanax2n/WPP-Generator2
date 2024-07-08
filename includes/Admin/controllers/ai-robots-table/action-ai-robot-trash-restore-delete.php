<?php

/**
 * CONTROLLER.
 * 
 * This file is used for Custom table actions.
 * When a user clicks a Trash, Restore
 * or Delete button here fires appropriate actions.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\Tables\RobotsDataManager;

$instance = new RobotsDataManager();

$instance->prepareActionAndCommit($_GET);

mxsfwnGoBack(admin_url());
