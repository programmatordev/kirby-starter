# Kirby Starter

A very (very!) opinionated [Kirby CMS](https://getkirby.com/) development stack.

> [!IMPORTANT]
> This project is intended for internal use.
> This means that the development approach will always be in virtue of how we work with our clients or our own projects, and you may disagree with them.
> Still, we are open for discussion, so feel free to ask for any features or changes.
> We just want to be clear in advance.

## Features

- Uses [DDEV](https://ddev.com/), a Docker-based development environment;
- [Vite](https://vitejs.dev/) with [kirby-vite](https://github.com/arnoson/kirby-vite) plugin;
- [TailwindCSS](https://tailwindcss.com/);
- SEO management with [kirby-seo](https://github.com/tobimori/kirby-seo) plugin;
- Environment variables with [kirby-env](https://github.com/beebmx/kirby-env) plugin;
- Auto-generated type hints with [kirby-types](https://github.com/lukaskleinschmidt/kirby-types) plugin.
- and more...

## Documentation

- [Get Started](#get-started)
- [Development](#development)
  - [Kirby CLI](#kirby-cli)
  - [Template System](#template-system)
  - [Assets](#assets)
  - [CSS and JS Assets Handling](#css-and-js-assets-handling)
  - [Static Assets Handling](#static-assets-handling)
- [Production](#production)
- [Libraries](#libraries)
- [User Roles](#user-roles)
- [Cookie Consent Notification (GDPR & CCPA compliance)](#cookie-consent-notification)
- [Acknowledgments](#acknowledgments)

## Get Started

Before starting, make sure you have [DDEV](https://ddev.com/get-started/) installed. If not, follow their instructions [here](https://ddev.com/get-started/).

`STEP 1`

Download this project to a directory of your choosing.

`STEP 2` 

On your terminal, go to your project directory and run the following commands:

```bash
ddev start # initialize Docker and all required containers
```

```bash
ddev composer install # install PHP dependencies
```

```bash
ddev npm install # install Node.js dependencies
```

`STEP 3` 

Include a `.env` file in your project root.
A `.env.example` file already exists, so you can either rename it or create a new one.

`STEP 4` 

To launch the project in the browser, run the following command:

```bash
ddev launch
```

## Development

This project uses [Vite](https://vitejs.dev/) and [TailwindCSS](https://tailwindcss.com/) for frontend development.

Make sure to run the following command when in development mode:

```bash
ddev npm run dev
```

### Kirby CLI

The [Kirby CLI](https://github.com/getkirby/cli) is available to help with development. Make sure to run the following command for all available options:

```bash
ddev kirby
```

### Template System

Kirby is used as the template engine. Check the [documentation](https://getkirby.com/docs/guide).

Some recommended pages:

- [Rendering and logic](https://getkirby.com/docs/guide/templates/basics)
- [Template helpers](https://getkirby.com/docs/reference/templates/helpers)
- [Template field methods](https://getkirby.com/docs/reference/templates/field-methods)
- [Toolkit](https://getkirby.com/docs/reference/objects#toolkit)

### Assets

All assets files should be included in the `assets` folder in the root directory:

- `assets/css` for CSS files
- `assets/js` for JS files
- `assets/images` for images
- `assets/fonts` for fonts

### CSS and JS Assets Handling

By default, a global `app.css` and `app.js` are included across the site.

- The `app.css` file should be used for TailwindCSS;
- The `app.js` file should be used for JavaScript code across all pages of the site.

To include other global CSS and JS files, use the following code in the `<head>` of your layout:

```php
<?= vite().css('path/to/file.css') ?>
```

For JS files, always include `defer` for optimal performance:

```php
<?= vite().js('path/to/file.js', ['defer' => true]) ?>
```

To include CSS and JS files in a specific page, use the existing `slots` for that purpose:

```php
<?php slot('styles') ?>
    <?= vite().css('path/to/file.css') ?>
<?php endslot() ?>

<?php slot('scripts') ?>
    <?= vite().js('path/to/file.js', ['defer' => true]) ?>
<?php endslot() ?>

<?php slot('content') ?>
    <!-- HTML page content... -->
<?php endslot() ?>
```

More information about [slots](https://getkirby.com/docs/guide/templates/snippets#passing-slots-to-snippets).

### Static Assets Handling

To add static assets to a page (images, fonts, etc.) use the following code:

```php
<?= vite().file('path/to/file.svg') ?>
```

Examples:

```html
<img src="<?= vite().file('path/to/file.svg') ?>" alt="Image">
```

```html
<link rel="preload" href="<?= vite()->file('path/to/font.woff2') ?>" as="font" type="font/woff2" crossorigin>
```

For images in CSS, always enter the path of the image relative to the CSS file.

Using Tailwind, considering that CSS files are in `assets/css` and images are in `assets/images`, an example would be:

```html
<div class="aspect-square bg-[url('../images/file.jpg')]"></div>
```

## Production

Before deploying the site to production, or to check the production version locally, make sure to run the following command:

```bash
ddev npm run build
```

When deploying, set the `APP_DEBUG` environment variable to `false`:

```dotenv
# .env

APP_DEBUG=false
```

## Libraries

- Page transitions and preloading with [taxi.js](https://taxi.js.org/);
- Helper to write better responsive design with less code using [Fluid](https://fluid.tw/).

## User Roles

By default, these three user roles are available:

- `admin` all permissions (exclusive for developers);
- `owner` same as the `admin` role, but with **no access** to the `system` and `languages` panels;
- `editor` same as the `owner` role, but with **no access** to the `users` panel.

Since the `admin` role is intended for developers only, it will be invisible to all other roles.
This is, the users with this role will not appear in the `users` panel and searches, or be accessible.

To disable this behavior, set the `hideAdminUsers` to `false`:

```php
// config.php

return [
    'programmatordev.users-extended' => [
        'hideAdminUsers' => false
    ]
];
```

If you want to change these permissions, edit the files at `site/blueprints/users` to your needs.

## Cookie Consent Notification

By default, and for GDPR and CCPA compliance reasons, a cookie consent notification is enabled.
A list of integrations is available, so check the [Integrations](#integrations) section below.

The consent notification comes with 5 categories: 
- `necessary`
- `measurement`
- `marketing`
- `functionality`
- `experience`

All categories are disabled by default, except the `necessary` category which is always enabled.

If an integration is used, the categories related to that integration will be enabled.
For example, if Google Analytics is integrated, the `measurement` and `marketing` categories will be enabled and synced according to user preferences.

If you do not need a cookie consent notification, just remove the following snippet from the master layout:

```php
// snippets/layout.php

// remove this line from the <head> block
<?= snippet('consent/notification') ?>
```

For the full cookie consent options, visit the [plugin](https://github.com/zephir/kirby-cookieconsent?tab=readme-ov-file#3-options) page.

### Integrations

List of currently available integrations:

- [Google Analytics](#google-analytics)

#### Google Analytics

If you want to add Google Analytics to your website and be compliant with GDPR and CCPA regulations,
just set the `CONSENT_GOOGLE_TRACKING_ID` in the `.env` file.

```dotenv
# set Google tracking id (G-XXXXXXXXXX/AW-XXXXXXXXXX) to sync cookie consent with analytics and ads
CONSENT_GOOGLE_TRACKING_ID=G-XXXXXXXXXX
```

Syncs with the `mesaurement` and `marketing` consent notification categories.

## Acknowledgments

Thank you to all plugin's authors and contributors. Make sure to check and support them if you can:

- [kirby-cookieconsent](https://github.com/zephir/kirby-cookieconsent)
- [kirby-env](https://github.com/beebmx/kirby-env)
- [kirby-language-selector](https://github.com/junohamburg/kirby-language-selector)
- [kirby-seo](https://github.com/tobimori/kirby-seo)
- [kirby-types](https://github.com/lukaskleinschmidt/kirby-types)
- [kirby-vite](https://github.com/arnoson/kirby-vite)
