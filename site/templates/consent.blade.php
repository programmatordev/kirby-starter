@php
  /** @var \Kirby\Cms\Page $page */
  /** @var \Kirby\Cms\Site $site */

  $previousExample = $page->prevListed();
  $trackers = $site->trackers();
  $providers = [
    ['name' => 'Google Analytics', 'configured' => !empty($trackers['googleAnalyticsId'])],
    ['name' => 'Google Ads', 'configured' => !empty($trackers['googleAdsId'])],
    ['name' => 'Meta Pixel', 'configured' => !empty($trackers['metaPixelId'])]
  ];
@endphp

<x-layout>
  <div
    class="w-full"
    data-taxi-view
    x-data="{
      categories: [],
      acceptedCategories: [],
      hasConsent: false,
      controller: null,
      categoryLabel(category) {
        return category.charAt(0).toUpperCase() + category.slice(1);
      },
      refresh() {
        this.categories = Object.keys(window.CookieConsent.getConfig('categories') ?? {});
        this.acceptedCategories = window.CookieConsent.getUserPreferences().acceptedCategories ?? [];
        this.hasConsent = window.CookieConsent.validConsent();
      },
      init() {
        this.controller = new AbortController();
        const options = { signal: this.controller.signal };
        const refresh = () => this.refresh();

        window.addEventListener('cc:onFirstConsent', refresh, options);
        window.addEventListener('cc:onConsent', refresh, options);
        window.addEventListener('cc:onChange', refresh, options);
        queueMicrotask(refresh);
      },
      destroy() {
        this.controller.abort();
      }
    }"
  >
    <header class="border-b-2 border-black px-5 py-12 sm:px-8 sm:py-20">
      <x-breadcrumbs :current="$page" />
      <h1 class="mt-4 text-4xl font-extrabold uppercase sm:text-7xl lg:text-8xl">{{ $page->title() }}</h1>
      <div class="mt-8 max-w-4xl text-lg leading-relaxed font-medium sm:text-xl">{!! $page->text()->kirbytext() !!}</div>
    </header>

    <section class="grid border-b-2 border-black lg:grid-cols-2" aria-labelledby="providers-title">
      <div class="border-b-2 border-black lg:border-r-2 lg:border-b-0">
        <div class="border-b-2 border-black px-5 py-8 sm:px-8">
          <p class="text-xs font-semibold uppercase">Panel settings</p>
          <h2 id="providers-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">Configured trackers</h2>
        </div>

        <ul>
          @foreach ($providers as $provider)
            <li class="grid grid-cols-[1fr_auto] gap-6 border-b border-black px-5 py-5 last:border-b-0 sm:px-8">
              <strong>{{ $provider['name'] }}</strong>
              <span class="text-xs font-semibold uppercase {{ $provider['configured'] ? 'text-black' : 'text-black/70' }}">{{ $provider['configured'] ? 'Configured' : 'Not configured' }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="bg-white">
        <div class="border-b-2 border-black px-5 py-8 sm:px-8">
          <div class="flex flex-wrap items-end justify-between gap-6">
            <div>
              <p class="text-xs font-semibold uppercase">Current choice</p>
              <h2 class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">Consent categories</h2>
            </div>
            <span class="text-xs font-semibold uppercase" role="status" aria-atomic="true" x-text="hasConsent ? 'Choice saved' : 'Choice pending'">Choice pending</span>
          </div>
        </div>

        <ul>
          <template x-for="category in categories" :key="category">
            <li class="grid grid-cols-[1fr_auto] gap-6 border-b border-black px-5 py-5 last:border-b-0 sm:px-8">
              <strong x-text="categoryLabel(category)"></strong>
              <span class="text-xs font-semibold uppercase" :class="acceptedCategories.includes(category) ? 'text-black' : 'text-black/70'" x-text="acceptedCategories.includes(category) ? 'Accepted' : 'Rejected'"></span>
            </li>
          </template>
        </ul>

        <div class="border-t border-black px-5 py-8 sm:px-8">
          <button class="cursor-pointer bg-black px-5 py-3 font-bold text-teal-400 hover:bg-teal-500 hover:text-black" type="button" aria-haspopup="dialog" @click="window.CookieConsent.showPreferences()">Open preferences -&gt;</button>
        </div>
      </div>
    </section>

    <section class="grid bg-black text-white lg:grid-cols-2" aria-labelledby="consent-implementation-title">
      <div class="border-b border-white/30 px-5 py-10 sm:px-8 lg:border-r lg:border-b-0">
        <p class="text-xs font-semibold uppercase text-teal-400">Implementation / Consent</p>
        <h2 id="consent-implementation-title" class="mt-3 text-3xl font-extrabold uppercase sm:text-5xl">How it works</h2>
        <p class="mt-6 max-w-xl leading-relaxed text-white/60">Optional consent categories appear only for trackers with configured IDs. Trackers without IDs are not loaded.</p>
      </div>

      <ul>
        <li class="border-b border-white/30 px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">assets/scripts/plugins/cookie-consent/CookieConsentPlugin.js</code>
          <p class="mt-2 text-sm text-white/60">Builds consent categories from configured trackers.</p>
        </li>
        <li class="border-b border-white/30 px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">site/templates/components/consent/</code>
          <p class="mt-2 text-sm text-white/60">Adds tracker scripts and IDs.</p>
        </li>
        <li class="px-5 py-6 sm:px-8">
          <code class="text-sm text-teal-400">site/blueprints/pages/trackers.yml</code>
          <p class="mt-2 text-sm text-white/60">Stores tracker IDs in the Panel.</p>
        </li>
      </ul>
    </section>

    @if ($previousExample)
      <nav class="border-t border-teal-400" aria-label="Example navigation">
        <a class="flex min-h-32 items-center gap-5 px-5 py-8 hover:bg-black hover:text-teal-400 sm:px-8" href="{{ $previousExample->url() }}">
          <span class="text-2xl" aria-hidden="true">&lt;-</span>
          <span>
            <span class="block text-xs font-semibold uppercase">Previous</span>
            <strong class="mt-2 block text-lg uppercase sm:text-xl">{{ $previousExample->title() }}</strong>
          </span>
        </a>
      </nav>
    @endif
  </div>
</x-layout>
