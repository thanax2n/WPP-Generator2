<?php

namespace MXSFWNWPPGNext\Features\API\Routes\NextJS;

use MXSFWNWPPGNext\Features\API\AbstractClasses\AbstractRestRouteHandler;
use WP_REST_Request;
use WP_REST_Response;
use WP_Post;
use WP_Block_Parser_Block;

class GetMenuItemsRoute extends AbstractRestRouteHandler
{
    protected $route = '/menu-items/(?P<post_id>\d+)';
    protected $methods = 'GET';

    public function checkPermissions(): bool
    {
        return true;
    }

    public function handleRequest($request): WP_REST_Response
    {
        $post_id = absint($request['post_id']);

        $menu_post = get_post($post_id);

        if (! $menu_post || $menu_post->post_type !== 'wp_navigation') {
            return new WP_REST_Response([
                'ok'      => false,
                'message' => esc_html__('Navigation post not found.', 'wpp-generator-next'),
            ], 404);
        }

        $blocks = parse_blocks($menu_post->post_content);

        $menu_items = [];

        foreach ($blocks as $block) {
            if ($block['blockName'] === 'core/page-list') {
                $pages = get_pages(['post_status' => 'publish']);
                foreach ($pages as $page) {
                    $menu_items[] = [
                        'type'      => 'page',
                        'id'        => $page->ID,
                        'title'     => get_the_title($page->ID),
                        'slug'      => $page->post_name,
                        'url'       => wp_parse_url(get_permalink($page->ID), PHP_URL_PATH),
                    ];
                }
            } elseif ($block['blockName'] === 'core/navigation-link' && isset($block['attrs']['url'], $block['attrs']['label'])) {
                $menu_items[] = [
                    'type'  => 'custom',
                    'title' => $block['attrs']['label'],
                    'url'   => wp_parse_url($block['attrs']['url'], PHP_URL_PATH),
                ];
            }
        }

        return new WP_REST_Response([
            'ok'    => true,
            'items' => $menu_items,
        ], 200);
    }
}
