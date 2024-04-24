<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\Page $page */
?>

<?php snippet('layout', slots: true) ?>

<?php slot('content') ?>
  <?php snippet('intro') ?>
  <?php snippet('layouts', ['field' => $page->layout()])  ?>

  <aside class="p-12 border-2 border-black">
    <h2 class="text-4xl mb-6">Get in contact</h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
      <section class="wysiwyg mb-6 col-span-4">
        <h3>Address</h3>
        <?= $page->address() ?>
      </section>

      <section class="wysiwyg mb-6 col-span-4">
        <h3>Email</h3>
        <p><?= Html::email($page->email()) ?></p>
        <h3>Phone</h3>
        <p><?= Html::tel($page->phone()) ?></p>
      </section>

      <section class="wysiwyg mb-6 col-span-4">
        <h3>On the web</h3>
        <ul>
          <?php foreach ($page->social()->toStructure() as $social): ?>
            <li><?= Html::a($social->url(), $social->platform()) ?></li>
          <?php endforeach ?>
        </ul>
      </section>
    </div>
  </aside>
<?php endslot() ?>