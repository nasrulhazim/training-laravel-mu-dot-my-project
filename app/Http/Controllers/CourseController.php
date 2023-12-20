<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use PasswordValidationRules;

    public function __construct()
    {
        $this->authorizeResource(Course::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retrieve all courses
        $courses = Course::paginate(); // select * from courses

        // return courses listing with retrieved courses.
        return view('courses.index', compact('courses'));

        // return view('courses.index', ['pengguna' => $courses]);

        // return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        // store
        $course = Course::create([
            'name' => $request->name,
        ]);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully created new course.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('courses.show', $course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // $this->authorize('view', $course);

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // validate
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        // update
        $course->update($data);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully update the course.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('courses.show', $course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        $course->delete();

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully delete the course.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('courses.index');
    }
}
