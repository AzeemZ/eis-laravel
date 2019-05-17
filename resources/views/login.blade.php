@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <form action="/" method="post">
        @csrf
        <h1>Employee Information System</h1>
        <p class="heading2">Please provide your username and password</p>

        <div class="container">
            <div class="incon">
                <label for="username"> Username: </label>
                <input class="input-text" type="email" id="username" name="email" required/>
            </div>

            <div class="incon">
                <label for="password"> Password: </label>
                <input class="input-text" type="password" id="password" name="password" pattern=".{5,15}" title="Minimum characters should be 5" required/>
            </div>

            <div class="incon">
                <input class="button" type="reset" value="Reset"/>
                <input class="button" type="submit" value="Login"/>
            </div>

            <div class="error">
                {{ session('message') }}
            </div>
        </div>
    </form>
@endsection
