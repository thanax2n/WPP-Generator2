<?php

/**
 * The FeaturesSoul class.
 *
 * This class collects
 * the plugin's features.
 */

namespace MXSFWNWPPGNext\Features;

use MXSFWNWPPGNext\Features\Gutenberg\CustomBlocks;
use MXSFWNWPPGNext\Features\API\RoutesRegister;

class FeaturesSoul
{

    /**
     * List of features.
     */
    public function __construct()
    {

        $this->registerGutenbergBlocks();

        $this->registerApiRoutes();
    }

    /**
     * Register all types of Gutenberg blocks.
     * 
     * @return void      Register gutenberg blocks.
     */
    public function registerGutenbergBlocks(): void
    {

        CustomBlocks::registerBlocks();
    }

    /**
     * REST API. Routes register.
     * 
     * @return void      Register routes.
     */
    public function registerApiRoutes(): void
    {

        new RoutesRegister;
    }
}
