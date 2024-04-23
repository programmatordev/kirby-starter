<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <?= snippet('intro') ?>

  <ul class="grid grid-cols-1 grid-flow-dense gap-6 leading-none md:grid-cols-3">
    <?php foreach (page('photography')->children()->listed() as $album): ?>
      <li
        class="
          relative overflow-hidden bg-black leading-none
          md:row-span-1 md:col-span-1
          md:first:row-span-2 md:first:col-span-2
          md:[&:nth-child(5)]:col-span-2
          md:[&:nth-child(6)]:row-span-2
          md:[&:nth-child(7)]:col-span-2
        "
      >
        <a href="<?= $album->url() ?>" class="block h-40 md:pb-[56.25%]">
          <figure>
            <?php /** @var \Kirby\Cms\File $cover */ ?>
            <?php if ($cover = $album->cover()->toFile()): ?>
              <img
                src="<?= $cover->resize(1024, 1024)->url() ?>"
                alt="<?= $cover->alt()->esc() ?>"
                class="absolute inset-0 w-full h-full object-cover transition-all duration-300"
              >
            <?php endif ?>

            <figcaption class="flex items-center justify-center absolute text-white inset-0 bg-black/50">
                <?= $album->title()->esc() ?>
            </figcaption>
          </figure>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
<?php endslot() ?>