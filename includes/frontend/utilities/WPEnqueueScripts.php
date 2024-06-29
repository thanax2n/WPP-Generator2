<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

use MXSFWNWPPGNext\Shared\EnqueueScripts;

class WPEnqueueScripts
{
    
    protected $assetsPath = MXSFWN_PLUGIN_URL . 'assets/frontend/';

    public function addStyle(string $handle, string $file): object
    {

        $styleSrc = $this->assetsPath . "css/{$file}";

        $instance = new EnqueueScripts($handle, $styleSrc);

        $instance->area('frontend');

        $instance->callback('style');

        return $instance;
    }

    public function addScript(string $handle, string $file): object
    {

        $scriptSrc = $this->assetsPath . "js/{$file}";

        $instance = new EnqueueScripts($handle, $scriptSrc);

        $instance->area('frontend');

        return $instance;
    }

    public function assetsPath(string $path): object
    {

        $this->assetsPath = $path;

        return $this;
    }
}
