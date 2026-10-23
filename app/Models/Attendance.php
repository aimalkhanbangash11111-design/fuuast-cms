<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['student_id','course_id','date','status'];

    public function student(){ return $this->belongsTo(User::class, 'student_id'); }
    public function course(){ return $this->belongsTo(Course::class); }
}