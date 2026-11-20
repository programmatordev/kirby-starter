@php
  $page = page();
  $site = site();
  $metaTitle = $page->title() . ' - ' . $site->title();
  $language = kirby()->languageCode() ?? kirby()->option('app.language');
  $isIndexable = kirby()->option('debug') !== true
    && $page->isPublished()
    && !$page->isErrorPage();
@endphp

<!DOCTYPE html>
<html lang="{{ $language }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    @snippet('favicon')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">

    {!! vite()->css('assets/scripts/app.js') !!}
    {!! vite()->js('assets/scripts/app.js', ['defer' => true]) !!}

    <x-consent />
  </head>

  <body class="flex min-h-screen flex-col bg-teal-500 font-['Martian_Mono',monospace] text-sm text-black sm:text-base lg:pb-20">
    <a class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-black focus:px-4 focus:py-3 focus:text-white" href="#main-content">Skip to content</a>

    <header
      class="sticky top-0 z-40 bg-teal-500"
      x-data="{
        menuOpen: false,
        currentPath: window.location.pathname.replace(/\/+$/, '') || '/',
        normalizePath(path) { return path.replace(/\/+$/, '') || '/' },
        isCurrentPath(path, isHome = false) {
          const itemPath = this.normalizePath(path);

          return isHome
            ? this.currentPath === itemPath
            : this.currentPath === itemPath || this.currentPath.startsWith(`${itemPath}/`);
        },
        closeMenu() {
          this.menuOpen = false;
        }
      }"
      x-init="queueMicrotask(() => window.Taxi.on('NAVIGATE_IN', () => { currentPath = normalizePath(window.location.pathname); closeMenu(); }))"
      @keydown.escape.window="if (menuOpen) { closeMenu(); $nextTick(() => $refs.menuButton.focus()); }"
    >
      <div class="grid min-h-16 w-full grid-cols-[1fr_auto] items-stretch border-b-2 border-black lg:grid-cols-[1fr_auto_1fr]">
        <a class="flex items-center gap-3 px-5 font-bold uppercase sm:px-8" href="{{ $site->url() }}">
          <img class="h-7 w-auto" src="{{ vite()->file('assets/images/kirby-logo.svg') }}" alt="">
          <span>{{ $site->title() }}</span>
        </a>

        <p class="hidden items-center border-x-2 border-black px-8 text-xs font-semibold uppercase lg:flex">Kirby {{ \Kirby\Cms\App::version() }}</p>

        <nav class="hidden items-stretch justify-end sm:flex" aria-label="Primary navigation">
          <ul class="flex items-stretch">
            @foreach ($site->pages()->listed() as $item)
              <li class="flex border-l-2 border-black first:border-l-0 lg:first:border-l-2">
                <a class="flex items-center px-4 text-xs font-semibold uppercase hover:bg-black hover:text-teal-400 aria-[current=page]:bg-black aria-[current=page]:text-teal-400 sm:px-6" href="{{ $item->url() }}" :aria-current="isCurrentPath(new URL($el.href).pathname, {{ $item->isHomePage() ? 'true' : 'false' }}) ? 'page' : null" @if ($item->isOpen()) aria-current="page" @endif>
                  <span aria-hidden="true">{{ $item->num() }}_</span>{{ $item->slug() }}
                </a>
              </li>
            @endforeach
          </ul>
        </nav>

        <button
          class="flex cursor-pointer items-center border-l-2 border-black px-5 text-xs font-semibold uppercase hover:bg-black hover:text-teal-400 sm:hidden"
          type="button"
          aria-controls="mobile-navigation"
          :aria-expanded="menuOpen"
          x-ref="menuButton"
          @click="menuOpen = !menuOpen"
          :class="menuOpen ? 'bg-black text-teal-400' : ''"
          x-text="menuOpen ? 'Close' : 'Menu'"
        >Menu</button>
      </div>

      <nav id="mobile-navigation" class="absolute inset-x-0 top-full border-b border-black bg-teal-500 sm:hidden" aria-label="Mobile navigation" x-cloak x-show="menuOpen">
        <ul>
          @foreach ($site->pages()->listed() as $item)
            <li class="border-b border-black last:border-b-0">
              <a class="block px-5 py-4 text-xs font-semibold uppercase hover:bg-black hover:text-teal-400 aria-[current=page]:bg-black aria-[current=page]:text-teal-400" href="{{ $item->url() }}" :aria-current="isCurrentPath(new URL($el.href).pathname, {{ $item->isHomePage() ? 'true' : 'false' }}) ? 'page' : null" @if ($item->isOpen()) aria-current="page" @endif @click="closeMenu()">
                <span aria-hidden="true">{{ $item->num() }}_</span>{{ $item->slug() }}
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
    </header>

    <main id="main-content" class="flex-1" data-taxi tabindex="-1">
      {{ $slot }}
    </main>

    <aside class="border-t border-teal-400 bg-black text-teal-400 lg:fixed lg:inset-x-0 lg:bottom-0 lg:z-40" aria-label="Shared counter">
      <div class="grid w-full gap-px bg-teal-400 lg:h-20 lg:grid-cols-[1fr_auto_1fr]" x-data="{ count: 0 }">
        <div class="flex items-center bg-black px-5 py-5 sm:px-8 lg:py-3">
          <p class="text-xs font-semibold uppercase">Shared counter</p>
        </div>

        <div class="flex items-center gap-5 bg-black px-5 py-5 sm:px-8 lg:py-3">
          <output class="min-w-28 font-bold" aria-live="polite" aria-atomic="true">count = <span x-text="count">0</span></output>
          <button class="cursor-pointer border border-teal-400 px-3 py-2 font-bold hover:bg-teal-400 hover:text-black" type="button" @click="count++" aria-label="Increase shared counter">+1</button>
          <button class="cursor-pointer text-white/60 underline underline-offset-4 hover:text-white" type="button" @click="count = 0">reset</button>
        </div>

        <p class="flex items-center bg-black px-5 py-5 text-xs text-white/60 sm:px-8 lg:py-3 lg:text-right">Increase it, visit another page, and check that the value remains.</p>
      </div>
    </aside>
  </body>
</html>
