<?php

namespace App\Http\Controllers;

use App\Student;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$client = new Client([
			'timeout' => 50.0,
		]);
		$response = $client->request('GET', 'https://swapi.dev/api/people/');
		$json_response = json_decode($response->getBody());
		$api_results = $json_response->results;
		foreach ($api_results as $key => $api_result) {
			$student = Student::firstOrNew([
				'name' => $api_result->name,
			]);
			$student->height = $api_result->height;
			$student->mass = $api_result->mass;
			$student->hair_color = $api_result->hair_color;
			$student->skin_color = $api_result->skin_color;
			$student->save();
		}
		$students = Student::all();
		return view('student.list', compact('students', 'students'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view('student.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$request->validate([
			'name' => 'required',
			'height' => 'required',
			'mass' => 'required',
		]);
		$student = new Student([
			'name' => $request->name,
			'height' => $request->height,
			'mass' => $request->mass,
			'hair_color' => $request->hair_color,
			'skin_color' => $request->skin_color,
		]);

		$student->save();

		return redirect('/student')->with('success', 'Student has been added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Student  $student
	 * @return \Illuminate\Http\Response
	 */
	public function show(Student $student) {
		//
		return view('student.view', compact('student'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Student  $student
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Student $student) {
		//
		return view('student.edit', compact('student'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Student  $student
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//

		$request->validate([
			'name' => 'required',
			'height' => 'required',
			'mass' => 'required',
		]);

		$student = Student::find($id);
		$student->name = $request->name;
		$student->height = $request->height;
		$student->mass = $request->mass;
		$student->hair_color = $request->hair_color;
		$student->skin_color = $request->skin_color;
		$student->update();

		return redirect('/student')->with('success', 'Student updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Student  $student
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Student $student) {
		//
		$student->delete();
		return redirect('/student')->with('success', 'Student deleted successfully');
	}
	public function getData(Student $student) {
		$client = new Client([
			'timeout' => 50.0,
		]);
		$response = $client->request('GET', 'https://swapi.dev/api/people/');
		$json_response = json_decode($response->getBody());
		$students = $json_response->results;
		return view('student.api', compact('students', 'students'));
	}
}
?>