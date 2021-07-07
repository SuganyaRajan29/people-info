@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Student</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary padding-top" href="{{ url('student') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtFirstName">First Name: *</label>
            <input type="text" class="form-control" id="name" placeholder="Enter First Name" name="name">
        </div>
        <div class="form-group">
            <label for="txtLastName">Height: *</label>
            <input type="text" class="form-control" id="height" placeholder="Enter Height" name="height">
        </div>
        <div class="form-group">
            <label for="txtLastName">Mass: *</label>
            <input type="text" class="form-control" id="mass" placeholder="Enter Mass" name="mass">
        </div>
         <div class="form-group">
            <label for="txtLastName">Hair Color:</label>
            <input type="text" class="form-control" id="hair_color" placeholder="Enter Hair Color" name="hair_color">
        </div>
         <div class="form-group">
            <label for="txtLastName">Skin Color</label>
            <input type="text" class="form-control" id="skin_color" placeholder="Enter Skin Color" name="skin_color">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection