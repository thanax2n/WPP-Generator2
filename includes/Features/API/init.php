<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\GetPostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\DeletePostMetaImageRoute;

if (!function_exists('mxsfwnInitializeRestRoutes')) {
    /**
     * Initialize and register all routes (endpoints).
     */
    function mxsfwnInitializeRestRoutes()
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

add_action('rest_api_init', 'mxsfwnInitializeRestRoutes');
