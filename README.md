# Kirby Starter

A very (very!) opinionated [Kirby CMS](https://getkirby.com/) development stack.

> [!IMPORTANT]
> This project is intended for internal use.
> This means that the development approach will always be in virtue of how we work with our clients or our own projects, and you may disagree with them.
> Still, we are open for discussion, so feel free to ask for any features or changes.
> We just want to be transparent in advance.

## Features

- Uses [DDEV](https://ddev.com/), a Docker-based development environment;
- [Vite](https://vitejs.dev/) with [kirby-vite](https://github.com/arnoson/kirby-vite) plugin;
- [TailwindCSS](https://tailwindcss.com/);
- Live reloading for `templates`, `snippets`, `content` and `assets` changes;
- SEO management with [kirby-seo](https://github.com/tobimori/kirby-seo) plugin;
- Environment variables with [kirby-env](https://github.com/beebmx/kirby-env) plugin;
- Development tools:
  - Debug bar with [kirby-debugbar](https://github.com/Treast/kirby-debugbar) plugin;
  - Auto-generated type hints with [kirby-types](https://github.com/lukaskleinschmidt/kirby-types) plugin.
- and more...

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

When deploying, set the `KIRBY_DEBUG` environment variable to `false`:

```dotenv
# .env

KIRBY_DEBUG=false
```

## Opinionated

### User Roles

By default, these three user roles are available:

- `admin` exclusive for developers;
- `owner` for the client, with all permissions;
- `editor` same as the `owner`, but with **no access** to the users panel.

Since the `admin` role is intended for the developers only, it will be invisible to users with the `owner` and `editor` roles.
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

Also, both the `owner` and `editor` roles have no access to the `system` and `languages` panels.
If you want to change these permissions, edit the files at `site/blueprints/users` to your needs.

### SEO Robots

All SEO robots information is hidden by default and only visible to `admin` users.
This is due to the leading to confusion to clients that do not understand what it does.

If you want to change this behavior, just change the following code to your needs:

```php
// config.php

return [
    'ready' => function(Kirby $kirby) {
        $user = $kirby->user();
    
        return [
            // show robots settings to admins only
            'tobimori.seo.robots.pageSettings' => $user?->isAdmin() ?? false,
            'tobimori.seo.robots.indicator' => $user?->isAdmin() ?? false
        ];
    }
];
```

More information at the [official documentation](https://plugins.andkindness.com/seo/docs/usage/robots) page.

### Languages

The `languages` panel is active by default.
Make sure to always have at least one language created, otherwise it will throw an error.

This is to help populate the HTML with language data, like:

```html
<!DOCTYPE html>
<html lang="<?= $kirby->language()->code() ?>">
  <!-- ... -->
</html>
```

The English language is created by default.

## Acknowledgments

Thank you to all plugin's authors and contributors. Make sure to check and support them if you can:

- [kirby-debugbar](https://github.com/Treast/kirby-debugbar)
- [kirby-env](https://github.com/beebmx/kirby-env)
- [kirby-language-selector](https://github.com/junohamburg/kirby-language-selector)
- [kirby-seo](https://github.com/tobimori/kirby-seo)
- [kirby-types](https://github.com/lukaskleinschmidt/kirby-types)
- [kirby-vite](https://github.com/arnoson/kirby-vite)
