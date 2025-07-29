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
