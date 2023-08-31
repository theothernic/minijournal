@extends('layouts.app')
@section('title', 'Dashboard')



@section('content')
    <h1>Dashboard</h1>

    <a href="{{ route('editor') }}">Create New Post</a>
@endsection
