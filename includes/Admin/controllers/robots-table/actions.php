<?php

/**
 * Controller.
 * This file is used for Custom table actions.
 * When a user click Trash, Restore or Delete buttons
 * here fire appropriate actions.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

$instance->prepareActionAndCommit($_GET);

mxsfwnGoBack(admin_url());
