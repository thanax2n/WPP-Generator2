import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextareaControl, Notice } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Clean prompt string by removing invalid characters
 * 
 * @param {string} string - The string to clean
 * @returns {string} The cleaned string
 */
const cleanPrompt = (string) => {
    if (!string || typeof string !== 'string') {
        return '';
    }
    return string.replace(/[^A-Za-z0-9-_ .,?!]/gi, '');
};

/**
 * Check if block should be extended
 * 
 * @param {string} blockName - The block name to check
 * @returns {boolean} Whether the block should be extended
 */
const shouldExtendBlock = (blockName) => {
    const extendableBlocks = ['core/paragraph', 'core/heading', 'core/button'];
    return extendableBlocks.includes(blockName);
};

/**
 * Higher-order component to add inspector controls
 */
const withInspectorControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        // Only extend specific blocks
        if (!shouldExtendBlock(props.name)) {
            return <BlockEdit {...props} />;
        }

        const { attributes, setAttributes } = props;
        const extendedSettings = attributes.extendedSettings || {};

        const handlePromptChange = (prompt) => {
            const cleanedPrompt = cleanPrompt(prompt);
            setAttributes({
                extendedSettings: {
                    ...extendedSettings,
                    prompt: cleanedPrompt
                }
            });
        };

        return (
            <Fragment>
                <BlockEdit {...props} />
                <InspectorControls>
                    <PanelBody 
                        title={__('Block Extender', 'wpp-generator-next')} 
                        initialOpen={false}
                    >
                        <TextareaControl
                            label={__('AI Prompt', 'wpp-generator-next')}
                            help={__('Enter a prompt to enhance this block with AI functionality', 'wpp-generator-next')}
                            value={extendedSettings.prompt || ''}
                            onChange={handlePromptChange}
                            placeholder={__('Enter your prompt here...', 'wpp-generator-next')}
                        />
                        {extendedSettings.prompt && (
                            <Notice 
                                status="info" 
                                isDismissible={false}
                            >
                                {__('This block has been extended with AI functionality', 'wpp-generator-next')}
                            </Notice>
                        )}
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        );
    };
}, 'withInspectorControls');

/**
 * Add custom attributes to extendable blocks
 */
addFilter(
    'blocks.registerBlockType',
    'mxsfwn/extending/add-attributes',
    (props, name) => {
        if (!shouldExtendBlock(name)) {
            return props;
        }

        const attributes = {
            ...props.attributes,
            extendedSettings: {
                type: 'object',
                default: {
                    prompt: ''
                }
            }
        };

        return { ...props, attributes };
    }
);

/**
 * Add inspector controls to extendable blocks
 */
addFilter(
    'editor.BlockEdit',
    'mxsfwn/extending/add-inspector-controls',
    withInspectorControls
);