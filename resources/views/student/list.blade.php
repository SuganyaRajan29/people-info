@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9">
                <h2>Student Details</h2>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success padding-top" href="{{ route('student.create') }}">Add</a>
        </div>
         <div class="col-lg-1">
        <a class="btn btn-info padding-top" href="{{ route('getData') }}">View API</a>
         </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Height</th>
            <th>Mass</th>
            <th>Hair Color</th>
            <th>Skin Color</th>
            <th width="280px">Action</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($students as $student)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->height }}</td>
                <td>{{ $student->mass }}</td>
                 <td>{{ $student->hair_color }}</td>
                  <td>{{ $student->skin_color }}</td>
                <td>
                    <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('student.show',$student->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection