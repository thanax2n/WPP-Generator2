<?php

/**
 * The FeaturesSoul class.
 *
 * This class collects
 * the plugin's features.
 */

namespace MXSFWNWPPGNext\Features;

use MXSFWNWPPGNext\Features\Gutenberg\CustomBlocks;

class FeaturesSoul
{

    /**
     * List of features.
     */
    public function __construct()
    {

        $this->registerGutenbergBlocks();
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
}
