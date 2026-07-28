@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center text-center py-24 px-6">
    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide mb-3">Student Hub</span>
    <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Welcome to Student Management System</h1>
    <p class="text-gray-600 text-lg max-w-xl mb-8">Manage students, courses, and records in one simple, organized dashboard.</p>
    <a href="{{ route('students.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
        View Students
    </a>
</div>
@endsection