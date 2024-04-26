<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <?php snippet('intro') ?>

  <ul class="grid grid-cols-1 gap-6 md:grid-cols-12">
    <?php foreach ($page->children()->listed() as $album): ?>
      <li class="mb-6 md:col-span-3">
        <a href="<?= $album->url() ?>">
          <figure>
            <span class="relative block bg-black aspect-[4/5]">
              <?php /** @var \Kirby\Cms\File $cover */ ?>
              <?php if ($cover = $album->cover()->toFile()): ?>
                <img
                  class="absolute inset-0 w-full h-full border-0 object-cover"
                  src="<?= $cover->crop(400, 500)->url() ?>"
                  alt="<?= $cover->alt()->esc() ?>"
                >
              <?php endif ?>
            </span>

            <figcaption class="pt-3 leading-6">
              <?= $album->title()->esc() ?>
            </figcaption>
          </figure>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
<?php endslot() ?>