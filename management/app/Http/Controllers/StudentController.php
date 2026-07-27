<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        $this->authorize('viewAny', Student::class);
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    public function store(Request $request) {

        $this->authorize('create', Student::class);

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course_id' => 'required|exists:courses,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photoPath = null;
        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course_id' => $request->course_id,
            'photo' => $photoPath,
        ]);
        return redirect('/students');
    }

    public function create() {
        $this->authorize('create', Student::class);
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function edit(Student $student) {
        $this->authorize('update', $student);
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update( Request $request, Student $student){
        $this->authorize('update', $student);
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email,' .$student->id,
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course_id' => 'required|exists:courses,id'
        ]);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course_id' => $request->course_id,
        ]);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student){
        $this->authorize('delete', $student);
        $student->delete();
        return redirect()->route('students.index');
    }
}