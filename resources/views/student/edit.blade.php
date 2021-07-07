@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update Student</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('student') }}"> Back</a>
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
    <form method="post" action="{{ route('student.update',$student->id) }}" >
        @method('PATCH')
        @csrf
         <div class="form-group">
            <label for="txtFirstName">First Name: *</label>
            <input type="text" class="form-control" id="name" value="{{ $student->name }}" name="name">
        </div>
        <div class="form-group">
            <label for="txtLastName">Height: *</label>
            <input type="text" class="form-control" id="height" value="{{ $student->height }}" name="height">
        </div>
        <div class="form-group">
            <label for="txtLastName">Mass: *</label>
            <input type="text" class="form-control" id="mass" value="{{ $student->mass }}" name="mass">
        </div>
         <div class="form-group">
            <label for="txtLastName">Hair Color:</label>
            <input type="text" class="form-control" id="hair_color" value="{{ $student->hair_color }}" name="hair_color">
        </div>
         <div class="form-group">
            <label for="txtLastName">Skin Color</label>
            <input type="text" class="form-control" id="skin_color" value="{{ $student->skin_color }}" name="skin_color">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection