# Kirby Starter

A very (very!) opinionated [Kirby CMS](https://getkirby.com/) development stack.

> [!IMPORTANT]
> This project is intended for internal use.
> This means that the development approach will always be in virtue of how we work with our clients or our own projects, and you may disagree with them.
> Still, we are open for discussion, so feel free to ask for any features or changes.
> We just want to be clear in advance.

## Features

- 🐳 Uses [DDEV](https://ddev.com/), a Docker-based development environment;
- ⚡️️ [Vite](https://vitejs.dev/) with the [kirby-vite](https://github.com/arnoson/kirby-vite) plugin;
- 🍃 CSS with the [TailwindCSS](https://tailwindcss.com/) framework;
- 🔪 Blade as the templating engine with the [kirby-blade](https://github.com/lukasleitsch/kirby-blade) plugin;
- 🚕 Pages transitions and preloading with [Taxi.js](https://taxi.js.org/);
- ⛰ Reactivity with [Alpine.js](https://alpinejs.dev/);
- 🔎 SEO management with the [kirby-seo](https://github.com/tobimori/kirby-seo) plugin;
- 🌱 Environment variables with the [kirby-env](https://github.com/beebmx/kirby-env) plugin;
- and more...

## Documentation

- [Get Started](#get-started)
- [Development](#development)
  - [Kirby CLI](#kirby-cli)
  - [Templating Engine](#templating-engine)
  - [Assets](#assets)
  - [CSS and JS Assets Handling](#css-and-js-assets-handling)
  - [Static Assets Handling](#static-assets-handling)
- [Production](#production)
- [User Roles](#user-roles)
- [Cookie Consent Notification (GDPR compliance)](#cookie-consent-notification)
- [Acknowledgments](#acknowledgments)

## Get Started

Before starting, make sure you have [DDEV](https://ddev.com/get-started/) installed. 
If not, follow their instructions [here](https://ddev.com/get-started/).

`STEP 1`

Download this project to a directory of your choice.

`STEP 2`

Open the `.ddev/config.yaml` file and update the `name` property to match your project's name. 
This setting determines the domain for your local environment.

For example, if you set `name` to `my-project`, your local domain will be `https://my-project.ddev.site`.

`STEP 3` 

On your terminal, go to your project directory and run the following commands:

```bash
# initialize Docker and all required containers
# the local domain will be given to you at the end of this process (check step 2)
ddev start
```

```bash
# install PHP dependencies
ddev composer install
```

```bash
# install Node.js dependencies
ddev npm install
```

`STEP 4` 

Include a `.env` file in your project root.
A `.env.example` file already exists, so you can either rename it or create a new one.

`STEP 5` 

Run the following command to start development mode:

```bash
ddev npm run dev
```

## Development

This project uses [Vite](https://vitejs.dev/) for frontend development.

Run the following command when in development mode:

```bash
ddev npm run dev
```

### Kirby CLI

The [Kirby CLI](https://github.com/getkirby/cli) is available to help with development. Run the following command for all available options:

```bash
ddev kirby
```

### Templating Engine

Blade is used as the templating engine. 
Check the [plugin documentation](https://github.com/lukasleitsch/kirby-blade) and the [official documentation](https://laravel.com/docs/blade) for more information.

### Assets

All assets should be included in the `assets` folder in the root directory:

- `assets/styles` for CSS files
- `assets/scripts` for JS files
- `assets/images` for images
- `assets/fonts` for fonts

### CSS and JS Assets Handling

By default, a global `app.css` and `app.js` are included across the site.

- The `app.css` file should be used for TailwindCSS;
- The `app.js` file should be used for JavaScript code across all pages of the site.

To include other global CSS and JS files, use the following code in the `<head>` of your layout:

```bladehtml
{!! vite().css('path/to/file.css') !!}
```

For JS files, always include `defer` for better performance:

```bladehtml
{!! vite().js('path/to/file.js', ['defer' => true]) !!}
```

### Static Assets Handling

To add static assets to a page (images, fonts, etc.), use the following code:

```bladehtml
{{ vite().file('path/to/file.svg') }}
```

Examples:

```bladehtml
<img src="{{ vite().file('path/to/file.svg') }}" alt="Image">
```

```bladehtml
<link rel="preload" href="{{ vite()->file('path/to/font.woff2') }}" as="font" type="font/woff2" crossorigin>
```

For images in CSS, always enter the path of the image relative to the CSS file.

Using Tailwind, considering that CSS files are in `assets/css` and images are in `assets/images`, an example would be:

```html
<div class="aspect-square bg-[url('../images/file.jpg')]"></div>
```

## Production

Before deploying the site to production or to check the production version locally, make sure to run the following command:

```bash
ddev npm run build
```

When deploying, set the `APP_DEBUG` environment variable to `false`:

```dotenv
# .env

APP_DEBUG=false
```

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
    // ...
    'programmatordev.panel-extended.hideAdminUsers' => false
];
```

If you want to change these permissions, edit the files at `site/blueprints/users` to your needs.

## Cookie Consent Notification

The cookie consent notification is enabled by default and is synchronized with the settings on the Trackers panel page.

For example, if you set a `Google Analytics ID`, a Google tag will be added to the website, and the cookie consent notification will adapt to provide users with consent options related to Google Analytics.

Additional integrations will be included in the future as needed.

## Acknowledgments

Thank you to all plugin's authors and contributors. Make sure to check and support them if you can:

- [kirby-blade](https://github.com/lukasleitsch/kirby-blade)
- [kirby-env](https://github.com/beebmx/kirby-env)
- [kirby-favicon](https://github.com/moritzebeling/kirby-favicon)
- [kirby-seo](https://github.com/tobimori/kirby-seo)
- [kirby-vite](https://github.com/arnoson/kirby-vite)
