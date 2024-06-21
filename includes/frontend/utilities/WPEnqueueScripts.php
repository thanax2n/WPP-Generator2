<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

use MXSFWNWPPGNext\Core\EnqueueScripts;

class WPEnqueueScripts
{
    
    protected $assetsPath = MXSFWN_PLUGIN_URL . 'includes/Frontend/built/';

    public function addStyle(string $handle, string $file): object
    {

        $styleSrc = $this->assetsPath . $file;

        $instance = new EnqueueScripts($handle, $styleSrc);

        $instance->area('frontend');

        $instance->callback('style');

        return $instance;
    }

    public function addScript(string $handle, string $file): object
    {

        $scriptSrc = $this->assetsPath . $file;

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
