@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    <div class="text-center mb-10">
        <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">
            Student Hub
        </span>

        <h1 class="text-5xl font-extrabold text-gray-900 mt-2">
            Welcome to Student Management System
        </h1>

        <p class="text-gray-600 text-lg mt-4">
            Manage students, courses, and records in one simple, organized dashboard.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-gray-500 text-sm">Total Students</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalStudents }}</p>
        </div>
    </div>

</div>
@endsection