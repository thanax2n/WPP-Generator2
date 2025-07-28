# Nested Blocks Gutenberg Block

This is a Gutenberg block that demonstrates nested blocks functionality. It includes a parent block that can contain child blocks.

## Structure

```
nested-blocks/
├── block.json              # Parent block configuration
├── index.js                # Parent block registration
├── edit.js                 # Parent block editor component
├── save.js                 # Parent block save component
├── style.scss              # Parent block frontend styles
├── editor.scss             # Parent block editor styles
└── child-blocks/
    └── block-one/
        ├── block.json      # Child block configuration
        ├── index.js        # Child block registration
        ├── edit.js         # Child block editor component
        ├── save.js         # Child block save component
        ├── style.scss      # Child block frontend styles
        └── editor.scss     # Child block editor styles
```

## Features

### Parent Block (`mxsfwn/nested-blocks`)
- Container block that can hold child blocks
- Uses `InnerBlocks` to allow child blocks
- Supports alignment options (left, right, full)
- Supports color controls for background and text

### Child Block (`mxsfwn/nested-blocks-child-blocks-block-one`)
- Can only be added inside the parent block
- Has configurable attributes:
  - `message`: Text content
  - `number`: Numeric value (1-10)
  - `size`: Size option (small, medium, large)
- Supports alignment and color controls
- Shows a placeholder when selected, displays content when not selected

## Build Process

The blocks are built using a custom webpack configuration that automatically discovers all blocks in the `src/gutenberg` directory, including nested ones.

### Build Commands

```bash
# Development with watch mode
npm run start:custom

# Production build
npm run build:custom
```

## Issues Fixed

1. **Missing Attributes**: Added `number` and `size` attributes to the child block's `block.json`
2. **Improved Edit Function**: Simplified the child block's edit function for better reliability
3. **Enhanced Save Function**: Updated to include data attributes for number and size
4. **Webpack Configuration**: Created custom webpack config to handle nested blocks
5. **Block Registration**: Both parent and child blocks are now properly registered
6. **CSS Class Names**: Fixed CSS class names to match block names
7. **Code Cleanup**: Removed unused imports and improved code structure

## Usage

1. Add the "Nested Blocks Section" block to your content
2. Click the "+" button inside the block to add child blocks
3. Only "Block One" child blocks can be added
4. Configure the child block's attributes using the sidebar controls

## Development

To add more child blocks:

1. Create a new directory in `child-blocks/`
2. Include all required files (block.json, index.js, edit.js, save.js, style.scss, editor.scss)
3. Update the parent block's `ALLOWED_BLOCKS` array in `edit.js`
4. The webpack configuration will automatically pick up the new block 