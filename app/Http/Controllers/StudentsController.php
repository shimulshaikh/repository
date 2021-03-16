<?php

namespace App\Http\Controllers;

use App\Repositories\studentRepository;

use Illuminate\Http\Request;
use Session;

class StudentsController extends Controller
{

    protected $student;

    public function __construct(studentRepository $student)
    {
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = Student::get();
        $students = $this->student->all();
        return view('student.index')->with(compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'class' => 'required'
        ]);

        
        $this->student->store($request->all());

        Session::flash('success', 'Student Added Successfully');

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->student->get($id);
        return view('student.edit')->with(compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'class' => 'required'
        ]);

        $this->student->update($id, $request->all());

        Session::flash('success', 'Student Updated Successfully');
        return redirect()->route('students.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->student->delete($id);

        Session::flash('success', 'Student Deleted Successfully');
        return redirect()->back(); 
    }
}
