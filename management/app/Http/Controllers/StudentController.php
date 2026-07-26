<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course_id' => 'required|exists:courses,id' 
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course_id' => $request->course_id,
        ]);
        return redirect('/students');
    }

    public function create() {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function edit(Student $student) {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update( Request $request, Student $student){
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
        $student->delete();
        return redirect()->route('students.index');
    }
}