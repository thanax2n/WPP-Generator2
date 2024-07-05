<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$robotsTableInstance = new RobotsTable();

$actionDone = $robotsTableInstance->prepareActionAndCommit($_GET);

// redirect
wp_redirect($_SERVER['HTTP_REFERER']);
