<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\GetPostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\DeletePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\TasksManager\GetTaskListRoute;
use MXSFWNWPPGNext\Features\API\Routes\TasksManager\UpdateTaskListRoute;

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
            new GetTaskListRoute,
            new UpdateTaskListRoute,
        ];

        foreach ($routes as $route) {

            $route->registerRoute();
        }
    }
}

add_action('rest_api_init', 'mxsfwnInitializeRestRoutes');
