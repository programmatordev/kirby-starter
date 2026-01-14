@php
  /** @var \Kirby\Cms\Page $page */
@endphp

<x-layout>
  <div data-taxi-view>
    <h1 class="font-bold">{{ $page->title() }}</h1>
    <div class="[&_a]:underline">{!! $page->text()->kirbytext() !!}</div>

    @if ($page->slug() === 'transitions')
      <div class="mt-2" x-data="{ show: false }">
        <button class="size-9 cursor-pointer bg-black text-teal-500" @click="show = !show">
          <span class="block transition-transform" :class="{ 'rotate-45 translate-x-px': show }">+</span>
        </button>

        <template x-if="show">
          <span>Hello. I am visible now.</span>
        </template>
      </div>
    @endif
  </div>
</x-layout>
