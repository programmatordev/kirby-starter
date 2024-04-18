<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Template\Slots $slots */
?>

<!DOCTYPE html>
<html lang="<?= $kirby->language()->code() ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= snippet('seo/head'); ?>

    <?= vite()->css('assets/css/app.css') ?>
    <?= $slots->styles() ?>

    <?= vite()->js('assets/js/app.js', ['defer' => true]) ?>
    <?= $slots->scripts() ?>
  </head>

  <body>
    <main>
      <?= $slots->content() ?>
    </main>

    <?= snippet('seo/schemas') ?>
    <?= snippet('debugbar') ?>
  </body>
</html>