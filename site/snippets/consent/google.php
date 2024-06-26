<?php
  $trackingId = $trackingId ?? env('CONSENT_GOOGLE_TRACKING_ID');
?>

<?php if ($trackingId !== null): ?>
  <script async data-category="necessary" data-src="https://www.googletagmanager.com/gtag/js?id=<?= $trackingId ?>"></script>

  <script type="text/plain" data-category="necessary">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    gtag('consent', 'default', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
        wait_for_update: 500
    });

    gtag('set', 'ads_data_redaction', true);

    gtag('js', new Date());
    gtag('config', '<?= $trackingId ?>');
  </script>

  <script type="text/plain" data-category="measurement">
    gtag('consent', 'update', {
        analytics_storage: 'granted'
    });
  </script>

  <script type="text/plain" data-category="!measurement">
    gtag('consent', 'update', {
        analytics_storage: 'denied'
    });

    CookieConsent.eraseCookies(/^(_ga|gid|__utm)/);
  </script>

  <script type="text/plain" data-category="marketing">
    gtag('consent', 'update', {
        ad_storage: 'granted',
        ad_user_data: 'granted',
        ad_personalization: 'granted'
    });
  </script>

  <script type="text/plain" data-category="!marketing">
    gtag('consent', 'update', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied'
    });

    CookieConsent.eraseCookies(/^(_ga|gid|__utm)/);
  </script>
<?php endif; ?>