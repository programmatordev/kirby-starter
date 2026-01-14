@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div data-taxi-view>
    <h1 class="font-bold">{{ $page->title() }}</h1>
    <div>{!! $page->text()->kirbytext() !!}</div>
  </div>
</x-layout>
