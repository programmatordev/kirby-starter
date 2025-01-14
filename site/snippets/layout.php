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
    <?= snippet('favicon') ?>

    <?= $slots->styles() ?>
    <?= vite()->css('assets/js/app.js') ?>

    <?= $slots->scripts() ?>
    <?= vite()->js('assets/js/app.js', ['defer' => true]) ?>

    <?= snippet('consent/notification') ?>
  </head>

  <body class="~p-8/24 bg-teal-500">
    <h1 class="font-mono ~text-6xl/7xl"><?= $site->title() ?></h1>

    <nav class="mt-6">
      <ul class="flex gap-2">
        <?php foreach ($site->pages()->listed() as $item): ?>
          <li><a class="underline ~text-base/xl" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <main class="mt-6" data-taxi>
      <div data-taxi-view>
        <?= $slots->content() ?>
      </div>
    </main>

    <?= snippet('seo/schemas') ?>
  </body>
</html>