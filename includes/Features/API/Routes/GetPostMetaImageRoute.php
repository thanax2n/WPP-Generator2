<?php

namespace MXSFWNWPPGNext\Features\API\Routes;

use MXSFWNWPPGNext\Features\API\AbstractClasses\AbstractRestRouteHandler;
use WP_REST_Response;
use WP_Post;

class GetPostMetaImageRoute extends AbstractRestRouteHandler
{

    protected $route = '/post-id/(?P<postId>[\d]+)/post-meta/(?P<postMetaKey>[\w]+)';
    protected $nonceAction = 'wp_rest';
    protected $methods = 'GET';

    public function handleRequest($request): WP_REST_Response
    {

        $nonceCheck = $this->verifyNonce($request);

        if ($nonceCheck !== true) {

            return $nonceCheck;
        }

        $capabilityCheck = $this->verifyUserCapability('edit_posts');

        if ($capabilityCheck !== true) {

            return $capabilityCheck;
        }

        $postId = (int) $request->get_param('postId');
        $post = get_post($postId);

        if (!($post instanceof WP_Post)) {

            return new WP_REST_Response([
                'message' => 'Post does not exist.'
            ], 404);
        }

        $postMetaKey = $request->get_param('postMetaKey');

        $imageId = get_post_meta($postId, $postMetaKey, true);

        $imageUrl = wp_get_attachment_url(intval($imageId));

        return new WP_REST_Response([
            'status'   => 'success',
            'message'  => "Current post id: $postId",
            'postId'   => $postId,
            'imageUrl' => $imageUrl
        ], 200);
    }
}
