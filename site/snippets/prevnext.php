<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<nav>
  <h2 class="text-xl font-semibold mb-5">Keep on reading</h2>

  <div class="grid gap-6 grid-cols-[repeat(auto-fit,_minmax(10rem,_1fr))] grid-flow-dense">
    <?php if ($prev = $page->prevListed()): ?>
      <?php snippet('note', ['note' => $prev, 'excerpt' => false])  ?>
    <?php endif ?>

    <?php if ($next = $page->nextListed()): ?>
      <?php snippet('note', ['note' => $next, 'excerpt' => false])  ?>
    <?php endif ?>
  </div>
</nav>
