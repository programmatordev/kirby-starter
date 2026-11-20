@props(['current'])

@php
  $previous = $current->prevListed();
  $next = $current->nextListed();
@endphp

<nav class="grid border-t border-teal-400 {{ $previous && $next ? 'sm:grid-cols-2' : '' }}" aria-label="Example navigation">
  @if ($previous)
    <a class="flex min-h-32 items-center gap-5 px-5 py-8 hover:bg-black hover:text-teal-400 sm:px-8 {{ $next ? 'border-b-2 border-black sm:border-r-2 sm:border-b-0' : '' }}" href="{{ $previous->url() }}">
      <span class="text-2xl" aria-hidden="true">&lt;-</span>
      <span>
        <span class="block text-xs font-semibold uppercase">Previous</span>
        <strong class="mt-2 block text-lg uppercase sm:text-xl">{{ $previous->title() }}</strong>
      </span>
    </a>
  @endif

  @if ($next)
    <a class="flex min-h-32 items-center justify-between gap-5 px-5 py-8 text-right hover:bg-black hover:text-teal-400 sm:px-8" href="{{ $next->url() }}">
      <span class="ml-auto">
        <span class="block text-xs font-semibold uppercase">Next</span>
        <strong class="mt-2 block text-lg uppercase sm:text-xl">{{ $next->title() }}</strong>
      </span>
      <span class="text-2xl" aria-hidden="true">-&gt;</span>
    </a>
  @endif
</nav>
