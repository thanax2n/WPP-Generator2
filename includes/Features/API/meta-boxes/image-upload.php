<?php

defined('ABSPATH') || exit;

/**
 * Reset Route.
 * 
 * Image Upload.
 */

if (!function_exists('mxsfwnGetPostMetaValueCallback')) {
    /**
     * Request Callback.
     * @return WP_REST_Response
     */
    function mxsfwnGetPostMetaValueCallback($request)
    {

        $nonce = $request->get_header('X-WP-Nonce');

        // Verify the nonce
        if (!wp_verify_nonce($nonce, 'wp_rest')) {

            return new WP_REST_Response([
                'message' => 'Sorry, you are not allowed to do that.'
            ], 401);
        }

        // If the nonce is valid, check if the user has the necessary capabilities
        if (!current_user_can('edit_posts')) {

            return new WP_REST_Response([
                'message' => 'Sorry, you do not have appropriate access.'
            ], 403);
        }

        $postId = (int) $request->get_param('postId');

        // Check if post exists
        $post = get_post($postId);

        if (!($post instanceof WP_Post)) {

            return new WP_REST_Response([
                'message' => 'Post does not exists.'
            ], 404);
        }

        $data = $request->get_params();

        $attributes = $request->get_param('attributes');

        // Check if attributes set
        if(!$attributes) {

            return new WP_REST_Response([
                'message' => 'No Attributes set!'
            ], 404);
        }

        // Check image id
        if(!isset($attributes['imageId'])) {

            return new WP_REST_Response([
                'message' => 'No Image selected!'
            ], 404);
        }

        // Check post meta
        if(!isset($attributes['postMetaKey'])) {

            return new WP_REST_Response([
                'message' => 'No post meta key selected!'
            ], 404);
        }

        // Update Post Meta.
        update_post_meta($postId, $attributes['postMetaKey'], intval($attributes['imageId']));

        $imageUrl = wp_get_attachment_url(intval($attributes['imageId']));

        // Return a response
        return new WP_REST_Response([
            'status'      => 'success',
            'message'     => "Current post id: $postId",
            'postId'      => $postId,
            'imageUrl'    => $imageUrl
        ], 200);
    }
}

if (!function_exists('mxsfwnGetPostMetaValue')) {
    /**
     * Here you can register your route
     * And example: http://example.local/wp-json/wpp-generator/v1/post-id/1
     * @return void
     */
    function mxsfwnGetPostMetaValue()
    {

        /**
         * Get Post Meta.
         */
        register_rest_route(
            'wpp-generator/v1',
            '/post-id/(?P<postId>[\d]+)',
            array(
                'methods'             => 'POST',
                'callback'            => 'mxsfwnGetPostMetaValueCallback',
                'permission_callback' => 'mxsfwnGetPostMetaValuePermissionCheck',
            )
        );
    }
}
add_action('rest_api_init', 'mxsfwnGetPostMetaValue');

if (!function_exists('mxsfwnGetPostMetaValuePermissionCheck')) {
    /**
     * POST request permission check.
     * @return bool
     */
    function mxsfwnGetPostMetaValuePermissionCheck()
    {

        return current_user_can('manage_options');
    }
}
