@extends('layouts.master')

@section('title', 'Employee Home')

@section('content')
        <h1>Employee Information System</h1>
        <h1>Employee side:</h1>

        <table>
            <tr>
                <th class="tdhead">Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Contact No.</th>
            </tr>

            <tr>
                <td class="tdhead"> {{ $employee->id }} </td>
                <td> {{ $employee->name }} </td>
                <td> {{ $employee->email }} </td>
                <td> {{ $employee->designation }} </td>
                <td> {{ $employee->contact }} </td>
            </tr>

            <tr>
                <td colspan="5">
                    <a id="link" href="/logout-employee">Logout</a>
                </td>
            </tr>
        </table>
@endsection
