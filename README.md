# blogApp

Simple blog application written in PHP.

## Some of the features

- Full user authentication using OOP & PDO
- Access control for posts
- Server side validation
- Posts CRUD
- Helper functions (flash messages and redirects)
- [UIkit][uikit] framework

[uikit]: https://getuikit.com

## Instructions

In `app/` directory create `conifg` folder with `config.php` file so you can load your own DB params

```PHP
// DB PARAMS
define('DB_HOST', 'YOUR_HOST');
define('DB_USER', 'YOUR_USER');
define('DB_PASSWORD', 'YOUR_PASSWORD');
define('DB_NAME', 'YOUR_DB_NAME');

// APP ROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URL ROOT
define('URLROOT', 'YOUR_URL');
// SITENAME
define('SITENAME', 'YOUR_APP_NAME');
```
