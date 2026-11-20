@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div class="min-h-[70vh] w-full px-5 py-12 sm:px-8 sm:py-20" data-taxi-view>
    <p class="text-xs font-semibold uppercase">HTTP / 404</p>
    <h1 class="mt-4 text-4xl font-extrabold uppercase sm:text-7xl lg:text-8xl">{{ $page->title() }}</h1>
    <div class="mt-8 max-w-3xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
    <a class="mt-16 inline-flex border-b-2 border-black pb-1 font-bold uppercase" href="{{ site()->url() }}">Return home -&gt;</a>
  </div>
</x-layout>
