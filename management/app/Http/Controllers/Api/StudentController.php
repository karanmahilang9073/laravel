<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course_id' => 'required|exists:courses,id',
        ]);
        $student = Student::create($validate);
        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:50',
            'email'  => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits:10',
            'age' => 'required|integer|min:18|max:60',
            'course_id' => 'required|exists:courses,id'
        ]);
        $student->update($validate);
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'student deleted successfully'], 200);
    }
}
