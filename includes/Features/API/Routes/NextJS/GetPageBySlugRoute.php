<?php

namespace MXSFWNWPPGNext\Features\API\Routes\NextJS;

use MXSFWNWPPGNext\Features\API\AbstractClasses\AbstractRestRouteHandler;
use WP_REST_Request;
use WP_REST_Response;
use WP_Post;

/**
 * REST API route handler for retrieving a single page by slug.
 */
class GetPageBySlugRoute extends AbstractRestRouteHandler
{
    protected $route = '/pages/(?P<slug>[a-zA-Z0-9-]+)';
    protected $methods = 'GET';

    public function checkPermissions(): bool
    {
        return true;
    }

    public function handleRequest($request): WP_REST_Response
    {
        $slug = sanitize_title($request['slug']);

        $page = get_page_by_path($slug, OBJECT, 'page');

        if (! $page || $page->post_status !== 'publish') {
            return new WP_REST_Response([
                'ok'      => false,
                'message' => esc_html__('Page not found.', 'wpp-generator-next'),
            ], 404);
        }

        $data = [
            'id'      => $page->ID,
            'slug'    => $page->post_name,
            'title'   => get_the_title($page->ID),
            'excerpt' => get_the_excerpt($page->ID),
            'content' => apply_filters('the_content', $page->post_content),
            'link'    => wp_parse_url(get_permalink($page->ID), PHP_URL_PATH),
        ];

        return new WP_REST_Response([
            'ok'    => true,
            'page'  => $data,
        ], 200);
    }
}
