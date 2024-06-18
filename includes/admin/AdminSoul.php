<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;
use MXSFWNWPPGNext\Admin\Utilities\CPTGenerator;
use MXSFWNWPPGNext\Admin\Utilities\TaxonomyGenerator;

class AdminSoul
{

    public function __construct()
    {

        $this->routing();

        $this->enqueueScripts();

        $this->registerPostType();

        $this->registerTaxonomy();
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

        CPTGenerator::create(
            'framework',
            [
                'name'               => __('Frameworks', 'wpp-generator-v2'),
                'singular_name'      => __('Framework', 'wpp-generator-v2'),
                'add_new'            => __('Add a new one', 'wpp-generator-v2'),
                'add_new_item'       => __('Add a new Framework', 'wpp-generator-v2'),
                'edit_item'          => __('Edit the Framework', 'wpp-generator-v2'),
                'new_item'           => __('New Framework', 'wpp-generator-v2'),
                'view_item'          => __('See the Framework', 'wpp-generator-v2'),
                'search_items'       => __('Find a Framework', 'wpp-generator-v2'),
                'not_found'          => __('Frameworks not found', 'wpp-generator-v2'),
                'not_found_in_trash' => __('No Frameworks found in the trash', 'wpp-generator-v2'),
                'menu_name'          => __('Frameworks', 'wpp-generator-v2'),
            ],
            [
                'rewrite'            => ['slug' => 'famous-framework'],
            ]
        );
    }

    public function registerTaxonomy()
    {

        TaxonomyGenerator::create(
            'language',
            [
                'framework'
            ],
            [
                'name' => __('Programming Language', 'wpp-generator-v2'),
            ],
            [
                'rewrite'      => ['slug' => 'programming-language'],
            ]
        );
    }
}
