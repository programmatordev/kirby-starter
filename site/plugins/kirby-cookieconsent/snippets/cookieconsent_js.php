<?php if (option('zephir.cookieconsent.cdn')): ?>
    <?= js('https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v3.0.0/dist/cookieconsent.umd.js', ['defer' => true]) ?>
<?php else: ?>
    <?= js('/media/plugins/zephir/cookieconsent/index.js', ['defer' => true]) ?>
<?php endif; ?>

<?= js((option('languages') ? kirby()->language()->path() : '') . '/cookieconsent.js', ['defer' => true]) ?>