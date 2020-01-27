@extends('layouts.app')

<style>

.form {
        margin: 0 auto;
        width: 30%;
        margin-top: 100px;
    }

</style>

@section('content')


<div class="form">

<h2>Login</h2>
<form action="login" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    @if($errors->login->first('email'))
       {{ $errors->login->first('email') }}
    @endif
    <br>
    <input type="password" name="password" placeholder="Password" required>
    @if($errors->login->first('password'))
       {{ $errors->login->first('password') }}
    @endif
    <br><br>
    <input type="submit" value="Login">
</form>
</div>
<div class="form">

<h2>Register</h2>
<form action="register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Username" required>
    @if($errors->register->first('name'))
        {{ $errors->register->first('name') }}
    @endif
    <br>
    <input type="email" name="email" placeholder="Email" required>
    @if($errors->register->first('email'))
       {{ $errors->register->first('email') }}
    @endif
    <br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    @if($errors->register->first('password'))
       {{ $errors->register->first('password') }}
    @endif
    <br><br>
    <input type="submit" value="Register">
</form>
</div>
@endsection