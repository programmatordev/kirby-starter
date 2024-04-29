<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Cms\File $cover */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <div>
    <?= $page->text()->kirbytext() ?>
  </div>
<?php endslot(); ?>
