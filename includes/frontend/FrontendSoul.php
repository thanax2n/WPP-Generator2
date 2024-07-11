<?php

namespace MXSFWNWPPGNext\Frontend;

use MXSFWNWPPGNext\Frontend\Utilities\WPEnqueueScripts;

class FrontendSoul
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public function __construct()
    {

        $this->enqueueScripts();
    }

    public function enqueueScripts()
    {

        // Enqueue Scripts
        (new WPEnqueueScripts)->enqueue();
    }
}
