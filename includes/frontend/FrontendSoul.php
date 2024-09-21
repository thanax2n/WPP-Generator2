<?php

/**
 * The FrontendSoul class.
 *
 * Here you can add or remove frontend features.
 */

namespace MXSFWNWPPGNext\Frontend;

use MXSFWNWPPGNext\Frontend\Utilities\WPEnqueueScripts;

use MXSFWNWPPGNext\Frontend\Utilities\ShortCodeGenerator;

class FrontendSoul
{

    /**
     * Unique string to avoid conflicts.
     * 
     * @var string
     */
    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public function __construct()
    {

        $this->enqueueScripts();

        $this->shortCodes();
    }

    /**
     * Enqueue styles and scripts.
     * 
     * @return void
     */
    public function enqueueScripts(): void
    {

        (new WPEnqueueScripts)->enqueue();
    }

    /**
     * Add short codes.
     * 
     * @return void
     */
    public function shortCodes(): void
    {

        new ShortCodeGenerator;
    }
}
