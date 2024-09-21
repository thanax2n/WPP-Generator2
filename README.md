### Plugin Structure
```bash
my-plugin/
│
├── assets/
|   ├── gutenberg/
|   |   └── ...
|   |
|   ├── images/
|   |   └── example.png
|   |
|   └── packages/
|       ├── font-awesome-4.6.3/
|       |   ├── css/
|       |   |   └── ...
|       |   └── fonts/
|       |       └── ...
|       |
|       └── vue/
|           └── js/
|               ├── development.js
|               └── production.js
│
├── build/
|   ├── admin/
|   |   └── ...
|   ├── dependencies/
|   |   └── ...
|   ├── frontend/
|   |   └── ...
|   └── gutenberg/
|       └── ...
|
├── includes/
|   ├── Activate/
|   |   ├── seeder/
|   |   |   └── ai-robots.php
|   |   |   
|   |   ├── AIRobotsDataTableMigration.php
|   |   ├── CreateDataTable.php
|   |   └── CreateDataTableManager.php
|   |
|   ├── Admin/
|   |   ├── controllers/
|   |   |   ├── ai-robots-table/
|   |   |   |   ├── action-ai-robot-bulk.php
|   |   |   |   ├── action-ai-robot-store.php
|   |   |   |   ├── action-ai-robot-trash-restore-delete.php
|   |   |   |   ├── action-ai-robot-update.php
|   |   |   |   ├── add-robot.php
|   |   |   |   ├── main.php
|   |   |   |   └── single.php
|   |   |   |
|   |   |   ├── hidden-menu.php
|   |   |   ├── main.php
|   |   |   ├── settings-menu.php
|   |   |   └── sub-menu.php
|   |   |
|   |   ├── Entities/
|   |   |   ├── AdminMenu.php
|   |   |   ├── AdminNotices.php
|   |   |   ├── MetaBox.php
|   |   |   ├── PostType.php
|   |   |   └── Taxonomy.php
|   |   |
|   |   ├── Utilities/
|   |   |   ├── Notices/
|   |   |   |  ├── MetaBoxTypeNotice.php
|   |   |   |  └── PathNotice.php
|   |   |   |
|   |   |   ├── Tables/
|   |   |   |   ├── RobotsDataManager.php
|   |   |   |   └── RobotsTable.php
|   |   |   |
|   |   |   ├── AdminEnqueueScripts.php
|   |   |   ├── MetaBoxGenerator.php
|   |   |   ├── PostTypeGenerator.php
|   |   |   └── TaxonomyGenerator.php
|   |   |
|   |   ├── views/
|   |   |   ├── ai-robots-table/
|   |   |   |   ├── 404.view.php
|   |   |   |   ├── add-robot.view.php
|   |   |   |   ├── main.view.php
|   |   |   |   └── single.view.php
|   |   |   |
|   |   |   ├── meta-boxes/
|   |   |   |   ├── 404.view.php
|   |   |   |   ├── checkbox.view.php
|   |   |   |   ├── email.view.php
|   |   |   |   ├── float.view.php
|   |   |   |   ├── image.view.php
|   |   |   |   ├── int.view.php
|   |   |   |   ├── radio.view.php
|   |   |   |   ├── select.view.php
|   |   |   |   ├── text.view.php
|   |   |   |   ├── textarea.view.php
|   |   |   |   └── url.view.php
|   |   |   |
|   |   |   ├── hidden-menu.view.php
|   |   |   ├── main.view.php
|   |   |   ├── settings-menu.view.php
|   |   |   └── sub-menu.view.php
|   |   |
|   |   ├── AdminSoul.php
|   │   ├── Router.php
|   |   └── routes.php
|   |
|   ├── Features/
|   |   ├── API/
|   |   |   ├── AbstractClasses/
|   |   |   |   └── AbstractRestRouteHandler.php
|   |   |   |   
|   |   |   ├── Interfaces/
|   |   |   |   └── RestRouteHandlerInterface.php
|   |   |   |   
|   |   |   ├── Routes/
|   |   |   |   ├── DeletePostMetaImageRoute.php
|   |   |   |   ├── GetPostMetaImageRoute.php
|   |   |   |   └── UpdatePostMetaImageRoute.php
|   |   |   |   
|   |   |   └── init.php
|   |   |
|   |   ├── Gutenberg/
|   |   |   ├── components/
|   |   |   |   └── server-side-rendering.php
|   |   |   |   
|   |   |   └── CustomBlocks.php
|   |   |  
|   |   └── FeaturesSoul.php
|   |
|   ├── Frontend/
|   |   ├── components/
|   |   |   └── shortcode-body.php
|   |   |
|   |   ├── Utilities/
|   |   |   ├── ShortCodeGenerator.php
|   |   |   └── WPEnqueueScripts.php
|   |   |
|   |   └── FrontendSoul.php
|   |
|   ├── Shared/
|   |   └── functions.php
│   |
│   ├── Activator.php
│   ├── Deactivator.php
│   ├── Uninstall.php
│   └── WppGenerator.php
│   
├── languages/
│   ├── uk_UA.mo
│   └── uk_UA.po
|
├── screenshots/
│   ├── banner-772x250.jpg
|   ├── banner-1544x500.jpg
|   ├── icon-128x128.jpg
|   ├── icon-256x256.jpg
|   ├── screenshot-1.jpg
|   └── screenshot-2.jpg
│
├── src/
|   ├── admin/
|   |   └── ...
|   ├── frontend/
|   |   └── ...
|   └── gutenberg/
|       └── ...
│
├── vendor/
│   └── autoload.php
|
├── composer.json
├── example.gitignore
├── index.php
├── install.php
├── license.txt
├── package.json
├── README.md
├── readme.txt
├── uninstall.php
├── my-plugin.php
└── webpack.custom.config.js
```