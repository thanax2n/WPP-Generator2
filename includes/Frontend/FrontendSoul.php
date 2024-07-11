<?php

namespace MXSFWNWPPGNext\Frontend;

use MXSFWNWPPGNext\Frontend\Utilities\WPEnqueueScripts;

use MXSFWNWPPGNext\Frontend\Utilities\ShortCodeGenerator;

class FrontendSoul
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public function __construct()
    {

        $this->enqueueScripts();

        $this->shortCodes();

    }

    public function enqueueScripts(): void
    {

        (new WPEnqueueScripts)->enqueue();
    }

    public function shortCodes(): void
    {

        new ShortCodeGenerator;
    }
}
