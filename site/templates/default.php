<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Cms\File $cover */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <h1 class="font-bold"><?= $page->title() ?></h1>
  <div><?= $page->text()->kirbytext() ?></div>
<?php endslot(); ?>
