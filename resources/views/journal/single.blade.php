@extends(sprintf('layouts.%s', $page->layout ?? 'default'))
@section('title', $page->title)

@section('content')
    <article class="hentry" data-id="{{ $page->entryId }}">
        <header>
            <div class="entry-meta">
                <h1 class="title">{{ $page->entryTitle }}</h1>
                <a class="permalink" title="Permalink to '{{ $page->entryTitle }}'" href="{{ $page->canonicalUrl }}">#</a>
            </div>


            <h2 class="dateline">{{ $page->entryDate }}</h2>
        </header>

        <div class="body">
            {!! $page->body !!}
        </div>
    </article>
@endsection
