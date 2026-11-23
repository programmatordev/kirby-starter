@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div class="w-full" data-taxi-view>
    <header class="px-5 py-12 sm:px-8 sm:py-20">
      <x-breadcrumbs :current="$page" />
      <h1 class="mt-4 text-4xl font-extrabold uppercase sm:text-7xl lg:text-8xl">{{ $page->title() }}</h1>
      <div class="mt-8 max-w-3xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
    </header>

    <ol class="border-t-2 border-black">
      @foreach ($page->children()->listed() as $example)
        <li class="border-b border-black last:border-b-0">
          <a class="grid gap-5 px-5 py-8 hover:bg-black hover:text-teal-400 sm:grid-cols-[4rem_1fr_auto] sm:items-center sm:px-8" href="{{ $example->url() }}">
            <span class="font-bold">0{{ $loop->iteration }}</span>
            <span>
              <strong class="block text-xl uppercase sm:text-2xl">{{ $example->title() }}</strong>
              <span class="mt-2 block max-w-3xl text-sm leading-relaxed opacity-70 sm:text-base">{{ $example->text()->excerpt(160) }}</span>
            </span>
            <span class="text-2xl" aria-hidden="true">-&gt;</span>
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</x-layout>
