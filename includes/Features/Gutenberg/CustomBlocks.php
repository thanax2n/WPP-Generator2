<?php

/**
 * The CustomBlocks class.
 *
 * Here you can find lots of examples 
 * of Gutenberg blocks.
 * The main code of the blocks is here src\gutenberg.
 * Each block is in separate folder and the built 
 * version you can find here: build\gutenberg.
 */

namespace MXSFWNWPPGNext\Features\Gutenberg;

class CustomBlocks
{

    /**
     * The unique string.
     *
     * @var string
     */
    protected $uniqueString  = MXSFWN_PLUGIN_UNIQUE_STRING;

    /**
     * Absolute path.
     * 
     * Something like this:
     * D:\xampp\htdocs\my-domain.com\wp-content\plugins\wpp-generator-next/
     *
     * @var string
     */
    protected $absPath       = MXSFWN_PLUGIN_ABS_PATH;

    /**
     * Plugin url.
     * 
     * Something like this:
     * http://my-domain.com/wp-content/plugins/wpp-generator-next/
     *
     * @var string
     */
    protected $pluginURL     = MXSFWN_PLUGIN_URL;

    /**
     * Plugin version.
     * 
     * Something like this:
     * '1.0.0'
     *
     * @var string
     */
    protected $pluginVersion = MXSFWN_PLUGIN_VERSION;

    /**
     * Here you can find all registered blocks.
     * 
     * @return void      Gutenberg blocks register.
     */
    public static function registerBlocks(): void
    {

        $instance = new static();

        /**
         * Blocks extending
         */
        add_action('enqueue_block_editor_assets', [$instance, 'blocksExtendingScript']);
        add_filter('render_block', [$instance, 'blocksExtendingRender'], 10, 2);

        /**
         * Responsive spacer
         */
        add_action('init', [$instance, 'responsiveSpacer']);

        /**
         * Content slider
         */
        add_action('init', [$instance, 'contentSlider']);
        add_action('wp_enqueue_scripts', [$instance, 'contentSliderScripts']);

        /**
         * Full width section image
         */
        add_action('init', [$instance, 'fullWidthSectionImage']);

        /**
         * Nested blocks
         */
        add_action('init', [$instance, 'nestedBlocks']);

        /**
         * Image section
         */
        add_action('init', [$instance, 'imageSection']);
        add_action('wp_enqueue_scripts', [$instance, 'imageSectionScripts']);

        /**
         * Simple image
         */
        add_action('init', [$instance, 'simpleImage']);

        /**
         * Simple text
         */
        add_action('init', [$instance, 'simpleText']);

        /**
         * Server side rendering
         */
        add_action('init', [$instance, 'serverSideRendering']);
    }

    /**
     * Extending of default blocks.
     * 
     * @return void      Add a field to existing blocks.
     */
    public function  blocksExtendingScript(): void
    {

        $assetFile = include("{$this->absPath}build/gutenberg/extending/index.asset.php");

        wp_enqueue_script(
            "{$this->uniqueString}-extending-gutenberg",
            "{$this->pluginURL}build/gutenberg/extending/index.js",
            $assetFile['dependencies'],
            $assetFile['version']
        );
    }

