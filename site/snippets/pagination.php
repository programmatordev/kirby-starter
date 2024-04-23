<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var ?\Kirby\Cms\Pagination $pagination */
?>

<?php if ($pagination->hasPages()): ?>
  <nav class="flex pt-24">
    <?php if ($pagination->hasPrevPage()): ?>
      <a
        class="p-2 mr-6 w-12 text-center border-2 border-current hover:bg-black hover:text-white hover:border-black"
        href="<?= $pagination->prevPageUrl() ?>"
      >&larr;</a>
    <?php else: ?>
      <span class="p-2 mr-6 w-12 text-center border-2 border-current text-gray-500">&larr;</span>
    <?php endif ?>

    <?php if ($pagination->hasNextPage()): ?>
      <a
        class="p-2 mr-6 w-12 text-center border-2 border-current hover:bg-black hover:text-white hover:border-black"
        href="<?= $pagination->nextPageUrl() ?>"
      >&rarr;</a>
    <?php else: ?>
      <span class="p-2 mr-6 w-12 text-center border-2 border-current text-gray-500">&rarr;</span>
    <?php endif ?>
  </nav>
<?php endif ?>
