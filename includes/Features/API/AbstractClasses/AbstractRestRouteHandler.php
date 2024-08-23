<?php

namespace MXSFWNWPPGNext\Features\API\AbstractClasses;

use MXSFWNWPPGNext\Features\API\Interfaces\RestRouteHandlerInterface;
use WP_REST_Response;

abstract class AbstractRestRouteHandler implements RestRouteHandlerInterface
{
    protected $namespace = 'wpp-generator/v1';
    protected $route;
    protected $methods   = 'POST';
    protected $nonceAction;

    public function registerRoute()
    {

        register_rest_route(
            $this->namespace,
            $this->route,
            [
                'methods'             => $this->methods,
                'callback'            => [$this, 'handleRequest'],
                'permission_callback' => [$this, 'checkPermissions'],
            ]
        );
    }

    public function checkPermissions()
    {

        return current_user_can('manage_options');
    }

    protected function verifyNonce($request)
    {

        $nonce = $request->get_header('X-WP-Nonce');

        if (!wp_verify_nonce($nonce, $this->nonceAction)) {

            return new WP_REST_Response([
                'message' => 'Sorry, you are not allowed to do that.'
            ], 401);
        }

        return true;
    }

    protected function verifyUserCapability($capability = 'edit_posts')
    {

        if (!current_user_can($capability)) {

            return new WP_REST_Response([
                'message' => 'Sorry, you do not have appropriate access.'
            ], 403);
        }

        return true;
    }

    abstract public function handleRequest($request): WP_REST_Response;
}
