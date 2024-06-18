<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;
use MXSFWNWPPGNext\Admin\Utilities\CPTGenerator;

class AdminSoul
{

    public function __construct()
    {

        $this->routing();

        $this->enqueueScripts();

        $this->registerPostType();
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

    public function registerPostType()
    {

        CPTGenerator::create('framework', [
            'name'               => 'Frameworks',
            'singular_name'      => 'Framework',
            'add_new'            => 'Add a new one',
            'add_new_item'       => 'Add a new Framework',
            'edit_item'          => 'Edit the Framework',
            'new_item'           => 'New Framework',
            'view_item'          => 'See the Framework',
            'search_items'       => 'Find a Framework',
            'not_found'          => 'Frameworks not found',
            'not_found_in_trash' => 'No Frameworks found in the trash',
            'menu_name'          => 'Frameworks',
        ], [
            'rewrite'            => ['slug' => 'famous-framework'],
        ]);
    }
}
