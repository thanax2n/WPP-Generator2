import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { 
	PanelBody, 
	PanelRow, 
	ToggleControl,
	RangeControl,
	__experimentalNumberControl as NumberControl 
} from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { autoplay, showNavigation, showDots, loop } = attributes;
	const blockProps = useBlockProps({
		className: 'wp-block-mxsfwn-content-slider'
	});

	return (
		<>
			<InspectorControls>
				<PanelBody 
					title={__('Slider Settings', 'wpp-generator-next')} 
					initialOpen={true}
				>
					<PanelRow>
						<NumberControl
							label={__('Autoplay Speed (seconds)', 'wpp-generator-next')}
							help={__('Set to 0 to disable autoplay', 'wpp-generator-next')}
							value={autoplay}
							min="0"
							max="10"
							step="0.5"
							onChange={(speed) => setAttributes({ autoplay: speed })}
						/>
					</PanelRow>
					
					<PanelRow>
						<ToggleControl
							label={__('Show Navigation Arrows', 'wpp-generator-next')}
							checked={showNavigation}
							onChange={(value) => setAttributes({ showNavigation: value })}
						/>
					</PanelRow>
					
					<PanelRow>
						<ToggleControl
							label={__('Show Dots', 'wpp-generator-next')}
							checked={showDots}
							onChange={(value) => setAttributes({ showDots: value })}
						/>
					</PanelRow>
					
					<PanelRow>
						<ToggleControl
							label={__('Loop Slides', 'wpp-generator-next')}
							checked={loop}
							onChange={(value) => setAttributes({ loop: value })}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			
			<div
				{...blockProps}
				data-autoplay-speed={autoplay}
				data-show-navigation={showNavigation}
				data-show-dots={showDots}
				data-loop={loop}
			>
				<div className="content-slider-editor">
					<InnerBlocks 
						allowedBlocks={['core/group', 'core/columns', 'core/image', 'core/paragraph', 'core/heading']}
						template={[
							['core/group', {}, [
								['core/paragraph', { placeholder: __('Add slide content here...', 'wpp-generator-next') }]
							]]
						]}
						templateLock={false}
					/>
				</div>
			</div>
		</>
	);
}
