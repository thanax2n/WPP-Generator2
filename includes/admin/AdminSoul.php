<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;

class AdminSoul
{

    public function __construct()
    {

        $this->routing();

        $this->enqueueScripts();
    }

    public function routing()
    {

        require_once MXSFWN_PLUGIN_ABS_PATH . 'includes/admin/routes.php';
    }

    public function enqueueScripts()
    {

        AdminEnqueueScripts::addStyle('admin-style', 'styles.css');

        AdminEnqueueScripts::addScript('admin-script', 'scripts.js');
    }
}
