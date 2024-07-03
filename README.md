### Plugin Structure
```bash
my-plugin/
│
├── assets/
|   ├── images/
|   |   └── example.png
|   |
|   ├── admin/
|   |   ├──  css/
|   |   |   └── styles.css
|   |   └── js/
|   |       └── scripts.js
|   |
|   ├── frontend/
|   |   ├──  css/
|   |   |   └── styles.css
|   |   └── js/
|   |       └── scripts.js
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
├── includes/
|   ├── Activate/
|   |   ├── seeder/
|   |   |   └── ai-robots.php
|   |   |   
|   |   ├── CreateDataTable.php
|   |   └── CreateDataTables.php
|   |
|   ├── Admin/
|   |   ├── controllers/
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
|   |   |   ├── AdminEnqueueScripts.php
|   |   |   ├── MetaBoxGenerator.php
|   |   |   ├── PostTypeGenerator.php
|   |   |   └── TaxonomyGenerator.php
|   |   |
|   |   ├── views/
|   |   |   ├── meta-boxes/
|   |   |   |   ├── 404.view.php
|   |   |   |   ├── checkbox.view.php
|   |   |   |   ├── email.view.php
|   |   |   |   ├── float.view.php
|   |   |   |   ├── image.view.php
|   |   |   |   ├── int.view.php
|   |   |   |   ├── radio.view.php
|   |   |   |   ├── select.view.php
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
|   |   |   └── endpoint1.php
|   |   |
|   |   └── Gutenberg/
|   |      └── ...
|   |
|   ├── Frontend/
|   |   ├── components/
|   |   |   └── short-code.php
|   |   |
|   |   ├── Utilities/
|   |   |   └── WPEnqueueScripts.php
|   |   |
|   |   └── FrontendSoul.php
|   |
|   ├── Shared/
|   |   ├── EnqueueScripts.php
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
│
├── vendor/
│   └── autoload.php
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
|   └── frontend/
|       └── ...
|
├── composer.json
├── example.gitignore
├── index.php
├── install.php
├── license.txt
├── package.json
├── readme.txt
├── uninstall.php
├── vite.config.js ?
├── my-plugin.php
└── README.md
```