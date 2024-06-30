<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Admin\Entities\Taxonomy;

class TaxonomyGenerator extends Taxonomy
{

    public static function create(string $taxonomy, array $postTypes, array $labels, array $properties)
    {

        $instance = new static($taxonomy, $postTypes);

        $instance->labels($labels);

        $instance->properties($properties);

        $instance->register();
    }

    public static function registerLanguageTaxonomy(): void
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

        self::create(
            $taxonomy,
            $postTypes,
            $labels,
            $properties
        );
    }
}
