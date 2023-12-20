<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class ManageCourseController extends Controller
{
    public function create(Student $student)
    {
        $courses = Course::all();

        return view('students.add-course', compact('student', 'courses'));
    }

    public function store(Request $request, Student $student)
    {
        $this->validate($request, [
            'course_id' => ['required'],
        ]);

        $student->courses()->attach([
            'course_id' => $request->course_id,
        ]);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully added student to the course.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('students.show', $student);
    }

    public function destroy(Request $request, Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully removed student to the course.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('students.show', $student);
    }
}
