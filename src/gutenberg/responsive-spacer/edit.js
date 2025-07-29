import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { __experimentalNumberControl as NumberControl, Panel, PanelBody, PanelRow } from '@wordpress/components';
import { useEffect } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {

	const blockProps = useBlockProps();

	const makeUniqueClass = (length) => {
		let result = '';
		const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		const charactersLength = characters.length;
		let counter = 0;
		while (counter < length) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
			counter += 1;
		}
		return result;
	}

	useEffect(() => {
		// Only set unique_class if it doesn't already exist
		if (!attributes.unique_class || attributes.unique_class === 'mx-spacer') {
			setAttributes({
				unique_class: 'mx-spacer-' + makeUniqueClass(12)
			});
		}
	}, []); // Empty dependency array ensures this only runs once

	// Helper function to safely get numeric value
	const getNumericValue = (value) => {
		return value !== null && value !== undefined ? value : '';
	};

	return [
		<InspectorControls key="mx-settings">

			{/* Default */}
			<Panel header="Default height">
				<PanelBody title="Default height" initialOpen={true}>
					<PanelRow>
						<NumberControl
							label={__('Default Height', 'mxsfwn')}
							value={attributes.media_default || 100}
							onChange={(media_default) => setAttributes({ media_default: media_default || 100 })}
							min={0}
							step={1}
						/>
					</PanelRow>
				</PanelBody>
			</Panel>

			{/* <768 */}
			<Panel header="Media breakpoints">
				<PanelBody title="Set Height for devices" initialOpen={false}>

					<PanelRow>
						<NumberControl
							label={__('@media <1500px', 'mxsfwn')}
							value={getNumericValue(attributes.media_1500)}
							onChange={(media_1500) => setAttributes({ media_1500: media_1500 || null })}
							min={0}
							step={1}
						/>
					</PanelRow>

					<PanelRow>
						<NumberControl
							label={__('@media <1220px', 'mxsfwn')}
							value={getNumericValue(attributes.media_1220)}
							onChange={(media_1220) => setAttributes({ media_1220: media_1220 || null })}
							min={0}
							step={1}
						/>
					</PanelRow>

					<PanelRow>
						<NumberControl
							label={__('@media <992px', 'mxsfwn')}
							value={getNumericValue(attributes.media_992)}
							onChange={(media_992) => setAttributes({ media_992: media_992 || null })}
							min={0}
							step={1}
						/>
					</PanelRow>
					
					<PanelRow>
						<NumberControl
							label={__('@media <768px', 'mxsfwn')}
							value={getNumericValue(attributes.media_768)}
							onChange={(media_768) => setAttributes({ media_768: media_768 || null })}
							min={0}
							step={1}
						/>
					</PanelRow>
					
				</PanelBody>
			</Panel>

		</InspectorControls>,
		<div
			{...blockProps}
			key="mx-main-content"
		>
			<div
				className={'mx-responsive-block-spacer ' + attributes.unique_class}
			>
				<style>
					{'.' + attributes.unique_class + '{height:' + (attributes.media_default || 100) + 'px;}'}

					{/* @media 1500 */}
					{
						attributes.media_1500 !== null && attributes.media_1500 !== '' &&
						`@media (max-width: 1500px) {
							.${attributes.unique_class} {
								height: ${attributes.media_1500}px;
							}
						}
						`
					}

					{/* @media 1220 */}
					{
						attributes.media_1220 !== null && attributes.media_1220 !== '' &&
						`@media (max-width: 1220px) {
							.${attributes.unique_class} {
								height: ${attributes.media_1220}px;
							}
						}
						`
					}

					{/* @media 992 */}
					{
						attributes.media_992 !== null && attributes.media_992 !== '' &&
						`@media (max-width: 992px) {
							.${attributes.unique_class} {
								height: ${attributes.media_992}px;
							}
						}
						`
					}

					{/* @media 768 */}
					{
						attributes.media_768 !== null && attributes.media_768 !== '' &&
						`@media (max-width: 768px) {
							.${attributes.unique_class} {
								height: ${attributes.media_768}px;
							}
						}
						`
					}
				</style>
			</div>
		</div>
	];
}
