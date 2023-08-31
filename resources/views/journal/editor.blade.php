@extends('layouts.app')
@section('title', 'Editor')


@section('content')
    <form id="frmEntryEditor" method="post" action="{{ route('editor') }}">
        @csrf

        <div class="control">
            <label for="txtEntryTitle">Title</label>
            <input id="txtEntryTitle" name="title" />
        </div>


        <div class="control">
            <label for="txtEntryBody">Body</label>
            <textarea id="txtEntryBody" name="body"></textarea>
        </div>

        <div class="actions">
            <button id="cmdSubmit" type="submit">Save</button>
        </div>
    </form>
@endsection
