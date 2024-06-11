<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

class AdminMenu
{

    protected $menuAction = 'addMenuPage';

    protected $properties = [
        'pageTitle'  => 'WPP Generator Next',
        'menuTitle'  => 'WPP Generator',
        'capability' => 'manage_options',
        'menuSlug'   => 'mxsfwn-admin-page',
        'dashicons'  => 'dashicons-image-filter',
        'position'   => 111,
        'menuAction' => 'addMenuPage'
    ];

    protected $controller = 'main.php';

    public function __construct($menuAction, $properties, $controller)
    {

        $this->menuAction = $menuAction;

        $this->properties = wp_parse_args($properties, $this->properties);

        $this->controller = $controller;
    }

    public function add()
    {

        add_action('admin_menu', [$this, 'addMenuPage']);
    }

    public function addMenuPage()
    {

        add_menu_page(
            sprintf(esc_html__('%s', 'wpp-generator-v2'), $this->properties['pageTitle']),
            sprintf(esc_html__('%s', 'wpp-generator-v2'), $this->properties['menuTitle']),
            $this->properties['capability'],
            $this->properties['menuSlug'],
            [$this, 'render'],
            $this->properties['dashicons'], // icons https://developer.wordpress.org/resource/dashicons/#id
            $this->properties['position']
        );
    }

    public function render()
    {

        $controller = MXSFWN_PLUGIN_ABS_PATH . "includes/admin/controllers/{$this->controller}";

        if (!file_exists($controller)) return;

        require_once $controller;
    }
}
