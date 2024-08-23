<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\GetPostMetaImageRoute;

if (!function_exists('mxsfwninitializeRestRoutes')) {
    /**
     * Initialize and register all routes.
     */
    function mxsfwninitializeRestRoutes()
    {

        $routes = [
            new UpdatePostMetaImageRoute,
            new GetPostMetaImageRoute,
        ];

        foreach ($routes as $route) {

            $route->registerRoute();
        }
    }
}

add_action('rest_api_init', 'mxsfwninitializeRestRoutes');
