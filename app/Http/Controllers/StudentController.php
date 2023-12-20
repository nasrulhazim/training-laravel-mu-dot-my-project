<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    use PasswordValidationRules;

    public function __construct()
    {
        $this->authorizeResource(Student::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retrieve all students
        $students = Student::paginate(); // select * from students

        // return students listing with retrieved students.
        return view('students.index', compact('students'));

        // return view('students.index', ['pengguna' => $students]);

        // return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'ic' => ['required', 'string', 'max:255', 'unique:students'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'phone_number' => ['required', 'string', 'min:3', 'max:100'],
            'address' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        // store
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'ic' => $request->ic,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully created new student.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('students.show', $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // $this->authorize('view', $student);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // add validation rule unique
        // if the email input and the current student email
        // in database is not the same.
        $email_rules = ['required', 'string', 'email', 'max:255'];
        $ic_rules = ['required', 'string', 'max:255'];

        if($request->email != $student->email) {
            $email_rules[] = 'unique:students';
        }

        if($request->ic != $student->ic) {
            $ic_rules[] = 'unique:students';
        }

        $validation_rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => $email_rules,
            'ic' => $ic_rules,
            'phone_number' => ['required', 'string', 'min:3', 'max:100'],
            'address' => ['required', 'string', 'min:3', 'max:1000'],
        ];

        // validate
        $this->validate($request, $validation_rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'ic' => $request->ic,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        // update
        $student->update($data);

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully update the student.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        // flash message
        session()->flash('message', [
            'content' => 'You have successfully delete the student.',
            'type' => 'success'
        ]);

        // redirect
        return redirect()->route('students.index');
    }
}
