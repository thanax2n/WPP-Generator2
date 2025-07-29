import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import { __experimentalNumberControl as NumberControl } from '@wordpress/components';
import { PanelBody } from '@wordpress/components';
import './editor.scss';
import metadata from './block.json';

export default function Edit({ attributes, setAttributes }) {

	const blockProps = useBlockProps();

	const onChangeNumber = (number) => {
		setAttributes({ customNumber: number });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Block Settings', 'gutenpride')}>
					<NumberControl
						label={__('Number of posts', 'gutenpride')}
						value={attributes.customNumber}
						onChange={onChangeNumber}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<ServerSideRender
					block={metadata.name}
					attributes={attributes}
				/>
			</div>
		</>
	);
}
