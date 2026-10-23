<?php

namespace App\Models;
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Teacher - Show form
    public function create(Course $course)
    {
        $students = User::where('role','student')->get();
        return view('teacher.attendance', compact('course','students'));
    }

    // Teacher - Save attendance
    public function store(Request $request, Course $course)
    {
        $date = $request->date ?? date('Y-m-d');
        foreach($request->attendance as $student_id => $status){
    Attendance::updateOrCreate(
        ['student_id'=>$student_id, 'course_id'=>$course->id, 'date'=>$request->date],
        ['status'=>strtolower($status)]
    );
}
        return back()->with('success','Attendance Saved!');
    }

    // Student - My attendance
    public function myAttendance()
    {
        $attendances = Attendance::where('student_id', auth()->id())->get();
        return view('student.attendance', compact('attendances'));
    }
}