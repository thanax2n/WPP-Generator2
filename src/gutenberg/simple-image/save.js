import { useBlockProps } from '@wordpress/block-editor'
import { __ } from '@wordpress/i18n';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save()

	return <div {...blockProps}>
		<img 
			src={attributes.mediaUrl} 
			data-image-id={attributes.mediaId} 
			alt={__('Simple Image', 'wpp-generator-next-source')}
		/>
	</div>
}
