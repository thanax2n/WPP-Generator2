<?php

namespace MXSFWNWPPGNext\Admin\Entities;

class PostType
{

    protected $uniqueString = 'mxsfwn';

    protected $postType;

    protected $labels = [
        'name'               => 'Books',
        'singular_name'      => 'Book',
        'add_new'            => 'Add a new one',
        'add_new_item'       => 'Add a new book',
        'edit_item'          => 'Edit the book',
        'new_item'           => 'New book',
        'view_item'          => 'See the book',
        'search_items'       => 'Find a book',
        'not_found'          => 'Books not found',
        'not_found_in_trash' => 'No books found in the trash',
        'parent_item_colon'  => 'Parent Pages:',
        'menu_name'          => 'Books'
    ];

    protected $properties = [
        'menu_icon'          => 'dashicons-admin-site',
        'show_in_rest'       => true,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'world-books'],
        'capability_type'    => 'page', // 'post'
        'capability'         => 'manage_options',
        'has_archive'        => true,
        'hierarchical'       => true, // false
        'menu_position'      => null,
        'supports'           => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes']
    ];

    public function __construct(string $postType)
    {

        $this->postType = $postType;
    }

    public function labels(array $labels): object
    {

        $this->labels = wp_parse_args($labels, $this->labels);

        return $this;
    }

    public function properties($properties)
    {

        if (!is_array($properties)) return;

        $this->properties = wp_parse_args($properties, $this->properties);

        return $this;
    }

    public function register(): void
    {

        add_action('init', function () {

            $options = [
                'labels' => $this->labels,
            ];

            $options = array_merge($options, $this->properties);

            register_post_type($this->postType, $options);

            $this->activate();
        });
    }

    public function activate()
    {

        $cptOption = "{$this->uniqueString}_{$this->postType}";

        if (!get_option($cptOption)) {

            flush_rewrite_rules();

            update_option($cptOption, 'activated');
        }
    }
}
