# Kirby Starter

A very (very!) opinionated [Kirby CMS](https://getkirby.com/) development stack.

> [!IMPORTANT]
> This project is intended for internal use.
> Its development approach reflects how we work with our clients and on our own projects, so it may not suit every workflow.
> We are still open to discussing features and changes.

## Features

- 🐳 Uses [DDEV](https://ddev.com/), a Docker-based development environment;
- ⚡️️ [Vite](https://vite.dev/) with the [kirby-vite](https://github.com/arnoson/kirby-vite) plugin;
- 🍃 CSS with the [Tailwind CSS](https://tailwindcss.com/) framework;
- 🔪 [Blade](https://laravel.com/docs/blade) as the templating engine with the [kirby-blade](https://github.com/lukasleitsch/kirby-blade) plugin;
- 🚕 Page transitions and preloading with [Taxi.js](https://taxi.js.org/);
- ⛰ Reactivity with [Alpine.js](https://alpinejs.dev/);
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
- [Cookie Consent Notification](#cookie-consent-notification)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## Get Started

Before starting, make sure you have [DDEV](https://ddev.com/get-started/) installed.
If not, follow their instructions [here](https://ddev.com/get-started/).

`STEP 1`

Download this project to a directory of your choice.

DDEV automatically uses the project directory name as the project name and local domain.
For example, a project in a `my-project` directory will be available at `https://my-project.ddev.site`.

`STEP 2`

On your terminal, go to your project directory and run the following commands:

```bash
# initialize Docker and all required containers
# the local domain will be shown when the project starts
ddev start
```

```bash
# install PHP dependencies
ddev composer install
```

```bash
# install Node.js dependencies
ddev npm ci
```

`STEP 3`

Copy the existing `.env.example` file to `.env` in your project root:

```bash
cp .env.example .env
```

`STEP 4`

Run the following command to start development mode:

```bash
ddev npm run dev
```

## Development

This project uses [Vite](https://vite.dev/) for frontend development.

Run the following command when in development mode:

```bash
ddev npm run dev
```

To check the production build and lint project PHP files for syntax errors, run:

```bash
ddev npm run check
```

### Kirby CLI

The [Kirby CLI](https://github.com/getkirby/cli) is available to help with development. Run the following command for all available options:

```bash
ddev kirby
```

### Templating Engine

[Blade](https://laravel.com/docs/blade) is used as the templating engine.
Check the [plugin documentation](https://github.com/lukasleitsch/kirby-blade) and the [official documentation](https://laravel.com/docs/blade) for more information.

### Assets

All assets should be included in the `assets` folder in the root directory:

- `assets/styles` for CSS files
- `assets/scripts` for JS files
- `assets/images` for images
- `assets/fonts` for fonts

### CSS and JS Assets Handling

By default, a global `app.css` and `app.js` are included across the site.

- The `app.css` file should be used for Tailwind CSS;
- The `app.js` file should be used for JavaScript code across all pages of the site.

Additional CSS and JS can be imported by the existing app entry. To load a file as a separate entry point, add it to the `input` array in `vite.config.js`, then include it in the `<head>` of your layout:

```php
{!! vite()->css('assets/styles/file.css') !!}
```

For JS files, include `defer` consistently with the default app entry:

```php
{!! vite()->js('assets/scripts/file.js', ['defer' => true]) !!}
```

### Static Assets Handling

To add static assets to a page (images, fonts, etc.), use the following code:

```php
{{ vite()->file('assets/images/file.svg') }}
```

Examples:

```html
<img src="{{ vite()->file('assets/images/file.svg') }}" alt="Image">
```

```html
<link rel="preload" href="{{ vite()->file('assets/fonts/font.woff2') }}" as="font" type="font/woff2" crossorigin>
```

For images in CSS, always enter the path of the image relative to the CSS file.

## Production

Build the production assets before deploying:

```bash
ddev npm run build
```

The generated `build` directory is not tracked by Git. Include it when uploading a manual deployment, or run `npm ci` and `npm run build` in the deployment environment.

To validate the production build and PHP syntax before deployment, run:

```bash
ddev npm run check
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
In other words, users with this role will not appear in the `users` panel or searches and cannot be accessed by other roles.

To disable this behavior, set the `hideAdminUsers` to `false`:

```php
// config.php

return [
    // ...
    'programmatordev.panel-extended.hideAdminUsers' => false
];
```

### Accounts Field

Use the `accounts` field to select non-admin users:

```yaml
assignees:
  type: accounts
```

Use Kirby's native `users` field when admin users should also be available.

If you want to change these permissions, edit the files at `site/blueprints/users` to your needs.

## Cookie Consent Notification

The cookie consent notification is enabled by default and is synchronized with the settings on the Trackers panel page.

Supported trackers:

- `Google Analytics ID`
- `Google Ads ID`
- `Meta Pixel ID`

For example, if you set a `Google Analytics ID`, a Google tag will be added to the website, and the cookie consent notification will adapt to provide users with consent options related to Google Analytics. The same applies to the other supported tracker IDs.

## License

Original code in this repository is available under the [0BSD License](LICENSE). Third-party dependencies remain subject to their respective licenses.

## Acknowledgments

Thank you to all plugin authors and contributors. Make sure to check and support them if you can:

- [kirby-blade](https://github.com/lukasleitsch/kirby-blade)
- [kirby-env](https://github.com/beebmx/kirby-env)
- [kirby-favicon](https://github.com/moritzebeling/kirby-favicon)
- [kirby-vite](https://github.com/arnoson/kirby-vite)
