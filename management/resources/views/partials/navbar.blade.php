<nav class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-8">
            <span class="text-lg font-bold text-blue-600">StudentHub</span>
            <div class="flex gap-6">
                <a href="/" class="text-gray-600 hover:text-blue-600 font-medium transition">Home</a>
                <a href="/students" class="text-gray-600 hover:text-blue-600 font-medium transition">Students</a>
                <a href="{{ route('students.create') }}" class="text-gray-600 hover:text-blue-600 font-medium transition">Add Student</a>
            </div>
        </div>
        
        <div class="flex gap-6">
            @if(Auth::check())
            <a href="{{ route('profile.edit') }}" class="bg-blue-400 text-white hover:bg-blue-600 px-3 py-2 rounded font-medium transition">
                {{ Auth::user()->name }}
            </a>
            <form action="{{route('logout')}}" method="POST">
                @csrf 
                <button type="submit" class="bg-red-400 text-white hover:bg-red-700 px-3 py-2 rounded font-medium transition">
                    Logout
                </button>
            </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium transition">Login</a>
            @endif
        </div>
    </div>
</nav>