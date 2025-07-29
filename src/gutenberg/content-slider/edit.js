import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { CheckboxControl, PanelBody, PanelRow, __experimentalNumberControl as NumberControl } from '@wordpress/components';
import './editor.scss';

export default function edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps()

	return [
		<InspectorControls key="mx-settings">

			<PanelBody title={__('Slider Options', 'wpp-generator-next')} initialOpen={false}>

				<PanelRow>

					<CheckboxControl
						label={__('Autoplay', 'wpp-generator-next')}
						help={__('Do you want enable autoplay?', 'wpp-generator-next')}
						checked={ attributes.autoplay === '1' }
						onChange={tick => {
							const turnOn = tick ? '1' : '0'
							setAttributes({
								autoplay: turnOn
							})
						} }
					/>

				</PanelRow>

				{ attributes.autoplay === '1' &&
					<PanelRow>

						<NumberControl
							label={__('Autoplay speed in seconds', 'wpp-generator-next')}
							value={attributes.autoplay_speed}
							min="0"
							onChange={(speed) => setAttributes({
								autoplay_speed: speed
							})}
						/>

					</PanelRow>
				}

				<PanelRow>

					<CheckboxControl
						label={__('Show Navigation', 'wpp-generator-next')}
						help={__('Do you want to show navigation?', 'wpp-generator-next')}
						checked={ attributes.nav === '1' }
						onChange={tick => {
							const turnOn = tick ? '1' : '0'
							setAttributes({
								nav: turnOn
							})
						} }
					/>

				</PanelRow>

				<PanelRow>

					<CheckboxControl
						label={__('Show Dots', 'wpp-generator-next')}
						help={__('Do you want to show dots?', 'wpp-generator-next')}
						checked={ attributes.dots === '1' }
						onChange={tick => {
							const turnOn = tick ? '1' : '0'
							setAttributes({
								dots: turnOn
							})
						} }
					/>

				</PanelRow>

				<PanelRow>

					<CheckboxControl
						label={__('Loop', 'wpp-generator-next')}
						help={__('Do you want to enable an infinite loop?', 'wpp-generator-next')}
						checked={ attributes.loop === '1' }
						onChange={tick => {
							const turnOn = tick ? '1' : '0'
							setAttributes({
								loop: turnOn
							})
						} }
					/>

				</PanelRow>

			</PanelBody>

		</InspectorControls>,
		<div
			{...blockProps}
			key="mx-main-content"
			data-autoplay={attributes.autoplay}
			data-autoplay-speed={attributes.autoplay_speed}
			data-nav={attributes.nav}
			data-dots={attributes.dots}
			data-loop={attributes.loop}
		>
			<InnerBlocks />
		</div>
	];
}
