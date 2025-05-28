<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Features\API\Routes\UpdatePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\GetPostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\DeletePostMetaImageRoute;
use MXSFWNWPPGNext\Features\API\Routes\TasksManager\GetTaskListRoute;
use MXSFWNWPPGNext\Features\API\Routes\TasksManager\UpdateTaskListRoute;

// Next.js
use MXSFWNWPPGNext\Features\API\Routes\NextJS\GetStylesRoute;
use MXSFWNWPPGNext\Features\API\Routes\NextJS\GetAllPagesRoute;
use MXSFWNWPPGNext\Features\API\Routes\NextJS\GetPageBySlugRoute;
use MXSFWNWPPGNext\Features\API\Routes\NextJS\GetMenuItemsRoute;

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

            // Next.js
            new GetStylesRoute,
            new GetAllPagesRoute,
            new GetPageBySlugRoute,
            new GetMenuItemsRoute,
        ];

        foreach ($routes as $route) {

            $route->registerRoute();
        }
    }
}

add_action('rest_api_init', 'mxsfwnInitializeRestRoutes');
