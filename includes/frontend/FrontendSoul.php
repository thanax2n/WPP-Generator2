<?php

namespace MXSFWNWPPGNext\Frontend;

use MXSFWNWPPGNext\Frontend\Utilities\WPEnqueueScripts;

class FrontendSoul
{

    public function __construct()
    {

        $this->enqueueScripts();
    }

    public function enqueueScripts()
    {

        WPEnqueueScripts::addStyle('frontend-style', 'index.css');

        WPEnqueueScripts::addScript('frontend-script', 'index.js');
    }
}
