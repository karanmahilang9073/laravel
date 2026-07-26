@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('students.update', $student->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="">Name</label><br>
        <input type="text" name="name" value="{{$student->name}}">
    </div>
    <br>
    <div>
        <label for="">Email</label><br>
        <input type="email" name="email" value="{{$student->email}}">
    </div>
    <br>
    <div>
        <label for="">Phone</label><br>
        <input type="text" name="phone" value="{{$student->phone}}">
    </div>
    <br>
    <div>
        <label for="">Age</label><br>
        <input type="number" name="age" value="{{$student->age}}">
    </div>
    <br>
    <div>
        <label for="">Course</label><br>
        <select name="course_id" id="">
            @foreach($courses as $course)
                <option value="{{$course->id}}" {{$student->course_id == $course->id ? 'selected' : ''}}>
                    {{$course->name}}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <x-button type="submit">Update student</x-button>
</form>
@endsection