<?php

namespace MXSFWNWPPGNext\Core;

class EnqueueScripts
{

    protected $handle;

    protected $src;

    protected $dependencies = [];

    protected $version;

    protected $args = true;

    /**
     * Area types.
     */
    const AREAS = [
        'admin',
        'frontend'
    ];

    /**
     * Action Prefix.
     * 
     * @param string $prefix   admin|wp.
     */
    protected $prefix = 'admin';

    /**
     * Script types.
     */
    const TYPES = [
        'script',
        'style'
    ];

    /**
     * Callback name.
     * 
     * @param string $callback   script|style.
     */
    protected $callback = 'script';

    protected $localization = [];

    protected $localizerName = MXSFWN_PLUGIN_UNIQUE_STRING . '_object';

    public function __construct(string $handle, string $src)
    {

        $this->handle = $handle;

        $this->src = $src;
    }

    public function enqueue(): void
    {

        add_action("{$this->prefix}_enqueue_scripts", [$this, $this->callback]);
    }

    public function script(): void
    {

        wp_enqueue_script($this->handle, $this->src, $this->dependencies, $this->version, $this->args);

        if (empty($this->localization)) return;

        $this->localizeScript($this->handle);
    }

    public function style(): void
    {

        wp_enqueue_style($this->handle, $this->src, $this->dependencies, $this->version, $this->args);
    }

    public function dependency(string $dependency): object
    {

        array_push($this->dependencies, $dependency);

        return $this;
    }

    public function version(string $version): object
    {

        $this->version = $version;

        return $this;
    }

    public function args(bool $args): object
    {

        $this->args = $args;

        return $this;
    }


    public function area(string $area): object
    {

        if (in_array($area, self::AREAS)) {

            $this->prefix = $area === 'frontend' ? 'wp' : 'admin';
        }

        return $this;
    }

    public function callback(string $callback): object
    {

        if (in_array($callback, self::TYPES)) {

            $this->callback = $callback !== 'script' ? 'style' : 'script';
        }

        return $this;
    }

    public function localizeScript(string $handler): void
    {

        wp_localize_script($handler, $this->localizerName, $this->localization);
    }

    public function localizerName(string $name): object
    {
        $this->localizerName = $name;

        return $this;
    }

    public function localization(array $data): object
    {

        $this->localization = $data;

        return $this;
    }
}
