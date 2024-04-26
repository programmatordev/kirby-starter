<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Template\Slots $slots */
?>

<!DOCTYPE html>
<html class="font-sans text-black bg-white" lang="<?= $kirby->language()->code() ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= snippet('seo/head'); ?>

    <?= vite()->css('assets/css/app.css') ?>
    <?= $slots->styles() ?>

    <?= vite()->js('assets/js/app.js', ['defer' => true]) ?>
    <?= $slots->scripts() ?>
  </head>

  <body class="p-6 max-w-6xl m-auto lg:p-12">
    <header class="relative flex flex-wrap justify-between -mx-4 mb-24">
      <a class="p-4 font-semibold" href="<?= $site->url() ?>">
        <?= $site->title()->esc() ?>
      </a>

      <nav class="flex flex-wrap">
        <?php foreach ($site->children()->listed() as $item): ?>
          <a class="block p-4 aria-[current]:underline" <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>">
            <?= $item->title()->esc() ?>
          </a>
        <?php endforeach ?>

        <span class="flex items-center px-2">
          <a class="py-4 px-2" href="https://mastodon.social/@getkirby" aria-label="Follow us on Mastodon">
            <?= svg('assets/images/mastodon.svg') ?>
          </a>
          <a class="py-4 px-2" href="https://instagram.com/getkirby" aria-label="Follow us on Instagram">
            <?= svg('assets/images/instagram.svg') ?>
          </a>
          <a class="py-4 px-2" href="https://youtube.com/kirbycasts" aria-label="Watch our videos on YouTube">
            <?= svg('assets/images/youtube.svg') ?>
          </a>
          <a class="py-4 px-2" href="https://chat.getkirby.com" aria-label="Chat with us on Discord">
            <?= svg('assets/images/discord.svg') ?>
          </a>
        </span>
      </nav>
    </header>

    <main>
      <?= $slots->content() ?>
    </main>

    <footer class="pt-36 pb-24 leading-6 before:content-[''] before:block before:w-6 before:h-0.5 before:bg-black before:mb-6">
      <div class="grid gap-12 grid-cols-1 md:grid-cols-12">
        <div class="mb-12 md:col-span-8">
          <h2 class="font-semibold mb-3"><a href="https://getkirby.com">Made with Kirby</a></h2>
          <p class="text-neutral-500 max-w-60">Kirby: the file-based CMS that adapts to any project, loved by developers and editors alike</p>
        </div>

        <div class="mb-12 md:col-span-2">
          <h2 class="font-semibold mb-3">Pages</h2>
          <ul class="text-neutral-500">
            <?php foreach ($site->children()->listed() as $item): ?>
              <li><a class="hover:text-black" href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>

        <div class="mb-12 md:col-span-2">
          <h2 class="font-semibold mb-3">Kirby</h2>
          <ul class="text-neutral-500">
            <li><a href="https://getkirby.com" class="hover:text-black">Website</a></li>
            <li><a href="https://getkirby.com/docs" class="hover:text-black">Docs</a></li>
            <li><a href="https://forum.getkirby.com" class="hover:text-black">Forum</a></li>
            <li><a href="https://chat.getkirby.com" class="hover:text-black">Chat</a></li>
            <li><a href="https://github.com/getkirby" class="hover:text-black">GitHub</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <?= snippet('seo/schemas') ?>
    <?= snippet('debugbar') ?>
  </body>
</html>