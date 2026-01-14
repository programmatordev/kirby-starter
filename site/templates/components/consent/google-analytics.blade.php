@props(['trackers'])

@php
  $googleAnalyticsId = $trackers['googleAnalyticsId'];
@endphp

@if ($googleAnalyticsId !== null)
  <script async data-category="necessary" data-src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalyticsId }}"></script>

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
    gtag('config', '{{ $googleAnalyticsId }}');
  </script>

  <script type="text/plain" data-category="analytics">
    gtag('consent', 'update', {
        analytics_storage: 'granted'
    });
  </script>

  <script type="text/plain" data-category="advertisement">
    gtag('consent', 'update', {
        ad_storage: 'granted',
        ad_user_data: 'granted',
        ad_personalization: 'granted'
    });
  </script>

  <script type="text/plain" data-category="functionality">
    gtag('consent', 'update', {
        functionality_storage: 'granted',
        personalization_storage: 'granted'
    });
  </script>
@endif