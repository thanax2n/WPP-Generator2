<?php

namespace MXSFWNWPPGNext\Admin;

use MXSFWNWPPGNext\Admin\Utilities\AdminMenu;

class Router
{

    protected $routes = [];

    protected $menuActions = [
        'addMenuPage',
        'addSubmenuPage',
        'addOptionsPage'
    ];

    public function add($slug, $controller)
    {

        $this->routes[] = [
            'controller' => $controller,
            'properties' => [
                'pageTitle' => 'WPP Generator Next',
                'menuTitle' => 'WPP Generator',
                'capability' => 'manage_options',
                'menuSlug'  => 'mxsfwn-page',
                'dashicons'  => 'dashicons-image-filter',
                'position'   => 111,
                'menuAction'  => 'addMenuPage'
            ]
        ];

        return $this;
    }

    public function get($slug, $controller)
    {

        return $this->add($slug, $controller);
    }

    public function properties($attributes)
    {

        $properties = wp_parse_args($attributes, $this->routes[array_key_last($this->routes)]['properties']);

        $this->routes[array_key_last($this->routes)]['properties'] = $properties;

        return $this;
    }

    public function route()
    {

        foreach ($this->routes as $route) {

            if(in_array($route['properties']['menuAction'], $this->menuActions)) {

                $this->menuPage($route['properties']['menuAction'], $route['properties'], $route['controller']);
            }
        }
    }

    public function menuPage($menuAction, $properties, $controller)
    {

        $menuPage = new AdminMenu($menuAction, $properties, $controller);

        $menuPage->add();
    }
}
