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

  <body class="~p-8/24 ~text-base/xl bg-teal-500">
    <h1 class="font-mono ~text-5xl/7xl"><?= $site->title() ?></h1>

    <nav class="mt-6">
      <ul class="flex gap-2">
        <?php foreach ($site->pages()->listed() as $item): ?>
          <li><a class="underline" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <main class="py-6" data-taxi>
      <div data-taxi-view>
        <?= $slots->content() ?>
      </div>
    </main>

    <div class="[&_a]:underline" x-data="{ count: 0 }">
      <button class="py-1 px-2 bg-black text-teal-500" @click="count++">Click me</button>
      <span x-text="count"></span>

      <template x-if="count > 0">
        <p class="mt-2">Yup, <a href="https://alpinejs.dev/" target="_blank">Alpine.js</a> is here and working.</p>
      </template>

      <template x-if="count >= 10">
        <p>...okay, no need to keep going.</p>
      </template>

      <template x-if="count >= 25">
        <p>You are enjoying this too much...</p>
      </template>

      <template x-if="count >= 50">
        <p>You can stop, you know...</p>
      </template>

      <template x-if="count >= 100">
        <p>You need help.</p>
      </template>
    </div>

    <?= snippet('seo/schemas') ?>
  </body>
</html>