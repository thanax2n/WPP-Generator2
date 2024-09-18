<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\GetPostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\DeletePostMetaImageRoute;

if (!function_exists('mxsfwninitializeRestRoutes')) {
    /**
     * Initialize and register all routes.
     */
    function mxsfwninitializeRestRoutes()
    {

        $routes = [
            new UpdatePostMetaImageRoute,
            new GetPostMetaImageRoute,
            new DeletePostMetaImageRoute,
        ];

        foreach ($routes as $route) {

            $route->registerRoute();
        }
    }
}

add_action('rest_api_init', 'mxsfwninitializeRestRoutes');
