<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Admin\Entities\PostType;

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
