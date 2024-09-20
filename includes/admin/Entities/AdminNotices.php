<?php

namespace MXSFWNWPPGNext\Admin\Entities;

class AdminNotices
{

    const TYPES = [
        'error',
        'warning',
        'success',
        'info',
    ];

    protected $type = 'info';

    protected $dismissible = false;

    protected $messages = [];

    public function __construct($type = NULL)
    {

        if (!in_array($type, self::TYPES)) return;

        $this->type = $type;
    }

    public function addMessage($message): object
    {

        if (!empty($message)) {

            array_push($this->messages, $message);
        }

        return $this;
    }

    public function dismissible($dismissible = true): object
    {

        $this->dismissible = (bool) $dismissible;

        return $this;
    }

    public function display(): void
    {

        if (empty($this->messages) || !is_array($this->messages)) return;

        foreach ($this->messages as $message) {

            add_action('admin_notices', function () use ($message) {

                $this->notice($message);
            }, 100);
        }
    }

    public function notice($message): void
    {

        $class = "notice notice-{$this->type}";

        $class .= $this->dismissible ? ' is-dismissible' : '';

        printf(
            '<div class="%1$s"><p>%2$s</p></div>',
            esc_attr($class),
            esc_html($message)
        );
    }
}
