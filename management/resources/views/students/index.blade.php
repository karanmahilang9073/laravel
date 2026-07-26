@extends('layouts.app')

@section('content')

<h2>Student List</h2>
@foreach($students as $student)
    <h3>{{$student->name}}</h3>
    <p>Email: {{$student->email}}</p>
    <p>Phone: {{$student->phone}}</p>
    <p>Age: {{$student->age}}</p>
    <p>Course: {{$student->course}}</p>
    <a href="{{route('students.edit', $student->id)}}">Edit</a>

    <form action="{{route('students.destroy', $student->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <hr>
@endforeach

@endsection