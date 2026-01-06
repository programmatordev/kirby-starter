<?php
use Kirby\Data\Json;

$trackers = site()->trackers();
?>

<script>
  window.trackers = <?= Json::encode($trackers) ?>;
</script>

<?= snippet('consent/google-analytics', compact('trackers')) ?>
