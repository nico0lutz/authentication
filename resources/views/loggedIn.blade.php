@extends('layouts.app')

<style>
    table, tr, td {
        padding-bottom: 10px;
        padding-right: 50px;
        font-size: 1.1em;
    }

    .content {
        margin: 0 auto;
        width: 25%;
    }

    .link {
        margin-top:30px;
        font-size: 1.2em;
    }
</style>

@section('content')
<div class="content">
    <h1>You are now logged in as</h1>
    <div class="user">
        <table>
        <tr><td>Name</td><td>{{ Auth::user()->name }}</td></tr>
        <tr><td>Email</td><td>{{ Auth::user()->email }}</td></tr>
        <tr><td>Created at</td><td>{{ Auth::user()->created_at }}</td></tr>
        </table>
    </div>
    <div class="link">
        <a href="logout">Logout</a>
    </div>
</dev>

@endsection