    /**
     * Logic of default blocks extending.
     * 
     * @return void      block extending.
     */
    public function blocksExtendingRender(string $blockContent, array $block)
    {

        if (
            $block['blockName'] !== 'core/paragraph' &&
            $block['blockName'] !== 'core/heading' &&
            $block['blockName'] !== 'core/button' &&
            !isset($block['attrs']['extendedSettings'])
        ) {

            return $blockContent;
        }

        if (!isset($block['attrs']['extendedSettings']['prompt'])) {

            return $blockContent;
        }

        if ($block['attrs']['extendedSettings']['prompt'] == '') {

            return $blockContent;
        }

        $blockContent = preg_replace('#^<([^>]+)>#m', '<$1 data-ai-prompt="' . esc_html($block['attrs']['extendedSettings']['prompt']) . '">', $blockContent);

        return $blockContent;
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Responsive spacer.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function responsiveSpacer()
    {

        register_block_type("{$this->absPath}build/gutenberg/responsive-spacer");
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Content slider.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function contentSlider()
    {

        register_block_type("{$this->absPath}build/gutenberg/content-slider");
    }

    /**
     * Additional scripts and styles.
     * 
     * Content slider.
     * 
     * @return void      enqueue scripts.
     */
    public function contentSliderScripts()
    {

        $assetFile = include("{$this->absPath}build/gutenberg/content-slider/index.asset.php");

        // Owl css
        wp_enqueue_style(
            "{$this->uniqueString}-owl-carousel",
            "{$this->pluginURL}assets/gutenberg/content-slider/css/owl.carousel.min.css",
            [],
            $assetFile['version']
        );

        // Owl js
        wp_enqueue_script(
            "{$this->uniqueString}-owl-carousel",
            "{$this->pluginURL}assets/gutenberg/content-slider/js/owl.carousel.min.js",
            ['jquery'],
            $assetFile['version'],
            true
        );

        // Owl handler.js
        wp_enqueue_script(
            "{$this->uniqueString}-owl-carousel-handler",
            "{$this->pluginURL}assets/gutenberg/content-slider/js/handler.js",
            ["{$this->uniqueString}-owl-carousel"],
            $assetFile['version'],
            true
        );
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Full width section image.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function fullWidthSectionImage()
    {

        register_block_type("{$this->absPath}build/gutenberg/full-width-section-image");
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Nested blocks.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function nestedBlocks()
    {

        register_block_type("{$this->absPath}build/gutenberg/nested-blocks");

        /**
         * Children blocks
         */
        // Block one
        register_block_type("{$this->absPath}build/gutenberg/nested-blocks/child-blocks/block-one");
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Section with Image Background.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function imageSection()
    {

        register_block_type("{$this->absPath}build/gutenberg/image-section");
    }

    /**
     * Additional scripts and styles.
     * 
     * Image section.
     * 
     * @return void      enqueue scripts.
     */
    public function imageSectionScripts()
    {
        $assetFile = include("{$this->absPath}build/gutenberg/image-section/index.asset.php");

        wp_enqueue_style(
            "{$this->uniqueString}-image-section",
            "{$this->pluginURL}build/gutenberg/image-section/style-index.css",
            [],
            $assetFile['version']
        );
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Simple image.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function simpleImage()
    {

        register_block_type("{$this->absPath}build/gutenberg/simple-image");
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Simple text.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function simpleText()
    {

        register_block_type("{$this->absPath}build/gutenberg/simple-text");
    }

    /**
     * GUTENBERG BLOCK.
     * 
     * Server side rendering.
     * 
     * @return void      Create a Gutenberg block.
     */
    public function serverSideRendering()
    {

        $assetFile = include("{$this->absPath}build/gutenberg/server-side-rendering/index.asset.php");

        wp_register_script(
            "{$this->uniqueString}-server-side-rendering",
            "{$this->pluginURL}build/gutenberg/server-side-rendering/index.js",
            $assetFile['dependencies'],
            $assetFile['version']
        );

        register_block_type(
            "{$this->absPath}build/gutenberg/server-side-rendering",
            [
                'api_version'       => 3,
                'category'          => 'widgets',
                'attributes'        => [
                    'customNumber'   => [
                        'type'      => 'string',
                        'default'   => 3
                    ]
                ],
                'editor_script'     => "{$this->uniqueString}-server-side-rendering",
                'render_callback'   => [$this, 'serverSideRenderingRender'],
                'skip_inner_blocks' => true,
            ]
        );
    }

    /**
     * Callback function.
     * 
     * Server side rendering.
     * 
     * @return void      Render content.
     */
    public function serverSideRenderingRender($block_attributes, $content)
    {

        $customNumber = isset($block_attributes['customNumber']) ? intval($block_attributes['customNumber']) : 3;

        global $wpdb;

        $tableName = $wpdb->prefix . 'ai_robots';

        // Check if table exists
        $tableExists = $wpdb->get_var(
            $wpdb->prepare(
                "SHOW TABLES LIKE %s",
                $tableName
            )
        );

        if (!$tableExists) {

            $robots = [];
        } else {

            $robots = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT id, title, description FROM {$tableName} WHERE status = %s ORDER BY id DESC LIMIT %d",
                    'publish',
                    $customNumber
                )
            );
        }

        ob_start();

        mxsfwnRequireGutenbergComponent('server-side-rendering', [
            'robots' => $robots
        ]);

        return ob_get_clean();
    }
}
