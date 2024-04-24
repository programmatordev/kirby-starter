<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Cms\Page $note */
?>

<article class="leading-6">
  <a href="<?= $note->url() ?>">
    <header class="mb-6">
      <figure class="aspect-video mb-2">
        <?php if ($cover = $note->cover()->toFile()): ?>
          <img
            src="<?= $cover->crop(640, 360)->url() ?>"
            alt="<?= $cover->alt()->esc() ?>"
            class="w-full"
          >
        <?php endif ?>
      </figure>

      <h2 class="font-semibold"><?= $note->title()->esc() ?></h2>
      <time class="text-gray-500" datetime="<?= $note->date()->toDate('c') ?>">
        <?= $note->date()->toDate('d M, Y') ?>
      </time>
    </header>

    <?php if (($excerpt ?? true) !== false): ?>
      <div>
        <?= $note->text()->toBlocks()->excerpt(280) ?>
      </div>
    <?php endif ?>
  </a>
</article>
