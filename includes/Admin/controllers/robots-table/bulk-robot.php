<?php

/**
 * Controller.
 * Bulk actions.
 */

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Utilities\RobotsTable;

$instance = new RobotsTable();

$instance->bulkActions();

mxsfwnGoBack(admin_url());
