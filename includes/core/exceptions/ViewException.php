<?php

namespace MXSFWNWPPGNext\Core\Exceptions;

use MXSFWNWPPGNext\Core\AdminNotices;

class ViewException extends AdminNotices
{

    public static function throw($error)
    {
      
        $instance = new static('error');
        
        $instance->addMessage($error)->display();        
    }
}
