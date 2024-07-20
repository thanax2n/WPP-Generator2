<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;

if (!function_exists('mxsfwninitializeRestRoutes')) {
    /**
     * Initialize and register all routes.
     */
    function mxsfwninitializeRestRoutes()
    {

        $routes = [
            new UpdatePostMetaImageRoute,
        ];

        foreach ($routes as $route) {

            $route->registerRoute();
        }
    }
}

add_action('rest_api_init', 'mxsfwninitializeRestRoutes');
