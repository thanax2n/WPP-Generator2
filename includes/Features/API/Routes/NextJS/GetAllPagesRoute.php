<?php

namespace MXSFWNWPPGNext\Features\API\Routes\NextJS;

use MXSFWNWPPGNext\Features\API\AbstractClasses\AbstractRestRouteHandler;
use WP_REST_Response;
use WP_Post;

/**
 * REST API route handler for retrieving all published pages.
 */
class GetAllPagesRoute extends AbstractRestRouteHandler
{
    protected $route = '/pages';
    protected $methods = 'GET';

    public function checkPermissions(): bool
    {

        return true;
    }

    public function handleRequest($request): WP_REST_Response
    {

        $pages = get_pages([
            'post_status' => 'publish',
        ]);

        $formatted_pages = array_map(function (WP_Post $page) {
            return [
                'id'      => $page->ID,
                'slug'    => $page->post_name,
                'title'   => get_the_title($page->ID),
                'excerpt' => get_the_excerpt($page->ID),
                'link'    => wp_parse_url(get_permalink($page->ID), PHP_URL_PATH),
                'content' => apply_filters('the_content', $page->post_content),
            ];
        }, $pages);

        return new WP_REST_Response([
            'ok'      => true,
            'pages'   => $formatted_pages,
            'message' => esc_html__('Retrieved all published pages.', 'wpp-generator-next'),
        ], 200);
    }
}
