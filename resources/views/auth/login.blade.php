@extends('layouts.app')
@section('title', 'Sign in')


@section('content')
    <h1>Sign in</h1>

    <form id="frmUserSignin" name="frmUserSignin" method="post" action="{{ route('login.handler') }}">
        @csrf

        <div class="control">
            <label for="txtUserEmail">Email</label>
            <input type="text" id="txtUserEmail" name="email" />
        </div>

        <div class="control">
            <label for="txtUserPass">Password</label>
            <input type="password" id="txtUserPass" name="password" />
        </div>

        <div class="actions">
            <button id="cmdSubmit" type="submit">Sign in</button>
        </div>
    </form>
@endsection
