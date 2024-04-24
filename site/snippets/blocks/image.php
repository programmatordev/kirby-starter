<?php
/** @var \Kirby\Cms\Block $block */
$alt = $block->alt();
$caption = $block->caption();
$crop = $block->crop()->isTrue();
$link = $block->link();
$ratio = $block->ratio()->or('auto');
$src = null;

if ($block->location() == 'web') {
  $src = $block->src()->esc();
}
elseif ($image = $block->image()->toFile()) {
  $alt = $alt->or($image->alt());
  $src = $image->url();
}
?>

<?php if ($src): ?>
  <figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
    <?php if ($link->isNotEmpty()): ?>
      <a href="<?= Str::esc($link->toUrl()) ?>">
        <img
          class="w-full aspect-[--aspect-ratio] <?= $crop ? 'object-cover' : 'object-contain' ?>"
          style="--aspect-ratio: <?= $ratio ?? 'auto' ?>;"
          src="<?= $src ?>"
          alt="<?= $alt->esc() ?>"
        >
      </a>
    <?php else: ?>
      <img
        class="w-full aspect-[--aspect-ratio] <?= $crop ? 'object-cover' : 'object-contain' ?>"
        style="--aspect-ratio: <?= $ratio ?? 'auto' ?>;"
        src="<?= $src ?>"
        alt="<?= $alt->esc() ?>"
      >
    <?php endif ?>

    <?php if ($caption->isNotEmpty()): ?>
      <figcaption>
        <?= $caption ?>
      </figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>

