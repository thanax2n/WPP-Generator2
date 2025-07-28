import { useBlockProps } from '@wordpress/block-editor'

export default function save({ attributes }) {
	const blockProps = useBlockProps.save()
	return (
		<div {...blockProps} data-number={attributes.number} data-size={attributes.size}>
			{attributes.message}
		</div>
	)
}
