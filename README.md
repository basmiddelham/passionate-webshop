Starter
===

This is a WordPress theme called `Starter`, based on [Underscores](https://github.com/Automattic/_s). It's meant to be used as a boilerplate for new projects and it implements a minimal set of features I use in most of my projects. Included is Flexbuilder which is a boilerplate pagebuilder made with [ACF Builder](https://github.com/StoutLogic/acf-builder) including some usefull components.

## Features

* Navigation with multilevel dropdown, mobile, keyboard, touchscreen and screenreader support.
* Boilerplate Bootstrap [variables](https://github.com/basmiddelham/starter-3/blob/main/assets/src/sass/base/_variables.scss).
* Most native WordPress features are supported such as Widgets, Galleries, Comments and more.
* User friendly [TinyMCE toolbar](https://github.com/basmiddelham/starter-3/blob/main/inc/tinymce.php) which allows Bootstrap styling.
* Optimised for performance, accessibility and SEO using best practices.
* Based on WordPress' own [Underscores](https://underscores.me/) theme with a modern [Webpack](https://webpack.js.org/) workflow.

Installation
---------------

### Requirements

`Starter` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)


### Setup

To start using all the tools that come with `Starter`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

Set the BrowserSync proxy in `webpack.config.js` on line 30.

Generate a development theme:

```sh
$ yarn prod
```

### Available CLI commands

`Starter` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `yarn prod` : generate a production theme.
- `yarn prod:watch` : generate a production theme with BrowserSync.
- `yarn dev` : generate a development theme.
- `yarn dev:watch` : generate a development theme with BrowserSync.
- `yarn translate` : Translate the theme
