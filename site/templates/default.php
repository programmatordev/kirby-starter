<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <h1 class="font-bold ~text-base/xl"><?= $page->title() ?></h1>
  <div class="~text-base/xl"><?= $page->text()->kirbytext() ?></div>
<?php endslot(); ?>
