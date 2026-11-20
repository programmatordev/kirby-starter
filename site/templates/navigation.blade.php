@php
  /** @var \Kirby\Cms\Page $page */
  $nextExample = $page->nextListed();
@endphp

<x-layout>
  <div class="w-full" data-taxi-view>
    <header class="border-b-2 border-black px-5 py-12 sm:px-8 sm:py-20">
      <x-breadcrumbs :current="$page" />
      <h1 class="mt-4 text-4xl font-extrabold uppercase sm:text-7xl lg:text-8xl">{{ $page->title() }}</h1>
      <div class="mt-8 max-w-4xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
    </header>

    <section class="grid border-b-2 border-black lg:grid-cols-2" aria-labelledby="local-state-title" x-data="{ count: 0 }">
      <div class="flex min-h-96 flex-col justify-between border-b-2 border-black px-5 py-10 sm:px-8 lg:border-r-2 lg:border-b-0">
        <div>
          <p class="text-xs font-semibold uppercase">This page's counter</p>
          <h2 id="local-state-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">Resets when you leave</h2>
        </div>

        <output class="my-16 text-7xl leading-none font-extrabold sm:text-9xl" aria-live="polite" aria-atomic="true" x-text="String(count).padStart(2, '0')">00</output>

        <div class="flex flex-wrap gap-3">
          <button class="cursor-pointer border-2 border-black bg-black px-5 py-3 font-bold text-teal-400 hover:bg-white hover:text-black" type="button" @click="count++">Increment</button>
          <button class="cursor-pointer border-2 border-black px-5 py-3 font-bold hover:bg-white" type="button" @click="count = 0">Reset</button>
        </div>
      </div>

      <div class="flex min-h-96 flex-col justify-between bg-white px-5 py-10 sm:px-8">
        <div>
          <p class="text-xs font-semibold uppercase">Try it out</p>
          <ol class="mt-8 space-y-6 text-lg leading-relaxed">
            <li class="grid grid-cols-[2rem_1fr] gap-3"><strong>01</strong><span>Increase this counter and the counter at the bottom of the page.</span></li>
            <li class="grid grid-cols-[2rem_1fr] gap-3"><strong>02</strong><span>Navigate to another page.</span></li>
            <li class="grid grid-cols-[2rem_1fr] gap-3"><strong>03</strong><span>Return here. This counter resets while the persistent counter keeps its value.</span></li>
          </ol>
        </div>

        <a class="group mt-16 flex items-center justify-between border-t-2 border-black pt-5 font-bold uppercase" href="{{ $nextExample->url() }}">
          <span class="underline underline-offset-4 group-hover:no-underline">Next example</span>
          <span class="text-2xl" aria-hidden="true">-&gt;</span>
        </a>
      </div>
    </section>

    <section class="grid bg-black text-white lg:grid-cols-2" aria-labelledby="implementation-title">
      <div class="border-b border-white/30 px-5 py-10 sm:px-8 lg:border-r lg:border-b-0">
        <p class="text-xs font-semibold uppercase text-teal-400">Implementation / Navigation</p>
        <h2 id="implementation-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">How it works</h2>
        <p class="mt-6 max-w-xl leading-relaxed text-white/60">Taxi removes the current page before Alpine clears its state. Alpine then starts the interactions on the next page.</p>
      </div>

      <ul>
        <li class="border-b border-white/30 px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">assets/scripts/app.js</code>
          <p class="mt-2 text-sm text-white/60">Taxi setup and accessibility options.</p>
        </li>
        <li class="border-b border-white/30 px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">assets/scripts/renderers/DefaultRenderer.js</code>
          <p class="mt-2 text-sm text-white/60">Coordinates each page change.</p>
        </li>
        <li class="px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">assets/scripts/plugins/AlpinePlugin.js</code>
          <p class="mt-2 text-sm text-white/60">Starts and clears Alpine interactions.</p>
        </li>
      </ul>
    </section>

    @if ($nextExample)
      <nav class="border-t border-teal-400" aria-label="Example navigation">
        <a class="flex min-h-32 items-center justify-between gap-5 px-5 py-8 text-right hover:bg-black hover:text-teal-400 sm:px-8" href="{{ $nextExample->url() }}">
          <span class="ml-auto">
            <span class="block text-xs font-semibold uppercase">Next</span>
            <strong class="mt-2 block text-lg uppercase sm:text-xl">{{ $nextExample->title() }}</strong>
          </span>
          <span class="text-2xl" aria-hidden="true">-&gt;</span>
        </a>
      </nav>
    @endif
  </div>
</x-layout>
