<?php

namespace MXSFWNWPPGNext\Admin;

defined('ABSPATH') || exit;

class AdminSoul
{

    public function __construct()
    {

        $this->routing();
    }

    public function routing()
    {

        require_once MXSFWN_PLUGIN_ABS_PATH . 'includes/admin/routes.php';
    }
}
