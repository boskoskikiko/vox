<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Http\Requests\SchoolsRequest;

class SchoolsController extends Controller
{


	public function index(Request $request) {

		$schools = School::paginate(2);

		//return $schools;

		return view('schools.index', compact('schools'));

	}


	public function create(Request $request) {

		return view('schools.create');
	}


	// public function store(SchoolsRequest $request) {
	public function store(Request $request) {

		$this->validate(request(), [
			'name' => 'required',
            'address' => 'required',
            'maxStudents' => 'required',
            'fee' => 'required',
        ]);
		

		$school = new School();
		$school->name = $request->name;
		$school->address = $request->address;
		$school->maxStudents = $request->maxStudents;
		$school->fee = $request->fee;

		$school->save();

		return redirect('/schools');
	}

	/*
	Display form to edit a record
	*/
	public function edit(Request $request) {

		$school = School::findOrFail($request->id);

		return view('schools.edit')->with('school', $school);
	}

	/* Update record */
	public function update(SchoolsRequest $request) {

		$school = School::findOrFail($request->id);

		$school->name = $request->name;
		$school->address = $request->address;
		$school->maxStudents = $request->maxStudents;
		$school->fee = $request->fee;

		$school->save();

		return redirect('/schools');
	}


	public function delete(Request $request) {


		$school = School::find($request->id);

		$school->delete();

		return redirect('/schools');
	}

	public function destroy(Request $request) {


		$school = School::find($request->id);

		$school->delete();

		return redirect('/schools');
	}
}
