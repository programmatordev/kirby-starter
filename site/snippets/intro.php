<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<header class="text-4xl mb-12">
  <h1><?= $page->headline()->or($page->title())->esc() ?></h1>
  <?php if ($page->subheadline()->isNotEmpty()): ?>
    <p class="text-neutral-500"><?= $page->subheadline()->esc() ?></p>
  <?php endif ?>
</header>