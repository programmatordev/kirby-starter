<?php
/** @var \Kirby\Content\Field $field */
/** @var \Kirby\Cms\Layout[] $layout */
?>

<?php foreach ($field->toLayouts() as $layout): ?>
  <section class="grid grid-cols-1 gap-6 mb-16 md:grid-cols-12" id="<?= esc($layout->id(), 'attr') ?>">
    <?php foreach ($layout->columns() as $column): ?>
      <div class="mb-6 col-[--columns]" style="--columns: span <?= esc($column->span(), 'css') ?>">
        <div class="wysiwyg">
          <?= $column->blocks() ?>
        </div>
      </div>
    <?php endforeach ?>
  </section>
<?php endforeach ?>