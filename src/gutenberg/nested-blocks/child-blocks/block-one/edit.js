import { __ } from '@wordpress/i18n';
import metadata from './block.json';
import { useBlockProps } from '@wordpress/block-editor';
import { Placeholder, TextControl, SelectControl, RangeControl } from '@wordpress/components';
import './editor.scss';

export default function edit({ attributes, isSelected, setAttributes }) {
	const blockProps = useBlockProps();

	const sizeOptions = [
		{ label: 'Small', value: 'small' },
		{ label: 'Medium', value: 'medium' },
		{ label: 'Large', value: 'large' }
	];

	return (
		<div {...blockProps}>
			{isSelected ? (
				<Placeholder
					label={metadata.title}
					instructions={metadata.description}
				>
					<TextControl
						label={__('Message', 'wpp-generator-next-source')}
						value={attributes.message}
						onChange={(val) => setAttributes({ message: val })}
					/>
					<RangeControl
						label={__('Number', 'wpp-generator-next-source')}
						value={attributes.number}
						onChange={(val) => setAttributes({ number: val })}
						min={1}
						max={10}
					/>
					<SelectControl
						label={__('Size', 'wpp-generator-next-source')}
						value={attributes.size}
						options={sizeOptions}
						onChange={(val) => setAttributes({ size: val })}
					/>
				</Placeholder>
			) : (
				<div data-number={attributes.number} data-size={attributes.size}>
					{attributes.message || __('No Message', 'wpp-generator-next-source')}
				</div>
			)}
		</div>
	);
}
