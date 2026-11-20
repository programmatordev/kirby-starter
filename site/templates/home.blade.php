@php
  /** @var \Kirby\Cms\Page $page */
  $transitionsPage = site()->find('transitions');
@endphp

<x-layout>
  <div data-taxi-view>
    <section class="border-b-2 border-black" aria-labelledby="home-title">
      <div class="grid min-h-[34rem] w-full lg:grid-cols-[minmax(0,1.25fr)_minmax(22rem,0.75fr)]">
        <div class="flex flex-col px-5 py-10 sm:px-8 sm:py-14 lg:border-r-2 lg:border-black">
          <div class="flex items-center justify-between gap-6 text-xs font-semibold uppercase">
            <p>00 / Starter overview</p>
          </div>

          <div class="flex flex-1 flex-col justify-center py-16 sm:py-20">
            <h1 id="home-title" class="text-5xl leading-[0.92] font-extrabold uppercase sm:text-7xl lg:text-8xl xl:text-9xl">Kirby<br>Starter</h1>
            <div class="mt-8 max-w-2xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
          </div>
        </div>

        <div class="grid min-h-[30rem] grid-rows-[1fr_auto] bg-black text-white">
          <div class="flex items-center justify-center p-12 sm:p-16">
            <img class="w-full max-w-52 brightness-0 invert" src="{{ vite()->file('assets/images/kirby-logo.svg') }}" alt="Kirby CMS">
          </div>

          <pre class="overflow-x-auto border-t border-white/30 p-5 text-xs leading-relaxed text-white/75 sm:p-8"><code><span class="text-teal-400">window.Taxi</span> = new Core({
  enableAccessibility: true,
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});</code></pre>
        </div>
      </div>
    </section>

    <section class="border-b-2 border-black" aria-labelledby="manifest-title">
      <div class="w-full">
        <header class="border-b-2 border-black px-5 py-8 sm:px-8">
          <div>
            <p class="text-xs font-semibold uppercase">01 / Runtime manifest</p>
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
            <span class="font-bold">05</span><strong class="uppercase">Taxi navigation</strong><code class="mt-2 sm:mt-0">transitions + preloading</code>
          </li>
          <li class="grid px-5 py-5 sm:grid-cols-[4rem_1fr_1fr] sm:px-8">
            <span class="font-bold">06</span><strong class="uppercase">Consent + trackers</strong><button class="mt-2 w-fit cursor-pointer underline underline-offset-4 hover:no-underline sm:mt-0" type="button" aria-haspopup="dialog" x-data="{}" @click="window.CookieConsent.showPreferences()">Open preferences -&gt;</button>
          </li>
        </ol>
      </div>
    </section>

    <section aria-labelledby="state-title">
      <div class="grid w-full lg:grid-cols-2" x-data="{ count: 0 }">
        <div class="flex min-h-96 flex-col justify-between border-b-2 border-black px-5 py-10 sm:px-8 lg:border-r-2 lg:border-b-0">
          <div>
            <p class="text-xs font-semibold uppercase">02 / Live specimen</p>
            <h2 id="state-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">Page-local state</h2>
          </div>

          <output class="my-16 text-7xl leading-none font-extrabold sm:text-9xl" aria-live="polite" aria-atomic="true" x-text="String(count).padStart(2, '0')">00</output>

          <div class="flex flex-wrap gap-3">
            <button class="cursor-pointer bg-black px-5 py-3 font-bold text-teal-400 hover:bg-white hover:text-black" type="button" @click="count++">increment()</button>
            <button class="cursor-pointer border-2 border-black px-5 py-3 font-bold hover:bg-white" type="button" @click="count = 0">reset()</button>
          </div>
        </div>

        <div class="flex min-h-96 flex-col justify-between bg-white px-5 py-10 sm:px-8">
          <div class="flex items-start justify-between gap-8">
            <p class="text-xs font-semibold uppercase">Output / DOM</p>
            <p class="text-right text-xs uppercase text-black/60">This state is destroyed<br>when Taxi leaves the view.</p>
          </div>

          <pre class="my-16 overflow-x-auto text-sm leading-loose sm:text-base"><code>&lt;div x-data="{ count: 0 }"&gt;
  &lt;button @click="count++"&gt;
    increment()
  &lt;/button&gt;
  &lt;output x-text="count"&gt;&lt;/output&gt;
&lt;/div&gt;</code></pre>

          <a class="group flex items-center justify-between border-t-2 border-black pt-5 font-bold uppercase" href="{{ $transitionsPage->url() }}">
            <span>Test the lifecycle</span>
            <span class="text-2xl transition-transform group-hover:translate-x-2 motion-reduce:transition-none">-&gt;</span>
          </a>
        </div>
      </div>
    </section>
  </div>
</x-layout>
