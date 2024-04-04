<?php
/** @var \Kirby\Cms\Page $page */
?>

<?= vite()->css('assets/css/app.css') ?>
<?= vite()->js('assets/js/app.js', ['defer' => true]) ?>

<h1 class="bg-emerald-500"><?= $page->title() ?></h1>
