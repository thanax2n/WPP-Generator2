<?php

namespace MXSFWNWPPGNext\Core;

class Taxonomy
{

    protected $postTypes;

    protected $taxonomy;

    protected $labels = [
        'name' => 'Book Type',
    ];

    protected $properties = [
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'book-type'],
    ];

    public function __construct(string $taxonomy, array $postTypes)
    {

        $this->taxonomy = $taxonomy;

        $this->postTypes = $postTypes;
    }

    public function labels(array $labels): object
    {

        $this->labels = wp_parse_args($labels, $this->labels);

        return $this;
    }

    public function properties(array $properties): object
    {

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

            register_taxonomy($this->taxonomy, $this->postTypes, $options);
        });
    }
}
