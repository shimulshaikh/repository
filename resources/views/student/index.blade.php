@extends('layouts.home')
@section('content')
  <div>
    <a class="btn btn-info btn-sm" href="{{ route('students.create') }}" role="button">Add</a>
  </div>

    @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Class</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <th scope="row">{{ $student['id'] }}</th>
          <td>{{ $student['name'] }}</td>
          <td>{{ $student['email'] }}</td>
          <td>{{ $student['class'] }}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student['id']) }}" role="button">Edit</a>
            &nbsp;
            <a class="btn btn-danger btn-sm" onclick="return confirm('Are You sure want to delete !')" href="{{route('student.destroy', $student['id'])}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

@endsection  
