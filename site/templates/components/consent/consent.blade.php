@php
  use Kirby\Data\Json;
  $trackers = site()->trackers();
@endphp

<script>
  window.trackers = <?= Json::encode($trackers) ?>;
</script>

<x-consent.google-analytics :trackers="$trackers" />
<x-consent.meta-pixel :trackers="$trackers" />