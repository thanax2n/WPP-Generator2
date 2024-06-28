<?php

namespace MXSFWNWPPGNext\Admin\Entities;

use MXSFWNWPPGNext\Admin\Utilities\Notices\MetaBoxTypeNotice;
use MXSFWNWPPGNext\Admin\Utilities\AdminEnqueueScripts;

class MetaBox
{

    const TYPES = [
        'text',
        'email',
        'url',
        'int',
        'float',
        'textarea',
        'image',
        'radio',
        'select',
        'checkbox'
    ];

    private $args = [];

    protected $defaults = [
        'id'           => 'mx-meta-box',
        'postTypes'    => 'page',
        'title'         => 'Meta Box',
        'metaBoxType'  => 'text',
        'options'      => [],
        'context'      => 'normal',
        'priority'     => 'default',
        'callbackArgs' => NULL,
        'readonly'     => false,
        'defaultValue' => ''
    ];

    /** 
     * @param array $metaBoxArguments   List of meta box properties:
     *   [
     *      'id'           'mx-meta-box' (string)
     *      'postTypes'    'page' (string|array) can be: ['page', 'post']
     *      'title'         'Meta Box' (string)
     *      'metaBoxType'  'text'   (string)     can be: 'email',
     *                                                   'url',
     *                                                   'int',
     *                                                   'float',
     *                                                   'textarea',
     *                                                   'image',
     *                                                   'radio',
     *                                                   'select',
     *                                                   'checkbox'
     * 
     *      'options'       []       (array)    used for: 'radio',
     *                                                    'select',
     *                                                    'checkbox'
     * 
     *      'context'       'normal' (string)     can be: 'side',
     *                                                    'advanced'
     * 
     *      'priority'      'default' (string)     can be: 'high',
     *                                                     'core',
     *                                                     'low'
     * 
     * 
     *      'readonly'      false    (boolean)
     *      'defaultValue'  ''       (string)
     *   ]
     *
     */
    public function __construct(array $metaBoxArguments)
    {

        $this->args = wp_parse_args($metaBoxArguments, $this->defaults);

        if (!$this->validateMetaBoxType()) {

            MetaBoxTypeNotice::throw($this->args['metaBoxType']);

            return;
        }

        $this->setMetaBoxId();

        $this->setPostMetaKey();

        $this->nonceManager();

        $this->actionsManager();

        $this->imageUploadManager();
    }

    protected function validateMetaBoxType(): bool
    {

        return in_array($this->args['metaBoxType'], self::TYPES);
    }

    protected function setMetaBoxId()
    {

        if (is_array($this->args['postTypes'])) {

            $this->args['metaBoxId'] = $this->args['id'] . '_' . implode('_',  $this->args['postTypes']);

            return;
        }

        $this->args['metaBoxId'] = $this->args['id'] . '_' . $this->args['postTypes'];
    }

    protected function setPostMetaKey()
    {

        if (empty($this->args['metaBoxId'])) return;

        $this->args['postMetaKey'] = '_' . $this->args['metaBoxId'];
    }

    protected function nonceManager()
    {

        if (empty($this->args['metaBoxId'])) return;

        $this->args['nonceAction']  = $this->args['metaBoxId'] . '_nonce_action';
        $this->args['nonceName']    = $this->args['metaBoxId'] . '_nonce_name';
    }

    protected function actionsManager()
    {

        if (empty($this->args['metaBoxId'])) return;

        add_action('add_meta_boxes', [$this, 'addMetaBox']);

        add_action('save_post', [$this, 'saveMetaBox']);
    }

    protected function imageUploadManager()
    {

        if($this->args['metaBoxType'] !== 'image') return;
        
        // Image Upload Scripts
        $adminScriptHandle = "meta-box-image-upload";
        (new AdminEnqueueScripts)
            ->addScript($adminScriptHandle, 'meta-box-image-upload.js')
            ->dependency('jquery')
            ->enqueue();
    }

    public function addMetaBox()
    {

        add_meta_box(
            $this->args['metaBoxId'],
            $this->args['title'],
            [$this, 'render'],
            $this->args['postTypes'],
            $this->args['context'],
            $this->args['priority'],
            $this->args['priority'],
            $this->args['callbackArgs']
        );
    }

    public function saveMetaBox($postId)
    {

        if (!isset($_POST)) return;

        if (!isset($_POST[$this->args['nonceName']]) || !wp_verify_nonce(wp_unslash($_POST[$this->args['nonceName']]), $this->args['nonceAction'])) return;

        if (!current_user_can('edit_post', $postId)) return;

        if (!isset($_POST[$this->args['postMetaKey']])) return;

        $metaBoxType = ucfirst(strtolower($this->args['metaBoxType']));

        $value = NULL;

        if (method_exists($this, "saveMetaBox{$metaBoxType}")) {

            $value = call_user_func([$this, "saveMetaBox{$metaBoxType}"]);
        }

        if ($value === NULL) return;

        update_post_meta($postId, $this->args['postMetaKey'], $value);
    }

    public function saveMetaBoxText()
    {

        return sanitize_text_field(wp_unslash($_POST[$this->args['postMetaKey']]));
    }

    public function saveMetaBoxEmail()
    {

        return sanitize_email(wp_unslash($_POST[$this->args['postMetaKey']]));
    }

    public function saveMetaBoxUrl()
    {

        return esc_url_raw($_POST[$this->args['postMetaKey']]);
    }

    public function saveMetaBoxInt()
    {

        return intval($_POST[$this->args['postMetaKey']]);
    }

    public function saveMetaBoxFloat()
    {

        return floatval($_POST[$this->args['postMetaKey']]);
    }

    public function saveMetaBoxTextarea()
    {

        return sanitize_textarea_field($_POST[$this->args['postMetaKey']]);
    }

    public function saveMetaBoxRadio()
    {

        return sanitize_text_field(wp_unslash($_POST[$this->args['postMetaKey']]));
    }

    public function saveMetaBoxSelect()
    {

        return sanitize_text_field(wp_unslash($_POST[$this->args['postMetaKey']]));
    }

    public function saveMetaBoxCheckbox()
    {

        $options = [];

        $postMetaKey = $this->args['postMetaKey'];

        foreach ($_POST as $key => $value) {

            preg_match("/($postMetaKey\d+)/", $key, $matches);

            if (!empty($matches)) {

                array_push($options, $value);
            }
        }

        return implode(',', $options);
    }

    public function saveMetaBoxImage()
    {

        return intval($_POST[$this->args['postMetaKey']]);
    }

    public function render($post, $meta)
    {

        $metaBoxValue = get_post_meta(
            $post->ID,
            $this->args['postMetaKey'],
            true
        );

        if (empty($metaBoxValue)) {

            $metaBoxValue = $this->args['defaultValue'];
        }

        if (!mxsfwnView("meta-boxes/{$this->args['metaBoxType']}", [
            'metaBoxValue' => $metaBoxValue,
            'postMetaKey'  => $this->args['postMetaKey'],
            'readonly'     => $this->args['readonly'],
            'options'      => $this->args['options'],
            'title'        => $this->args['title'],
        ])) {

            mxsfwnView('meta-boxes/404');
        }

        wp_nonce_field($this->args['nonceAction'], $this->args['nonceName'], true, true);
    }
}
