<?php

defined('ABSPATH') || exit;

use MXSFWNWppGenerator2\Activator;
use MXSFWNWppGenerator2\Deactivator;

/*
* Run during an activation.
*/
register_activation_hook(MXSFWN_PLUGIN_BASE_NAME, [Activator::class, 'init']);

/*
* Run during a deactivation.
*/
register_deactivation_hook(MXSFWN_PLUGIN_BASE_NAME, [Deactivator::class, 'init']);
