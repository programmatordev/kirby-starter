@php
  /** @var \Kirby\Cms\App $kirby */
  /** @var \Kirby\Cms\Page $page */
  /** @var \Kirby\Cms\Site $site */

  $metaTitle = $page->title() . ' - ' . $site->title();
  $isIndexable = $kirby->option('debug') !== true
    && $page->isPublished()
    && !$page->isErrorPage();
@endphp

<title>{{ $metaTitle }}</title>
<meta name="robots" content="{{ $isIndexable ? 'index,follow' : 'noindex,nofollow' }}">
@if ($isIndexable)
  <link rel="canonical" href="{{ $page->url() }}">
@endif
<meta property="og:title" content="{{ $page->title() }}">
<meta property="og:type" content="website">
@if ($isIndexable)
  <meta property="og:url" content="{{ $page->url() }}">
@endif
<meta property="og:site_name" content="{{ $site->title() }}">
