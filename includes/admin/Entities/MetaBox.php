<?php

namespace MXSFWNWPPGNext\Admin\Entities;

class MetaBox
{

    private $args = [];

    protected $defaults = [
        'id'           => 'mx-meta-box',
        'postTypes'    => 'page',
        'name'         => 'Meta Box',
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
     *      'name'         'Meta Box' (string)
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

        $this->setMetaBoxId();

        $this->setPostMetaKey();

        $this->nonceManager();

        $this->actionsManager();
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

    public function addMetaBox()
    {

        add_meta_box(
            $this->args['metaBoxId'],
            $this->args['name'],
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

        if(!isset($_POST)) return;

        if(!isset($_POST[$this->args['nonceName']]) || !wp_verify_nonce(wp_unslash($_POST[$this->args['nonceName']]), $this->args['nonceAction'])) return;

        if(!current_user_can('edit_post', $postId)) return;

        if(!isset($_POST[$this->args['postMetaKey']])) return;

        $value = $this->saveMetaBoxText();

        if(!$value) return;

        update_post_meta($postId, $this->args['postMetaKey'], $value);

    }

    public function saveMetaBoxText()
    {

        if($this->args['metaBoxType'] !== 'text') return false;

        return sanitize_text_field(wp_unslash($_POST[$this->args['postMetaKey']]));
    }

    public function render($post, $meta)
    {

        $metaBoxValue = get_post_meta(
            $post->ID,
            $this->args['postMetaKey'],
            true
        );

        mxsfwnView('meta-boxes/text', [
            'metaBoxValue' => $metaBoxValue,
            'postMetaKey'  => $this->args['postMetaKey'],
            'readonly'     => $this->args['readonly']
        ]);

        wp_nonce_field($this->args['nonceAction'], $this->args['nonceName'], true, true);
    }
}
