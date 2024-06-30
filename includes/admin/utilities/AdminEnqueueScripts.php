<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Shared\EnqueueScripts;

class AdminEnqueueScripts
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $assetsPath = MXSFWN_PLUGIN_URL . 'assets/admin/';

    public function addStyle(string $handle, string $file): object
    {

        $styleSrc = $this->assetsPath . "css/{$file}";

        $instance = new EnqueueScripts("{$this->uniqueString}-$handle", $styleSrc);

        $instance->callback('style');

        $instance->args('all');

        return $instance;
    }

    public function addScript(string $handle, string $file): object
    {

        $scriptSrc = $this->assetsPath . "js/{$file}";

        $instance = new EnqueueScripts("{$this->uniqueString}-$handle", $scriptSrc);

        return $instance;
    }

    public static function addScripts(): void
    {

        $adminScriptHandle = 'admin-scripts';
        (new static())
            ->addScript($adminScriptHandle, 'scripts.js')
            ->dependency('jquery')
            ->localization([
                'ajaxURL'   => admin_url('admin-ajax.php'),
            ])
            ->enqueue();
    }

    public static function addStyles(): void
    {

        $adminStyleHandle = 'admin-styles';
        (new static())
            ->addStyle($adminStyleHandle, 'styles.css')
            ->args('all')
            ->enqueue();
    }
}
