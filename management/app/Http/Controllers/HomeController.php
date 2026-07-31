<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller 
{
    public function dashboard() {
        $totalStudents = Student::count();
        return view('dashboard', compact('totalStudents'));
    }
}
