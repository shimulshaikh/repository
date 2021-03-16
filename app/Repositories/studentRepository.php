<?php

namespace App\Repositories;
use App\Student;


/**
 * summary
 */
class studentRepository implements studentInterface
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

	public function all()
	{
		return Student::get();
	}

	public function get($id)
	{
		return Student::find($id);
	}

	public function store(array $data)
	{
		$student = new Student();
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->class = $data['class'];
        return $student->save();
	}

	public function update($id, array $data)
	{
		$student = Student::find($id);
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->class = $data['class'];
        return $student->update();
	}

	public function delete($id){
		$student = Student::find($id);
        return $student->delete();
	}


}