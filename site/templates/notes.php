<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
/** @var ?string $tag */
/** @var ?Collection $notes */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <?php if (empty($tag) === false): ?>
    <header class="text-4xl mb-12">
      <h1>
        <small class="text-4xl text-gray-500">Tag:</small> <?= esc($tag) ?>
        <a href="<?= $page->url() ?>" aria-label="All Notes">&times;</a>
      </h1>
    </header>
  <?php else: ?>
    <?php snippet('intro') ?>
  <?php endif ?>

  <ul class="grid grid-cols-1 gap-12 md:grid-cols-12">
    <?php foreach ($notes as $note): ?>
      <li class="mb-6 md:col-span-4">
        <?php snippet('note', ['note' => $note]) ?>
      </li>
    <?php endforeach ?>
  </ul>

  <?php snippet('pagination', ['pagination' => $notes->pagination()]) ?>
<?php endslot() ?>