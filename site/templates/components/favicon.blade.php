@php
  $faviconPng = asset('assets/favicon/favicon.png');
  $faviconSvg = asset('assets/favicon/favicon.svg');
@endphp

@if ($faviconPng->exists())
  <link rel="icon" type="image/png" sizes="48x48" href="{{ $faviconPng->thumb(['width' => 48, 'format' => 'png'])->url() }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ $faviconPng->thumb(['width' => 180, 'format' => 'png'])->url() }}">
@endif

@if ($faviconSvg->exists())
  <link rel="icon" type="image/svg+xml" sizes="any" href="{{ $faviconSvg->url() }}">
@endif
