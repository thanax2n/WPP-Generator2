<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Core\CustomPostType;

class CustomPostTypeGenerator extends CustomPostType
{

    public static function create(string $postType, array $labels, array $properties)
    {

        $instance = new static($postType);

        $instance->labels($labels);

        $instance->properties($properties);

        $instance->register();
    }
    
}
