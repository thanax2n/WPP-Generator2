import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import './style.scss';
import edit from './edit';
import save from './save';

// Register the parent block
registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit,

	/**
	 * @see ./save.js
	 */
	save,
});

// Register the child block
import childMetadata from './child-blocks/block-one/block.json';
import childEdit from './child-blocks/block-one/edit';
import childSave from './child-blocks/block-one/save';

registerBlockType(childMetadata.name, {
	/**
	 * @see ./child-blocks/block-one/edit.js
	 */
	edit: childEdit,

	/**
	 * @see ./child-blocks/block-one/save.js
	 */
	save: childSave,
});
