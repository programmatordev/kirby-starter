@php
  /** @var \Kirby\Cms\Page $page */
  $examplesPage = site()->find('examples');
  $navigationPage = $examplesPage->find('navigation');
  $consentPage = $examplesPage->find('consent');
@endphp

<x-layout>
  <div data-taxi-view>
    <section class="border-b-2 border-black" aria-labelledby="home-title">
      <div class="grid min-h-[34rem] w-full lg:grid-cols-[minmax(0,1.25fr)_minmax(22rem,0.75fr)]">
        <div class="flex flex-col px-5 py-12 sm:px-8 sm:py-20 lg:border-r-2 lg:border-black">
          <x-breadcrumbs :current="$page" />

          <div class="flex flex-1 flex-col justify-center py-16 sm:py-20">
            <h1 id="home-title" class="text-5xl leading-[0.92] font-extrabold uppercase sm:text-7xl lg:text-8xl xl:text-9xl">Kirby<br>Starter</h1>
            <div class="mt-8 max-w-2xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
          </div>
        </div>

        <div class="flex min-h-[30rem] items-center justify-center bg-black p-12 sm:p-16">
          <img class="w-full max-w-52 brightness-0 invert" src="{{ vite()->file('assets/images/kirby-logo.svg') }}" alt="Kirby CMS">
        </div>
      </div>
    </section>

    <section aria-labelledby="manifest-title">
      <div class="w-full">
        <header class="border-b-2 border-black px-5 py-8 sm:px-8">
          <div>
            <p class="text-xs font-semibold uppercase">Runtime manifest</p>
            <h2 id="manifest-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">Included by default</h2>
          </div>
        </header>

        <ol>
          <li class="grid border-b border-black px-5 py-5 last:border-b-0 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">01</span><strong class="uppercase">Kirby CMS</strong><code class="mt-2 sm:mt-0">content/ + site/</code>
          </li>
          <li class="grid border-b border-black px-5 py-5 last:border-b-0 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">02</span><strong class="uppercase">Blade templates</strong><code class="mt-2 sm:mt-0">site/templates/*.blade.php</code>
          </li>
          <li class="grid border-b border-black px-5 py-5 last:border-b-0 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">03</span><strong class="uppercase">Vite + Tailwind</strong><code class="mt-2 sm:mt-0">assets/ -&gt; build/</code>
          </li>
          <li class="grid border-b border-black px-5 py-5 last:border-b-0 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">04</span><strong class="uppercase">Alpine state</strong><code class="mt-2 sm:mt-0">local + persistent</code>
          </li>
          <li class="grid border-b border-black px-5 py-5 last:border-b-0 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">05</span><strong class="uppercase">Taxi navigation</strong><a class="mt-2 underline underline-offset-4 hover:no-underline sm:mt-0" href="{{ $navigationPage->url() }}">Open example -&gt;</a>
          </li>
          <li class="grid px-5 py-5 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">06</span><strong class="uppercase">Consent + trackers</strong><a class="mt-2 underline underline-offset-4 hover:no-underline sm:mt-0" href="{{ $consentPage->url() }}">Open example -&gt;</a>
          </li>
        </ol>
      </div>
    </section>
  </div>
</x-layout>
