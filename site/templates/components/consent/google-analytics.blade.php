@props(['trackers'])

@php
  use Kirby\Data\Json;

  $googleAnalyticsId = $trackers['googleAnalyticsId'];
  $googleAdsId = $trackers['googleAdsId'];
  $googleTagId = $googleAnalyticsId ?? $googleAdsId;
@endphp

@if ($googleTagId !== null)
  <script type="text/plain" data-category="necessary">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    gtag('consent', 'default', {
        analytics_storage: 'denied',
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        functionality_storage: 'denied',
        personalization_storage: 'denied',
        security_storage: 'granted',
        wait_for_update: 500
    });

    gtag('set', 'ads_data_redaction', true);
    gtag('js', new Date());

    @if ($googleAnalyticsId !== null)
      gtag('config', {!! Json::encode($googleAnalyticsId) !!});
    @endif

    @if ($googleAdsId !== null)
      gtag('config', {!! Json::encode($googleAdsId) !!});
    @endif
  </script>

  <script async data-category="necessary" data-src="https://www.googletagmanager.com/gtag/js?id={{ $googleTagId }}"></script>

  @if ($googleAnalyticsId !== null)
    <script type="text/plain" data-category="analytics">
      gtag('consent', 'update', {
          analytics_storage: 'granted'
      });
    </script>
  @endif

  @if ($googleAnalyticsId !== null || $googleAdsId !== null)
    <script type="text/plain" data-category="advertisement">
      gtag('consent', 'update', {
          ad_storage: 'granted',
          ad_user_data: 'granted',
          ad_personalization: 'granted'
      });
    </script>
  @endif

  @if ($googleAnalyticsId !== null)
    <script type="text/plain" data-category="functionality">
      gtag('consent', 'update', {
          functionality_storage: 'granted',
          personalization_storage: 'granted'
      });
    </script>
  @endif
@endif
