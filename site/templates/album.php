<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Cms\Collection $gallery */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <article>
    <?php snippet('intro') ?>

    <div class="grid grid-cols-1 gap-12 md:grid-cols-12">
      <div class="mb-12 md:col-span-4">
        <div class="prose text-black leading-6">
          <?= $page->text() ?>
        </div>
      </div>

      <div class="mb-12 md:col-span-8">
        <ul class="leading-0 columns-1 gap-6 md:columns-2">
          <?php foreach ($gallery as $image): ?>
            <li class="block mb-6 break-inside-avoid">
              <a href="<?= $image->url() ?>">
                <figure
                  class="aspect-[--aspect-ratio]"
                  style="--aspect-ratio:<?= $image->width() ?>/<?= $image->height() ?>"
                >
                  <img src="<?= $image->resize(800)->url() ?>" alt="<?= $image->alt()->esc() ?>">
                </figure>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
  </article>
<?php endslot() ?>