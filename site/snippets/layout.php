<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Template\Slots $slots */
?>

<!DOCTYPE html>
<html lang="<?= $site->lang() ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= snippet('seo/head') ?>

    <?= $slots->styles() ?>

    <?= vite()->css('assets/css/app.css') ?>

    <?= $slots->scripts() ?>

    <?= vite()->js('assets/js/app.js', ['defer' => true]) ?>

    <?= snippet('consent/notification') ?>
  </head>

  <body class="p-8 bg-teal-500 md:p-24">
    <h1 class="text-6xl mb-6 font-mono md:text-7xl"><?= $site->title() ?></h1>

    <nav class="mb-6">
      <ul class="flex gap-2">
        <?php foreach ($site->pages()->listed() as $item): ?>
          <li><a class="underline" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <main data-taxi>
      <div data-taxi-view>
        <?= $slots->content() ?>
      </div>
    </main>

    <?= snippet('seo/schemas') ?>
    <?= snippet('debugbar') ?>
  </body>
</html>