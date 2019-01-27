<?php

namespace App\Http\Controllers;

// imports Apps or classes
use Illuminate\Http\Request;
use App\Visit;
use App\Doctor;
use App\Patient;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // we add middleware to prevent non-registered users to load doctors pages
     public function __construct()
     {
         $this->middleware('auth');
     }

     // returns the view doctors page when the url /doctors is requested
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index')->with([
            'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // when doctor create page is requested, this function gets executed and returns view doctor create
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // after submitting form creating a doctor, executes this function to run validations
     // and create a new object and saves it to database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'postal_address' => 'required|max:100',
            'phone_number' => 'required|size:10',
            'email_address' => 'required|email',
            'date_started' => 'required|date'
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->postal_address = $request->input('postal_address');
        $doctor->phone_number = $request->input('phone_number');
        $doctor->email_address = $request->input('email_address');
        $doctor->date_started = $request->input('date_started');
        $doctor->save();

        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // if a doctor page is requested, executes this function
     // to return doctor show view and the doctor data and visits by patients
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $visits = Visit::all();

        return view('doctors.show')->with([
            'doctor' => $doctor,
            'visits' => $visits
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // if doctor edit is requested, executes this to find the specific doctor
     // and returns a view to doctors edit with doctor data
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('doctors.edit')->with([
            'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // if doctor is edited and submitted, executes this function to validate new data
     // and updates the data in database to new entries and redirects to doctors page
    public function update(Request $request, $id)
    {
      $request->validate([
          'name' => 'required|max:100',
          'postal_address' => 'required|max:100',
          'phone_number' => 'required|size:9',
          'email_address' => 'required|email',
          'date_started' => 'required|date'
      ]);

      $doctor = Doctor::findOrFail($id);
      $doctor->name = $request->input('name');
      $doctor->postal_address = $request->input('postal_address');
      $doctor->phone_number = $request->input('phone_number');
      $doctor->email_address = $request->input('email_address');
      $doctor->date_started = $request->input('date_started');
      $doctor->save();

      return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // if doctor is requested to be deleted, executes this function
     // requiring a parameter to find the specific doctor to delete
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
