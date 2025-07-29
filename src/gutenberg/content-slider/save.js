import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { autoplay, showNavigation, showDots, loop } = attributes;
	const blockProps = useBlockProps.save({
		className: 'wp-block-mxsfwn-content-slider'
	});

	return (
		<div
			{...blockProps}
			data-autoplay-speed={autoplay}
			data-show-navigation={showNavigation}
			data-show-dots={showDots}
			data-loop={loop}
		>
			<InnerBlocks.Content />
		</div>
	);
}
