@extends('layouts.master')

@section('title', 'Admin Home')

@section('content')
    <form action="/admin/create-employee" method="post">
        @csrf
        <h1>Employee Information System</h1>
        <h1>Admin side:</h1>

        @include('admin.partials.nav')

        <div class="container">
            <div class="incon">
                <label for="name"> Name: </label>
                <input class="input-text" type="text" id="name" name="name"
                       pattern="[a-zA-Z ]{3,30}" title="Only alphabets are allowed and minimum are 3" required/>
            </div>

            <div class="incon">
                <label for="email"> Email: </label>
                <input class="input-text" type="email" id="email" name="email" required/>
            </div>

            <div class="incon">
                <label for="password"> Password: </label>
                <input class="input-text" type="password" id="password" name="password"
                       pattern=".{5,15}" title="Minimum characters should be 5" required/>
            </div>

            <div class="incon">
                <label for="designation"> Designation: </label>
                <input class="input-text" type="text" id="designation" name="designation"
                       pattern="[a-zA-Z ]{3,30}" title="Only alphabets are allowed and minimum are 3" required/>
            </div>

            <div class="incon">
                <label for="contactno"> Contact No: </label>
                <input class="input-text" type="text" id="contactno" name="contact"
                       pattern="[0-9.-+() ]{11,20}" title="Only phone numbers are allowed and max chars should be 20" required/>
            </div>

            <div class="incon">
                <input class="button" type="reset" value="Reset"/>
                <input class="button" type="submit" value="Save"/>
            </div>

            @if(session('success'))
                <div class="error">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('email'))
                <div class="error">
                    Email already exists, pls use another
                </div>
            @endif
        </div>
    </form>
@endsection
