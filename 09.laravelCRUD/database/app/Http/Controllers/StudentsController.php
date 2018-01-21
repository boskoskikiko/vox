<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;
use App\Student;
use App\School;

class StudentsController extends Controller
{
    
    public function index(Request $request) {

		$students = Student::all();

		return view('students.index', compact('students'));

	}

	public function create(Request $request) {

		$schools = School::all();

		return view('students.create', compact('schools'));
	}

	public function store(StudentsRequest $request) {

		$student = new Student();
		$student->first_name = $request->first_name;
		$student->last_name = $request->last_name;
		$student->birthdate = $request->birthdate;
		$student->school_id = $request->school_id;

		$now = md5(date("Y-m-d H:i:s"));

		$student->picture =  $request->picture->storeAs('images', $now.'_image.jpg');

		$student->save();

		return redirect('students');

	}

	public function edit(Request $request) {

		$student = Student::findOrFail($request->id);

		$schools = School::all();

		return view('students.edit')->with([
			'student' => $student,
			'schools' => $schools
		]);
	}


	public function update(Request $request) {

		$student = Student::findOrFail($request->id);

		if ($request->hasFile('picture')) {
			$now = md5(date("Y-m-d H:i:s"));
		    $student->picture =  $request->picture->storeAs('images', $now.'_updated_image.jpg');
		} 

		$student->first_name = $request->first_name;
		$student->last_name = $request->last_name;
		$student->birthdate = $request->birthdate;
		$student->school_id = $request->school_id;

		$student->save();

		return redirect('students');
	}

}
