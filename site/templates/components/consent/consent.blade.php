@php
  use Kirby\Data\Json;

  /** @var \Kirby\Cms\Site $site */

  $trackers = $site->trackers();
@endphp

<script>
  window.trackers = <?= Json::encode($trackers) ?>;
</script>

<x-consent.google-tag :trackers="$trackers" />
<x-consent.meta-pixel :trackers="$trackers" />
