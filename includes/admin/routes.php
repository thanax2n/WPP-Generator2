<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Router;

$router = new Router();

$router->get('mxsfwn-settings-page', 'main.php')->properties([
    'pageTitle' => 'WPP Generator Next'
]);

$router->route();
