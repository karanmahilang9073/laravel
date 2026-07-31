@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Student List</h2>

    <form action="{{route('students.index')}}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{request('search')}}" placeholder="search by name or email" class="form-control">
    </form>

    @foreach($students as $student)
        <div class="bg-white rounded-2xl shadow-md p-6 mb-4 flex gap-6 items-start">
            @if($student->photo)
                <img src="{{ asset('storage/' . $student->photo) }}" alt="student photo" class="w-24 h-24 rounded-lg object-cover">
            @endif

            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900">{{ $student->name }}</h3>
                <p class="text-gray-600 text-sm">Email: {{ $student->email }}</p>
                <p class="text-gray-600 text-sm">Phone: {{ $student->phone }}</p>
                <p class="text-gray-600 text-sm">Age: {{ $student->age }}</p>
                <p class="text-gray-600 text-sm">Course: {{ $student->course->name ?? 'N/A' }}</p>

                <div class="mt-3 flex gap-4 items-center">
                    <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{ $students->links() }}
</div>
@endsection