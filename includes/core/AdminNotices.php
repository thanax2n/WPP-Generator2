<?php

namespace MXSFWNWPPGNext\Core;

class AdminNotices
{

    const TYPES = [
        'error',
        'warning',
        'success',
        'info'
    ];

    protected $type = 'info';

    protected $messages = [];

    public function __construct($type = NULL)
    {
        
        if(!in_array($type, self::TYPES)) return;

        $this->type = $type;
    }

    public function addMessage($message)
    {

        if(empty($message)) return;

        array_push($this->messages, $message);

        return $this;
    }

    public function display()
    {

        foreach ($this->messages as $message) {

            // ???

            add_action('admin_notices', [$this, 'notice']);
        }
    }

    public function notice()
    {

        $class = 'notice notice-error';

        printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html('$message'));
    }
}
