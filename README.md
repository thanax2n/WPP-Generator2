### Plugin Structure
```bash
my-plugin/
│
├── assets/
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
|           ├── dev.js
|           └── prod.js
│
├── includes/
|   ├── Admin/
|   |   ├── assets/
|   |   |   ├── css/
|   |   |   |   └── styles.css
|   |   |   └── js/
|   |   |       └── scripts.js
|   |   |
|   |   ├── controllers/
|   |   |   ├── hidden-menu.php
|   |   |   ├── main.php
|   |   |   ├── settings-menu.php
|   |   |   └── sub-menu.php
|   |   |
|   |   ├── Utilities/
|   |   |   ├── AdminMenu.php
|   |   |   ├── AdminNotices.php
|   |   |   ├── CTPGenerator.php
|   |   |   └── AdminEnqueueScripts.php
|   |   |
|   |   ├── views/
|   |   |   ├── hidden-menu.view.php
|   |   |   ├── main.view.php
|   |   |   ├── settings-menu.view.php
|   |   |   └── sub-menu.view.php
|   |   |
|   |   ├── AdminSoul.php
|   │   ├── Router.php
|   |   └── routes.php
|   |
|   ├── Core/
|   |   ├── exceptions/
|   |   |   └── PathException.php
|   |   |   
|   |   └── functions.php
|   |
|   ├── Features/
|   |   ├── API/
|   |   |   └── endpoint1.php
|   |   |
|   |   └── Gutenberg/
|   |      └──
|   |
|   ├── Frontend/
|   |   ├── built/
|   |   |   ├── index.js
|   |   |   └── index.css
|   |   |
|   |   ├── components/
|   |   |   └── contact-form.php
|   |   |
|   |   ├── src/
|   |   |   ├── main.js
|   |   |   |
|   |   |   ├── assets/
|   |   |   |   ├── components/
|   |   |   |   |   └── ...
|   |   |   |   |
|   |   |   |   └── scss/
|   |   |   |       └── style.scss
|   |   |   |
|   |   |   └── main.js
|   |   |
|   |   ├── Utilities/
|   |   |   └── EnqueueScripts.php
|   |   |
|   |   └── FrontendSoul.php
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
├── composer.json
├── example.gitignore
├── index.php
├── install.php
├── license.txt
├── package.json
├── readme.txt
├── uninstall.php
├── vite.config.js
├── my-plugin.php
└── README.md
```