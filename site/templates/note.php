<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var string[] $tags */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <?php if ($cover = $page->cover()->toFile()): ?>
    <a class="block aspect-[2/1]" href="<?= $cover->url() ?>">
      <img
        class="w-full"
        src="<?= $cover->crop(1200, 600)->url() ?>"
        alt="<?= $cover->alt()->esc() ?>"
      >
    </a>
  <?php endif ?>

  <article class="max-w-xl m-auto">
    <header class="pt-12 mb-12 text-4xl">
      <h1><?= $page->title()->esc() ?></h1>
      <?php if ($page->subheading()->isNotEmpty()): ?>
        <p class="text-gray-500">
          <small class="text-4xl"><?= $page->subheading()->esc() ?></small>
        </p>
      <?php endif ?>
    </header>

    <div class="wysiwyg max-w-xl">
      <?= $page->text()->toBlocks() ?>
    </div>

    <footer class="py-24">
      <?php if (!empty($tags)): ?>
        <ul class="flex mb-6">
          <?php foreach ($tags as $tag): ?>
            <li class="mr-2">
              <a
                class="block py-2 px-4 bg-gray-100 hover:bg-black hover:text-white"
                href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>"
              ><?= esc($tag) ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>

      <time class="text-gray-500" datetime="<?= $page->date()->toDate('c') ?>">
        Published on <?= $page->date()->toDate('d M, Y') ?>
      </time>
    </footer>

    <?php snippet('prevnext') ?>
  </article>
<?php endslot() ?>