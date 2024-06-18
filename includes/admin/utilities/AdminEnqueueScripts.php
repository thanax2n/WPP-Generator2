<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Core\EnqueueScripts;

class AdminEnqueueScripts extends EnqueueScripts
{

    protected static $assetsPath = MXSFWN_PLUGIN_URL . 'includes/admin/assets/';

    public static function addStyle(string $handle, string $file)
    {

        $styleSrc = self::$assetsPath . "css/{$file}";
        $instance = new static($handle, $styleSrc);

        $instance->callback('style');

        $instance->args('all');

        $instance->enqueue();
    }

    public static function addScript(string $handle, string $file)
    {

        $scriptSrc = self::$assetsPath . "js/{$file}";
        $instance = new static($handle, $scriptSrc);

        $instance->localization([
            'ajaxURL'   => admin_url('admin-ajax.php'),
        ]);

        $instance->enqueue();
    }
}
