<nav class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center gap-8">
        <span class="text-lg font-bold text-blue-600">StudentHub</span>
        <div class="flex gap-6">
            <a href="/" class="text-gray-600 hover:text-blue-600 font-medium transition">Home</a>
            <a href="/students" class="text-gray-600 hover:text-blue-600 font-medium transition">Students</a>
            <a href="{{ route('students.create') }}" class="text-gray-600 hover:text-blue-600 font-medium transition">Add Student</a>
        </div>
    </div>
</nav>