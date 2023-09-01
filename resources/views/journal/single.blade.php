@extends('layouts.minimal')
@section('title', $page->title)

@section('content')
    <article>
        <header>
            <h1>{{ $page->entryDate }}: {{ $page->title }}</h1>
        </header>

        <div id="body">
            @if($page->hasHtmlBody())
                {!! $page->htmlBody !!}
            @else
                {{ nl2br($page->body) }}
            @endif

        </div>
    </article>
@endsection
