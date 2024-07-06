<?php

/**
 * Controller.
 * This file is used for Custom table actions.
 * When a user click Trash, Restore or Delete buttons
 * here fire appropriate actions.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$robotsTableInstance = new RobotsTable();

$actionDone = $robotsTableInstance->prepareActionAndCommit($_GET);

$backLink = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : admin_url();

printf('<script>;window.location.href="%s";</script>', $backLink);
