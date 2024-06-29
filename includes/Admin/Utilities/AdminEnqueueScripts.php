<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Shared\EnqueueScripts;

class AdminEnqueueScripts
{

    protected $assetsPath = MXSFWN_PLUGIN_URL . 'assets/admin/';

    public function addStyle(string $handle, string $file): object
    {

        $styleSrc = $this->assetsPath . "css/{$file}";

        $instance = new EnqueueScripts($handle, $styleSrc);

        $instance->callback('style');

        $instance->args('all');

        return $instance;
    }

    public function addScript(string $handle, string $file): object
    {

        $scriptSrc = $this->assetsPath . "js/{$file}";

        $instance = new EnqueueScripts($handle, $scriptSrc);

        return $instance;
    }
}
