@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Laravel 6 CRUD Example</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary padding-top" href="{{ url('student') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>Height:</th>
            <td>{{ $student->height }}</td>
        </tr>
        <tr>
            <th>Mass:</th>
            <td>{{ $student->mass }}</td>
        </tr>
        <tr>
            <th>Hair Color:</th>
            <td>{{ $student->hair_color }}</td>
        </tr>
        <tr>
            <th>Skin Color:</th>
            <td>{{ $student->skin_color }}</td>
        </tr>

    </table>
@endsection