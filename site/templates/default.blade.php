@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div class="w-full px-5 py-12 sm:px-8 sm:py-20" data-taxi-view>
    <x-breadcrumbs :current="$page" />
    <h1 class="mt-4 text-4xl font-extrabold uppercase sm:text-7xl lg:text-8xl">{{ $page->title() }}</h1>
    <div class="mt-8 max-w-3xl text-lg leading-relaxed font-medium [&_a]:underline [&_a]:decoration-2 [&_a]:underline-offset-4 sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
  </div>
</x-layout>
