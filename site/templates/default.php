<?php
/** @var \Kirby\Cms\Page $page */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>

<div data-taxi-view>
  <h1 class="font-bold"><?= $page->title() ?></h1>
  <div class="[&_a]:underline"><?= $page->text()->kirbytext() ?></div>
</div>

<?php endslot(); ?>
