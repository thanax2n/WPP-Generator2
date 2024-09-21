<?php

/**
 * The PostTypeGenerator class.
 *
 * Here you can register as many CPTs as you wish.
 */

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Admin\Entities\PostType;

class PostTypeGenerator extends PostType
{

    /**
     * Get PostType instance and use it for 
     * CPT creation.
     * 
     * @param string $postType   The post type slug.
     * @param array  $labels     List of labels. 
     *                           The full list is
     *                           the parent class.
     * @param array  $properties List of properties. 
     * 
     * @return void
     */
    public static function create(string $postType, array $labels, array $properties): void
    {

        $instance = new static($postType);

        $instance->labels($labels);

        $instance->properties($properties);

        $instance->register();
    }

    /**
     * An example of hot to create a CPT
     * 
     * @return void
     */
    public static function registerFrameworkPostType(): void
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

        self::create(
            $postType,
            $labels,
            $properties
        );
    }
}
