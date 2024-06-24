<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;
use MXSFWNWPPGNext\Admin\Utilities\PostTypeGenerator;
use MXSFWNWPPGNext\Admin\Utilities\TaxonomyGenerator;
use MXSFWNWPPGNext\Admin\Utilities\MetaBoxGenerator;

class AdminSoul
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public function __construct()
    {

        $this->routing();

        $this->enqueueScripts();

        $this->registerPostType();

        $this->registerTaxonomy();

        $this->addMetaBoxes();
    }

    public function routing()
    {

        require_once MXSFWN_PLUGIN_ABS_PATH . 'includes/Admin/routes.php';
    }

    public function enqueueScripts()
    {

        // Admin Styles
        $adminStyleHandle = "{$this->uniqueString}-admin-styles";
        (new AdminEnqueueScripts)
            ->addStyle($adminStyleHandle, 'styles.css')
            ->args('all')
            ->enqueue();

        // Admin Scripts
        $adminScriptHandle = "{$this->uniqueString}-admin-scripts";
        (new AdminEnqueueScripts)
            ->addScript($adminScriptHandle, 'scripts.js')
            ->dependency('jquery')
            ->localization([
                'ajaxURL'   => admin_url('admin-ajax.php'),
            ])
            ->enqueue();
    }

    public function registerPostType()
    {

        $postType = 'framework';

        $labels = [
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
        ];

        $properties = [
            'rewrite'            => ['slug' => 'famous-framework'],
        ];

        PostTypeGenerator::create(
            $postType,
            $labels,
            $properties
        );
    }

    public function registerTaxonomy()
    {

        $taxonomy = 'language';

        $postTypes = [
            'framework'
        ];

        $labels = [
            'name'    => __('Programming Language', 'wpp-generator-v2'),
        ];

        $properties = [
            'rewrite' => ['slug' => 'programming-language'],
        ];

        TaxonomyGenerator::create(
            $taxonomy,
            $postTypes,
            $labels,
            $properties
        );
    }

    public function addMetaBoxes()
    {

        // Type Text
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-name",
            'title'        => 'Author Name',
        ]);

        // Type Email
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-email",
            'metaBoxType'  => 'email',
            'title'        => 'Author Email',
        ]);

        // Type Url
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-website",
            'metaBoxType'  => 'url',
            'title'        => 'Author Website',
        ]);

        // Type Integer
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-age",
            'metaBoxType'  => 'int',
            'title'        => 'Author Age',
            'defaultValue' => 30,
        ]);

        // Type Float
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-salary",
            'metaBoxType'  => 'float',
            'title'        => 'Author Salary',
            'defaultValue' => '500.9',
        ]);

        // Type Textarea
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-author-bio",
            'metaBoxType'  => 'textarea',
            'title'        => 'Author Bio',
        ]);

        // Type Radio
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-favorite-color",
            'metaBoxType'  => 'radio',
            'title'        => 'Favorite Color',
            'options'      => [
                [
                    'label'   => 'Red',
                    'value'   => 'red'
                ],
                [
                    'label'   => 'Green',
                    'value'   => 'green'
                ],
                [
                    'label'   => 'Yellow',
                    'value'   => 'yellow',
                    'checked' => true
                ]
            ]
        ]);

        // Type Checkbox
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-favorite-season",
            'metaBoxType'  => 'checkbox',
            'title'        => 'Favorite Season',
            'options'      => [
                [
                    'label'   => 'Spring',
                    'value'   => 'spring'
                ],
                [
                    'label'   => 'Summer',
                    'value'   => 'summer',
                ],
                [
                    'label'   => 'Autumn',
                    'value'   => 'autumn'
                ],
                [
                    'label'   => 'Winter',
                    'value'   => 'winter'
                ]
            ]
        ]);

        // Select
        MetaBoxGenerator::add([
            'id'           => "{$this->uniqueString}-favorite-animal",
            'metaBoxType'  => 'select',
            'title'        => 'Favorite Animal',
            'options'      => [
                [
                    'label'    => 'Dog',
                    'value'    => 'dog'
                ],
                [
                    'label'    => 'Cat',
                    'value'    => 'cat',
                    'selected' => true
                ],
                [
                    'label'    => 'Fish',
                    'value'    => 'fish'
                ]
            ]
        ]);        
    }
}
