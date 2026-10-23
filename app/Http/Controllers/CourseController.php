<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Admin - All Courses Dekhega
    public function index()
    {
        $courses = Course::with('teacher')->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    // Admin - Course Create Form
    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.courses.create', compact('teachers'));
    }

    // Admin - Course Save Karega
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:courses',
            'department' => 'required',
            'teacher_id' => 'nullable',
        ]);

        Course::create($request->all());

        return redirect()->route('admin.courses.index')->with('success', 'Course Created!');
    }
}
