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
- 🚀 Staging and production deployments with [Kirby Deploy](https://github.com/arnoson/kirby-deploy);

## Documentation

- [Get Started](#get-started)
- [Development](#development)
  - [Kirby CLI](#kirby-cli)
    - [Remove Demo](#remove-demo)
  - [Templating Engine](#templating-engine)
  - [Assets](#assets)
  - [CSS and JS Assets Handling](#css-and-js-assets-handling)
  - [Static Assets Handling](#static-assets-handling)
- [User Roles](#user-roles)
- [Cookie Consent Notification](#cookie-consent-notification)
- [Deployment](#deployment)
  - [Configure Targets](#configure-targets)
  - [Deploy](#deploy)
  - [Synchronize Data](#synchronize-data)
  - [Optional Webhooks](#optional-webhooks)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## Get Started

Before starting, install [DDEV](https://ddev.com/get-started/) by following its setup instructions.

**1. Download the project**

Download this project to a directory of your choice.

**2. Start DDEV and install the dependencies**

DDEV automatically uses the project directory name as the project name and local domain. For example, a project in a `my-project` directory will be available at `https://my-project.ddev.site`.

In your terminal, go to the project directory and run:

```bash
ddev start
ddev composer install
ddev npm ci
```

**3. Create the environment file**

Copy the existing `.env.example` file to `.env` in your project root:

```bash
cp .env.example .env
```

**4. Start development**

```bash
ddev npm run dev
```

**5. Remove the demo (optional)**

After confirming that the demo works, remove it to start with unstyled templates while keeping the starter functionality:

```bash
ddev kirby starter:remove-demo
```

See [Remove Demo](#remove-demo) for the available options and safety notes.

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

#### Remove Demo

To preview and remove the bundled demo, run:

```bash
ddev kirby starter:remove-demo --dry-run
ddev kirby starter:remove-demo
```

You can optionally set a new site title during removal:

```bash
ddev kirby starter:remove-demo --title="Website title"
```

Without `--title`, the existing site title is preserved. The removal is permanent and requires confirmation, so commit or back up any demo files you want to keep before running it.

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

Additional CSS and JS can be imported by the existing app entry. To load a file as a separate entry point, add its path or glob pattern to the `globSync()` call in `vite.config.js`, then include it in the `<head>` of your layout:

```php
{!! vite()->css('assets/styles/file.css') !!}
```

For JS files, include `defer` consistently with the default app entry:

```php
{!! vite()->js('assets/scripts/file.js', ['defer' => true]) !!}
```

### Static Assets Handling

Resolve static assets such as images and fonts with `vite()->file()`:

```html
<img src="{{ vite()->file('assets/images/file.svg') }}" alt="Image">
```

```html
<link rel="preload" href="{{ vite()->file('assets/fonts/font.woff2') }}" as="font" type="font/woff2" crossorigin>
```

For images in CSS, always enter the path of the image relative to the CSS file.

## User Roles

By default, these three user roles are available:

- `admin` all permissions (exclusive for developers);
- `owner` same as the `admin` role, but with **no access** to the `system` and `languages` panels;
- `editor` same as the `owner` role, but with **no access** to the `users` panel.

Because the `admin` role is intended for developers only, admin users do not appear in the `users` panel or searches and cannot be accessed by other roles.

To disable this behavior, set the `hideAdminUsers` to `false`:

```php
// config.php

return [
    // ...
    'programmatordev.panel-extended.hideAdminUsers' => false
];
```

To change the role permissions, edit the files in `site/blueprints/users`.

### Accounts Field

Use the `accounts` field to select non-admin users:

```yaml
assignees:
  type: accounts
```

Use Kirby's native `users` field when admin users should also be available.

## Cookie Consent Notification

The cookie consent notification is enabled by default and is synchronized with the settings on the Trackers panel page.

Supported trackers:

- `Google Analytics ID`
- `Google Ads ID`
- `Meta Pixel ID`

For example, if you set a `Google Analytics ID`, a Google tag will be added to the website, and the cookie consent notification will adapt to provide users with consent options related to Google Analytics. The same applies to the other supported tracker IDs.

## Deployment

The project uses [Kirby Deploy](https://github.com/arnoson/kirby-deploy) to deploy through FTP. DDEV includes the required `lftp` dependency.

### Configure Targets

Configure each target you plan to use in your local `.env` file. The available values are documented in `.env.example`:

```dotenv
DEPLOY_STAGING_HOST=ftp://example.com
DEPLOY_STAGING_USER=
DEPLOY_STAGING_PASSWORD=
DEPLOY_STAGING_REMOTE_DIR=./
DEPLOY_STAGING_DRY_RUN=true
DEPLOY_STAGING_VERBOSE=false
DEPLOY_STAGING_FTP_SSL_FORCE=true
```

Use the equivalent `DEPLOY_PRODUCTION_*` variables for production.

`REMOTE_DIR` is relative to the FTP account's starting directory. See the [Kirby Deploy configuration documentation](https://github.com/arnoson/kirby-deploy#config) for all available options.

Deployments exclude the local `.env` file. Create or update the application `.env` manually on each server, and set `APP_DEBUG` to `false` in production:

```dotenv
APP_DEBUG=false
```

### Deploy

Deploy to either environment with:

```bash
ddev npm run deploy:staging
ddev npm run deploy:production
```

Both commands rebuild the production assets and validate PHP syntax before connecting. The generated `build` directory is uploaded automatically. With `DRY_RUN=true`, Kirby Deploy previews the changes and asks for confirmation before applying them. Setting it to `false` skips both the preview and confirmation.

### Synchronize Data

Normal deployments do not synchronize content, accounts, or languages. Use Kirby Deploy's subcommands when these files need to be synchronized:

```bash
# Content
ddev npm run deploy:staging -- content-push
ddev npm run deploy:staging -- content-pull

# Accounts
ddev npm run deploy:staging -- accounts-push
ddev npm run deploy:staging -- accounts-pull

# Languages
ddev npm run deploy:staging -- languages-push
ddev npm run deploy:staging -- languages-pull
```

Replace `deploy:staging` with `deploy:production` to use the production target.

On an initial deployment, deploy the website first. Then use the relevant synchronization commands:

- Run `content-push` to initialize the server with the local content.
- Run `accounts-push` to initialize the server with the local accounts. This provides Panel access without enabling the installer on a public server.
- Run `languages-push` to initialize the server with the local language files, whether the website is single-language or multilingual.

Subsequent deployments normally need only the main deployment command. Use the data synchronization commands only when you explicitly need to push local data to the server or pull remote data into the project.

After synchronizing the initial account, prefer creating production users directly in the production Panel. Use `accounts-push` again only when the local accounts, including `.htpasswd`, should replace the remote accounts.

> [!CAUTION]
> Push commands can overwrite or delete remote files, while pull commands can overwrite or delete local files. Review the dry-run output carefully and consider backing up the relevant data before synchronization.

For a data synchronization command, pass `--force` after the forwarded arguments to transfer all files in that synchronization scope without using timestamp or cache checks:

```bash
ddev npm run deploy:production -- content-push --force
```

### Optional Webhooks

The optional Kirby Deploy webhook plugin enables maintenance mode during deployments and clears Kirby's page cache afterwards. To enable it, install the Composer package:

```bash
ddev composer require arnoson/kirby-deploy
```

Configure the target in your local `.env`:

```dotenv
DEPLOY_STAGING_URL=https://staging.example.com
DEPLOY_STAGING_TOKEN=shared-secret
DEPLOY_STAGING_CALL_WEBHOOKS=true
```

Set the same token on the corresponding remote server:

```dotenv
DEPLOY_TOKEN=shared-secret
```

Webhooks remain disabled when `CALL_WEBHOOKS=false`. See the [Kirby Deploy configuration documentation](https://github.com/arnoson/kirby-deploy#config) for further options.

## License

Original code in this repository is available under the [0BSD License](LICENSE). Third-party dependencies remain subject to their respective licenses.

## Acknowledgments

Thank you to all plugin authors and contributors. Make sure to check and support them if you can:

- [kirby-blade](https://github.com/lukasleitsch/kirby-blade)
- [kirby-deploy](https://github.com/arnoson/kirby-deploy)
- [kirby-env](https://github.com/beebmx/kirby-env)
- [kirby-vite](https://github.com/arnoson/kirby-vite)
