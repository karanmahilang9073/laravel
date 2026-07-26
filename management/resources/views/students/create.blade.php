@extends('layouts.app')

@section('content')
<h2>Add stundents</h2>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('students.store')}}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <br>
    <div>
        <label for="">Email</label>
        <input type="email" name="email">
    </div>
    <br>
    <div>
        <label for="">Phone</label>
        <input type="text" name="phone">
    </div>
    <br>
    <div>
        <label for="">Age</label>
        <input type="number" name="age">
    </div>
    <br>
    <div>
        <label for="">Course</label>
        <select name="course_id">
            <option value="">Select course</option>
            @foreach($courses as $course)
                <option value="{{$course->id}}">
                    {{$course->name}}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <x-button type="submit">Save Student</x-button>
</form>
@endsection