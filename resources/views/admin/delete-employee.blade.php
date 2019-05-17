@extends('layouts.master')

@section('title', 'Delete Employee')

@section('content')
    <form action="/admin/delete-employee" method="post">
        @method('delete')
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
                <input class="button" type="reset" value="Cancel"/>
                <input class="button" type="submit" value="Delete"/>
            </div>

            @if(session('message'))
                <div class="error">
                    &nbsp&nbsp {{ session('message') }}
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
                        }
                    }
                });
            });
        });
    </script>
@endsection
