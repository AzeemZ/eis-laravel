@extends('layouts.master')

@section('title', 'Update Employee')

@section('content')
    <form action="/admin/update-employee" method="post">
        @method('patch')
        @csrf

        <h1>Employee Information System</h1>
        <h1>Admin side:</h1>

        @include('admin.partials.nav')

        <div class="container">
            <div class="incon">
                <label for="employeeid"> Employee ID: </label>
                <select id="employeeid" name="id">
                    <option selected disabled>Select ID To Proceed</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}"> {{ $employee->id }} </option>
                    @endforeach
                </select>
            </div>

            <div class="incon">
                <label for="name"> Name: </label>
                <input class="input-text" type="text" id="name" name="name" pattern="[a-zA-Z ]{3,30}"
                       title="Only alphabets are allowed and minimum are 3" required/>
            </div>

            <div class="incon">
                <label for="email"> Email: </label>
                <input class="input-text" type="email" id="email" name="email" required/>
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
                <input class="button" type="reset" value="Cancel"/>
                <input class="button" type="submit" name="clicked" value="Update"/>
            </div>

            @if(session('message'))
                <div class="error">
                    {{ session('message') }}
                </div>
            @endif

            @if($errors->has('email'))
                <div class="error">
                    The email already in use by other ID
                </div>
            @endif
        </div>
    </form>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $("#employeeid").change(function () {
                let id = $("#employeeid").val();

                $.ajax({
                    type: 'POST',
                    url: '/admin/fetch-employee/' + id,
                    data: {
                        '_token': $('input[name="_token"]').val()
                    },
                    dataType: 'json',

                    success: function (data) {
                        if (data.success === true){
                            $('#name').val(data.employee.name);
                            $('#email').val(data.employee.email);
                            $('#designation').val(data.employee.designation);
                            $('#contactno').val(data.employee.contact);
                        }
                    }
                });
            });
        });
    </script>
@endsection
