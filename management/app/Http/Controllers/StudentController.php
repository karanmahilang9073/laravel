<?php

namespace App\Http\Controllers;

use App\models\Student;
use Illuminate\Http\Request;

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
            'course' => 'required|max:100' 
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course' => $request->course
        ]);
        return redirect('/students');
    }

    public function create() {
        return view('students.create');
    }

    public function edit(Student $student) {
        return view('students.edit', compact('student'));
    }

    public function update( Request $request, Student $student){
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email,' .$student->id,
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course' => 'required|max:100'
        ]);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course' => $request->course,
        ]);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index');
    }
}