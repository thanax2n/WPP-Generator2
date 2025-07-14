# WPP Generator Next - WordPress Plugin

This plugin was generated using the [WPPG-NEXT Generator](https://wppg-next.markomaksym.com.ua/) - a comprehensive WordPress plugin boilerplate with modern development tools, Gutenberg blocks, REST API endpoints, and React frontend components.

**Current Version**: WPPG Next Version 1.2.1 (Stable)

**Important**: The generator automatically creates unique prefixes for all classes, functions, and constants to prevent conflicts with other plugins. This ensures your plugin can coexist safely with any other WordPress plugins.

**Note**: In this codebase, you'll see placeholder strings like "MXSFWN" and "mxsfwn" - these are automatically replaced with unique strings during plugin generation based on your plugin name.

## ⚠️ Important Notice

**This repository is for demonstration purposes only!** 

If you found this plugin on GitHub, please note that this is the base template used by the generator. **Do not use this repository directly for plugin development.** 

To create your own WordPress plugin, you must:
1. Visit the [WPPG-NEXT Generator](https://wppg-next.markomaksym.com.ua/)
2. Fill in your plugin details
3. Generate your own unique plugin starter kit

The generator will create a customized version with unique prefixes and your specific plugin configuration.

## 🚀 Quick Start

### Video Guide
📹 **[How to Use WPPG Next Plugin Generator](https://www.youtube.com/watch?v=2FY7lDoZ0k0)** - A short guide demonstrating how to use the WPPG Next plugin generator.

### Prerequisites
- PHP 7.4 or higher
- WordPress 5.9 or higher
- Node.js 16+ and npm
- Composer

### Installation & Setup

1. **Generate your plugin** using the [WPPG-NEXT Generator](https://wppg-next.markomaksym.com.ua/):
   - Visit the generator website
   - Fill in your plugin details (the generator will create unique prefixes to avoid conflicts)
   - Download the generated plugin zip file
   - Extract to your WordPress plugins directory:
   ```bash
   cd wp-content/plugins/
   unzip your-plugin-name.zip
   cd your-plugin-name
   ```

2. **Install PHP dependencies** (autoloading):
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**:
   ```bash
   npm install
   ```

4. **Build assets for development**:
   ```bash
   npm run watch
   ```

5. **Build assets for production**:
   ```bash
   npm run build
   ```

6. **Rename example files** (important for development):
   ```bash
   # Rename example files to their proper names
   mv example.gitignore .gitignore
   mv example.env .env
   mv example.cursorrules .cursorrules
   ```

7. **Activate the plugin** in WordPress admin panel

## 🛠️ Development Workflow

### Available NPM Scripts

**Main Development (JavaScript/React):**
- `npm run watch` - Build assets in development mode with file watching
- `npm run build` - Build assets for production

**Gutenberg Blocks Development:**
- `npm run start` - Start Gutenberg blocks development (WordPress scripts)
- `npm run build` - Build Gutenberg blocks for production

**Note**: The package.json contains two script configurations:
- `"scripts"` - For JavaScript/React development (default)
- `"scriptsForGutenbergCompelling"` - For Gutenberg blocks development only

### Development Commands

**For JavaScript/React Development:**
```bash
# Start development with file watching
npm run watch

# Build for production
npm run build
```

**For Gutenberg Blocks Development:**
```bash
# Start Gutenberg blocks development
npm run start

# Build Gutenberg blocks for production
npm run build
```

### Switching Development Modes

**To switch to Gutenberg-only development:**
1. Open `package.json`
2. Replace the `"scripts"` section with `"scriptsForGutenbergCompelling"`
3. Save the file
4. Run `npm run start` for development or `npm run build` for production

**To switch back to JavaScript/React development:**
1. Open `package.json`
2. Replace `"scriptsForGutenbergCompelling"` with the original `"scripts"`
3. Save the file
4. Run `npm run watch` for development or `npm run build` for production

**Important**: Only one development mode can be active at a time. Choose based on your current development focus.

## 🎯 Plugin Features

### Admin Panel
- **Custom Admin Pages**: MVC pattern with controllers and views
- **Custom Post Types**: Easy registration with `PostTypeGenerator`
- **Custom Taxonomies**: Simple creation with `TaxonomyGenerator`
- **Meta Boxes**: Various field types (text, email, image, select, etc.)
- **Data Tables**: Custom database tables with migration system

### Frontend Features
- **React Components**: Modern React app with Redux Toolkit
- **Shortcodes**: Easy shortcode generation system
- **Asset Management**: Optimized CSS/JS loading

### Gutenberg Blocks
- **Custom Blocks**: Multiple block examples included
- **Server-Side Rendering**: PHP-based block rendering
- **Child Blocks**: Nested block structures
- **Responsive Design**: Mobile-first block development

### API & Integration
- **REST API Endpoints**: Extensible API system
- **Next.js Integration**: Headless WordPress setup
- **Database Operations**: Secure database interactions

## 🔧 Configuration

### PHP Configuration
- **Namespace**: `MXSFWNWPPGNext` (generated from your plugin name)
- **Autoloading**: PSR-4 via Composer
- **Constants**: `MXSFWN_PLUGIN_*` prefix (unique to your plugin)
- **Unique Prefixes**: All classes, functions, and constants use unique prefixes to avoid conflicts

### Build Configuration
- **Webpack**: Custom configuration for multiple entry points
- **SCSS**: Preprocessor with source maps
- **Code Splitting**: Vendor libraries optimization
- **Production**: Minification and optimization

### Example Files Setup
The plugin includes several example files that need to be renamed for development:
- `example.gitignore` → `.gitignore` (Git ignore rules)
- `example.env` → `.env` (Environment variables)
- `example.cursorrules` → `.cursorrules` (Cursor AI rules)

**Important**: These files are provided as examples and must be renamed to their proper names to work correctly.

## 📁 Project Structure

### Plugin Structure
```bash
wpp-generator-next/
├── README.md
├── assets
│   ├── gutenberg
│   │   ├── content-slider
│   │   │   ├── css
│   │   │   │   └── owl.carousel.min.css
│   │   │   └── js
│   │   │       ├── handler.js
│   │   │       └── owl.carousel.min.js
│   │   └── counter-section
│   │       ├── css
│   │       │   └── animate.min.css
│   │       └── js
│   │           ├── counterup.min.js
│   │           ├── script.js
│   │           ├── waypoints.min.js
│   │           └── wow.min.js
│   └── packages
│       ├── font-awesome-4.6.3
│       │   ├── css
│       │   │   ├── font-awesome.css
│       │   │   └── font-awesome.min.css
│       │   └── fonts
│       │       ├── FontAwesome.otf
│       │       ├── fontawesome-webfont.eot
│       │       ├── fontawesome-webfont.svg
│       │       ├── fontawesome-webfont.ttf
│       │       ├── fontawesome-webfont.woff
│       │       └── fontawesome-webfont.woff2
│       └── vue
│           ├── development.js
│           ├── js
│           │   ├── development.js
│           │   └── production.js
│           └── production.js
├── build
│   ├── admin
│   │   └── meta-box-image-upload
│   │       ├── index.css
│   │       ├── index.css.map
│   │       ├── index.js
│   │       ├── index.js.LICENSE.txt
│   │       └── index.js.map
│   ├── dependencies
│   │   └── vendors
│   │       ├── index.js
│   │       ├── index.js.LICENSE.txt
│   │       └── index.js.map
│   ├── frontend
│   │   ├── index.js
│   │   └── react-js
│   │       ├── index.css
│   │       ├── index.css.map
│   │       ├── index.js
│   │       ├── index.js.LICENSE.txt
│   │       └── index.js.map
│   └── gutenberg
│       ├── content-slider
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── counter-section
│       │   ├── block.json
│       │   ├── child-blocks
│       │   │   └── block-one
│       │   │       ├── block.json
│       │   │       ├── index.asset.php
│       │   │       ├── index.css
│       │   │       ├── index.js
│       │   │       └── style-index.css
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── extending
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   └── index.js
│       ├── full-width-section
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── full-width-section-image
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── image-section
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── nested-blocks
│       │   ├── block.json
│       │   ├── child-blocks
│       │   │   └── block-one
│       │   │       ├── block.json
│       │   │       ├── index.asset.php
│       │   │       ├── index.css
│       │   │       ├── index.js
│       │   │       └── style-index.css
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── responsive-spacer
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── server-side-rendering
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       ├── simple-image
│       │   ├── block.json
│       │   ├── index.asset.php
│       │   ├── index.css
│       │   ├── index.js
│       │   └── style-index.css
│       └── simple-text
│           ├── block.json
│           ├── index.asset.php
│           ├── index.css
│           ├── index.js
│           └── style-index.css
├── composer.json
├── composer.lock
├── example.gitignore
├── generate-structure.js
├── includes
│   ├── Activate
│   │   ├── AIRobotsDataTableMigration.php
│   │   ├── CreateDataTable.php
│   │   ├── CreateDataTableManager.php
│   │   └── seeder
│   │       └── ai-robots.php
│   ├── Activator.php
│   ├── Admin
│   │   ├── AdminSoul.php
│   │   ├── Entities
│   │   │   ├── AdminMenu.php
│   │   │   ├── AdminNotices.php
│   │   │   ├── MetaBox.php
│   │   │   ├── PostType.php
│   │   │   └── Taxonomy.php
│   │   ├── Router.php
│   │   ├── Utilities
│   │   │   ├── AdminEnqueueScripts.php
│   │   │   ├── MetaBoxGenerator.php
│   │   │   ├── Notices
│   │   │   │   ├── MetaBoxTypeNotice.php
│   │   │   │   └── PathNotice.php
│   │   │   ├── PostTypeGenerator.php
│   │   │   ├── Tables
│   │   │   │   ├── RobotsDataManager.php
│   │   │   │   └── RobotsTable.php
│   │   │   └── TaxonomyGenerator.php
│   │   ├── controllers
│   │   │   ├── ai-robots-table
│   │   │   │   ├── action-ai-robot-bulk.php
│   │   │   │   ├── action-ai-robot-store.php
│   │   │   │   ├── action-ai-robot-trash-restore-delete.php
│   │   │   │   ├── action-ai-robot-update.php
│   │   │   │   ├── add-robot.php
│   │   │   │   ├── main.php
│   │   │   │   └── single.php
│   │   │   ├── hidden-menu.php
│   │   │   ├── main.php
│   │   │   ├── settings-menu.php
│   │   │   └── sub-menu.php
│   │   ├── routes.php
│   │   └── views
│   │       ├── ai-robots-table
│   │       │   ├── 404.view.php
│   │       │   ├── add-robot.view.php
│   │       │   ├── main.view.php
│   │       │   └── single.view.php
│   │       ├── hidden-menu.view.php
│   │       ├── main.view.php
│   │       ├── meta-boxes
│   │       │   ├── 404.view.php
│   │       │   ├── checkbox.view.php
│   │       │   ├── email.view.php
│   │       │   ├── float.view.php
│   │       │   ├── image.view.php
│   │       │   ├── int.view.php
│   │       │   ├── radio.view.php
│   │       │   ├── select.view.php
│   │       │   ├── text.view.php
│   │       │   ├── textarea.view.php
│   │       │   └── url.view.php
│   │       ├── settings-menu.view.php
│   │       └── sub-menu.view.php
│   ├── Deactivator.php
│   ├── Features
│   │   ├── API
│   │   │   ├── AbstractClasses
│   │   │   │   └── AbstractRestRouteHandler.php
│   │   │   ├── Interfaces
│   │   │   │   └── RestRouteHandlerInterface.php
│   │   │   ├── Routes
│   │   │   │   ├── DeletePostMetaImageRoute.php
│   │   │   │   ├── GetPostMetaImageRoute.php
│   │   │   │   ├── NextJS
│   │   │   │   │   ├── GetAllPagesRoute.php
│   │   │   │   │   ├── GetMenuItemsRoute.php
│   │   │   │   │   ├── GetPageBySlugRoute.php
│   │   │   │   │   └── GetStylesRoute.php
│   │   │   │   ├── TasksManager
│   │   │   │   │   ├── GetTaskListRoute.php
│   │   │   │   │   └── UpdateTaskListRoute.php
│   │   │   │   └── UpdatePostMetaImageRoute.php
│   │   │   └── init.php
│   │   ├── FeaturesSoul.php
│   │   └── Gutenberg
│   │       ├── CustomBlocks.php
│   │       └── components
│   │           └── server-side-rendering.php
│   ├── Frontend
│   │   ├── FrontendSoul.php
│   │   ├── Utilities
│   │   │   ├── ShortCodeGenerator.php
│   │   │   └── WPEnqueueScripts.php
│   │   └── components
│   │       └── shortcode-react-js-app.php
│   ├── Shared
│   │   ├── TasksManager.php
│   │   └── functions.php
│   ├── Uninstall.php
│   └── WppGenerator.php
├── index.php
├── install.php
├── languages
│   ├── uk_UA.mo
│   └── uk_UA.po
├── license.txt
├── next-js
│   ├── README.md
│   ├── app
│   │   ├── [id]
│   │   │   └── page.jsx
│   │   ├── blog
│   │   │   ├── [id]
│   │   │   │   └── page.jsx
│   │   │   └── page.jsx
│   │   ├── components
│   │   │   ├── Footer.jsx
│   │   │   └── Header.jsx
│   │   ├── favicon.ico
│   │   ├── globals.css
│   │   ├── layout.js
│   │   ├── loading.jsx
│   │   ├── not-found.jsx
│   │   ├── page.js
│   │   └── services
│   │       ├── API.js
│   │       ├── globalStyleService.js
│   │       ├── menuService.js
│   │       └── pageService.js
│   ├── eslint.config.mjs
│   ├── example.env
│   ├── example.gitignore
│   ├── jsconfig.json
│   ├── next.config.mjs
│   ├── package-lock.json
│   ├── package.json
│   ├── postcss.config.mjs
│   └── public
│       ├── file.svg
│       ├── globe.svg
│       ├── next.svg
│       ├── vercel.svg
│       └── window.svg
├── package-lock.json
├── package.json
├── plugin-structure.md
├── readme.txt
├── screenshots
│   ├── banner-1544x500.jpg
│   ├── banner-772x250.jpg
│   ├── icon-128x128.jpg
│   ├── icon-256x256.jpg
│   ├── screenshot-1.jpg
│   └── screenshot-2.jpg
├── src
│   ├── admin
│   │   └── meta-box-image-upload
│   │       ├── assets
│   │       │   └── scss
│   │       │       └── style.scss
│   │       ├── components
│   │       │   └── metaboxes
│   │       │       └── ImageUploader.js
│   │       ├── features
│   │       └── index.js
│   ├── frontend
│   │   └── react-js
│   │       ├── assets
│   │       │   └── css
│   │       │       └── main.scss
│   │       ├── components
│   │       │   ├── DefaultLayout.jsx
│   │       │   ├── FlashBox
│   │       │   │   └── index.js
│   │       │   ├── FlashMessages.jsx
│   │       │   ├── Navigation
│   │       │   │   └── index.jsx
│   │       │   ├── NoTasksFound
│   │       │   │   └── index.jsx
│   │       │   └── SaveTasks
│   │       │       └── index.jsx
│   │       ├── helpers
│   │       │   └── index.js
│   │       ├── index.js
│   │       ├── pages
│   │       │   ├── Bin.jsx
│   │       │   ├── Home.jsx
│   │       │   └── NotFound.jsx
│   │       ├── router
│   │       │   └── index.jsx
│   │       ├── services
│   │       │   ├── API.js
│   │       │   └── TaskList.js
│   │       └── store
│   │           ├── index.js
│   │           └── slices
│   │               ├── notify
│   │               │   └── notifySlice.js
│   │               └── taskList
│   │                   └── taskListSlice.js
│   └── gutenberg
│       ├── content-slider
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── counter-section
│       │   ├── block.json
│       │   ├── child-blocks
│       │   │   └── block-one
│       │   │       ├── block.json
│       │   │       ├── edit.js
│       │   │       ├── editor.scss
│       │   │       ├── index.js
│       │   │       ├── save.js
│       │   │       └── style.scss
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── extending
│       │   ├── block.json
│       │   └── index.js
│       ├── full-width-section
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── full-width-section-image
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── image-section
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── nested-blocks
│       │   ├── block.json
│       │   ├── child-blocks
│       │   │   └── block-one
│       │   │       ├── block.json
│       │   │       ├── edit.js
│       │   │       ├── editor.scss
│       │   │       ├── index.js
│       │   │       ├── save.js
│       │   │       └── style.scss
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── responsive-spacer
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── server-side-rendering
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       ├── simple-image
│       │   ├── block.json
│       │   ├── edit.js
│       │   ├── editor.scss
│       │   ├── index.js
│       │   ├── save.js
│       │   └── style.scss
│       └── simple-text
│           ├── block.json
│           ├── edit.js
│           ├── editor.scss
│           ├── index.js
│           ├── save.js
│           └── style.scss
├── uninstall.php
├── webpack.custom.config.js
└── wpp-generator-next.php
```

## 🚨 Troubleshooting

### Common Issues

**Build errors:**
```bash
# Clear node_modules and reinstall
rm -rf node_modules package-lock.json
npm install

# Clear build directory
rm -rf build/
npm run build
```

**Autoloading issues:**
```bash
# Regenerate autoloader
composer dump-autoload
```

**WordPress activation errors:**
- Check PHP version (requires 7.4+)
- Verify WordPress version (requires 5.9+)
- Check file permissions
- Review error logs

**Gutenberg blocks not appearing:**
- Ensure blocks are built: `npm run build`
- Check block registration in `CustomBlocks.php`
- Verify `block.json` files exist

**Example files not working:**
- Rename example files: `mv example.gitignore .gitignore`
- Ensure `.env` file exists for environment variables
- Check `.cursorrules` file for AI development rules

**Build scripts not working:**
- Check if you're using the correct script configuration in `package.json`
- For JavaScript/React: use `"scripts"` section
- For Gutenberg blocks: use `"scriptsForGutenbergCompelling"` section
- Only one development mode can be active at a time

### Development Tips

1. **Use the `.cursorrules` file** for AI-assisted development
2. **Run `npm run watch`** during development for automatic rebuilding
3. **Check browser console** for JavaScript errors
4. **Use WordPress debug mode** for PHP errors
5. **Test in different environments** before deployment

## 🤝 Contributing

### About This Plugin

This plugin was generated using the [WPPG-NEXT Generator](https://wppg-next.markomaksym.com.ua/).

📹 **[Watch Video Guide](https://www.youtube.com/watch?v=2FY7lDoZ0k0)** - Learn how to use the WPPG Next plugin generator. 

**Important**: This repository serves as the base template for the generator. If you need to create a new plugin, please visit the generator website to generate your own unique plugin starter kit with custom prefixes and configuration.

## 📄 License

This project is licensed under the GPL v2 or later - see the [license.txt](license.txt) file for details.

## 🙏 Acknowledgments

- [WPPG-NEXT Generator](https://wppg-next.markomaksym.com.ua/) for this plugin boilerplate
- WordPress community for the excellent documentation
- Gutenberg team for the block editor
- React and Redux communities for the frontend tools