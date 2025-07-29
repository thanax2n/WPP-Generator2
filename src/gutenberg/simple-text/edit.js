import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function edit({ attributes, isSelected, setAttributes }) {
	const blockProps = useBlockProps()
	return (
		<div  {...blockProps}>
			<RichText
				tagName="div"
				value={attributes.message}
				onChange={(val) => setAttributes({ message: val })}
				placeholder={__('Enter your text here...', 'wpp-generator-next')}
			/>
		</div>
	);
}
