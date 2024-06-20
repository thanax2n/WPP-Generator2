<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Core\CustomTaxonomy;

class TaxonomyGenerator extends CustomTaxonomy
{

    public static function create(string $taxonomy, array $postTypes, array $labels, array $properties)
    {

        $instance = new static($taxonomy, $postTypes);

        $instance->labels($labels);

        $instance->properties($properties);

        $instance->register();
    }
}

