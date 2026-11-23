<?php

declare(strict_types=1);

use Kirby\CLI\CLI;
use Kirby\Filesystem\Dir;
use Kirby\Filesystem\F;

return [
    'description' => 'Removes the starter demo and leaves unstyled templates.',
    'args' => [
        'title' => [
            'longPrefix' => 'title',
            'description' => 'The site title to use after removing the demo',
        ],
        'dry-run' => [
            'longPrefix' => 'dry-run',
            'description' => 'List the changes without modifying any files',
            'noValue' => true,
        ],
        'force' => [
            'prefix' => 'f',
            'longPrefix' => 'force',
            'description' => 'Skip the confirmation prompt',
            'noValue' => true,
        ],
    ],
    'command' => static function (CLI $cli): void {
        $kirby = $cli->kirby();
        $projectRoot = $kirby->root('index');
        $examplesPage = $kirby->page('examples');
        $homePage = $kirby->page('home');

        // The demo pages also prevent this destructive command from being run again.
        if ($examplesPage === null || $homePage === null) {
            throw new RuntimeException('The starter demo could not be found. No files were changed.');
        }

        $title = trim((string)($cli->arg('title') ?? ''));

        if ($title !== '') {
            $title = str_replace(["\r\n", "\r", "\n"], ' ', $title);
        }

        $pathsToRemove = [
            'assets/favicon',
            'assets/images/kirby-icon.svg',
            'site/blueprints/pages/consent.yml',
            'site/blueprints/pages/examples.yml',
            'site/blueprints/pages/navigation.yml',
            'site/templates/components/breadcrumbs.blade.php',
            'site/templates/consent.blade.php',
            'site/templates/examples.blade.php',
            'site/templates/navigation.blade.php',
        ];

        $replacementFiles = [
            'site/templates/components/layout.blade.php' => <<<'BLADE'
@php
  /** @var \Kirby\Cms\App $kirby */

  $language = $kirby->languageCode() ?? $kirby->option('app.language');
@endphp

<!DOCTYPE html>
<html lang="{{ $language }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <x-metadata />

    <x-favicon />

    {!! vite()->css('assets/scripts/app.js') !!}
    {!! vite()->js('assets/scripts/app.js', ['defer' => true]) !!}

    <x-consent />
  </head>

  <body>
    <main id="main-content" data-taxi tabindex="-1">
      {{ $slot }}
    </main>
  </body>
</html>
BLADE,
            'site/templates/home.blade.php' => <<<'BLADE'
@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div data-taxi-view>
    <h1>{{ $page->title() }}</h1>

    @if ($page->text()->isNotEmpty())
      <div>{!! $page->text()->kirbytext() !!}</div>
    @endif
  </div>
</x-layout>
BLADE,
            'site/templates/default.blade.php' => <<<'BLADE'
@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div data-taxi-view>
    <h1>{{ $page->title() }}</h1>

    @if ($page->text()->isNotEmpty())
      <div>{!! $page->text()->kirbytext() !!}</div>
    @endif
  </div>
</x-layout>
BLADE,
            'site/templates/error.blade.php' => <<<'BLADE'
@php
  /** @var \Kirby\Cms\Page $page */
  /** @var \Kirby\Cms\Site $site */
@endphp

<x-layout>
  <div data-taxi-view>
    <p>Error 404</p>
    <h1>{{ $page->title() }}</h1>
    <div>{!! $page->text()->kirbytext() !!}</div>
    <a href="{{ $site->url() }}">Return home</a>
  </div>
</x-layout>
BLADE,
        ];

        $cli->bold('Update content:');
        $cli->out('  Delete page: examples');
        $cli->out('  Clear field: home.text');

        if ($title !== '') {
            $cli->out('  Change site title: ' . $title);
        }

        $cli->br();
        $cli->bold('Remove:');
        foreach ($pathsToRemove as $path) {
            $cli->out('  ' . $path);
        }

        $cli->br();
        $cli->bold('Replace with minimal versions:');
        foreach (array_keys($replacementFiles) as $path) {
            $cli->out('  ' . $path);
        }

        if ($cli->arg('dry-run') === true) {
            $cli->success('Dry run complete. No files were changed.');
            return;
        }

        if ($cli->arg('force') !== true) {
            $cli->confirmToContinue('This permanently removes the starter demo. Continue?');
        }

        // Model APIs preserve unrelated fields and handle hooks and UUID caches.
        $kirby->impersonate('kirby');
        $examplesPage->delete(true);
        $homePage->update(['text' => null]);

        if ($title !== '') {
            $kirby->site()->update(['title' => $title]);
        }

        foreach ($pathsToRemove as $path) {
            $target = $projectRoot . '/' . $path;
            $removed = is_dir($target) ? Dir::remove($target) : F::remove($target);

            if ($removed !== true) {
                throw new RuntimeException('Could not remove: ' . $path);
            }
        }

        foreach ($replacementFiles as $path => $content) {
            if (F::write($projectRoot . '/' . $path, $content . "\n") !== true) {
                throw new RuntimeException('Could not replace: ' . $path);
            }
        }

        $cli->success('The starter demo has been removed.');
    },
];
