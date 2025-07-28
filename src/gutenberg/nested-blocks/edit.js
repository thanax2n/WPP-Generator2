import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';

export default function edit({ attributes, isSelected, setAttributes }) {
	const blockProps = useBlockProps();
	const ALLOWED_BLOCKS = ['mxsfwn/nested-blocks-child-blocks-block-one'];
	
	return (
		<div {...blockProps}>
			<InnerBlocks 
				allowedBlocks={ALLOWED_BLOCKS}
				renderAppender={() => <InnerBlocks.ButtonBlockAppender />}
			/>
		</div>
	);
}
