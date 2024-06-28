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
}

