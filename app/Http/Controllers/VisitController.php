<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Doctor;
use App\Patient;
use Validator;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::all();

        return view('visits.index')->with([
            'visits' => $visits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('visits.create')->with([
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'date_visit' => 'required|date',
            'time_visit' => 'required|regex:/^[0-9]{2}:[0-9]{2}$/'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (strtotime($request->input('time_visit')) === FALSE) {
                $validator->errors()->add('time_visit', 'Invalid time value!!');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $visit = new Visit();
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->date_visit = $request->input('date_visit');
        $visit->time_visit = $request->input('time_visit');

        $visit->save();

        return redirect()->route('visits.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('visits.show')->with([
            'visit' => $visit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visit = Visit::findOrFail($id);

        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('visits.edit')->with([
            'visit' => $visit,
            'doctors' => $doctors,
            'patients' => $patients
        ]);

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
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'date_visit' => 'required|date',
            'time_visit' => 'required|regex:/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (strtotime($request->input('time_visit')) === FALSE) {
                $validator->errors()->add('time_visit', 'Invalid time value!!');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $visit = Visit::findOrFail($id);
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->date_visit = $request->input('date_visit');
        $visit->time_visit = $request->input('time_visit');

        $visit->save();

        return redirect()->route('visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect()->route('visits.index');
    }
}
