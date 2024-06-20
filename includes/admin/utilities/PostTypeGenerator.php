<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Core\PostType;

class PostTypeGenerator extends PostType
{

    public static function create(string $postType, array $labels, array $properties)
    {

        $instance = new static($postType);

        $instance->labels($labels);

        $instance->properties($properties);

        $instance->register();
    }
    
}
