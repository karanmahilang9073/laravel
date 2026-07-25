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

    public function edit($id, Request $request) {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email,' .$id,
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course' => 'required|max:100'
        ]);
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'course' => $request->course,
        ]);
        return redirect('/students');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students');
    }
}