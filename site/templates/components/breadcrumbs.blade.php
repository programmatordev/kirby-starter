@props(['current'])

@php
  /** @var \Kirby\Cms\Page $current */

  $pages = [];
  $pathPage = $current;

  while ($pathPage instanceof \Kirby\Cms\Page) {
    array_unshift($pages, $pathPage);
    $pathPage = $pathPage->parent();
  }

@endphp

<nav class="text-xs font-semibold uppercase" aria-label="Content path">
  <ol class="flex flex-wrap items-center">
    @foreach ($pages as $pathPage)
      <li class="flex items-center">
        @if ($pathPage->is($current))
          <span aria-current="page">{{ $pathPage->dirname() }}</span>
        @else
          <a class="underline underline-offset-4 hover:no-underline" href="{{ $pathPage->url() }}">{{ $pathPage->dirname() }}</a>
          <span class="mx-2" aria-hidden="true">/</span>
        @endif
      </li>
    @endforeach
  </ol>
</nav>
