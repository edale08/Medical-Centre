<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\Doctor;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index')->with([
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('insurance')==1) {
            $request->validate([
                'name' => 'required|max:100',
                'phone_number' => 'required|max:10',
                'postal_address' => 'required|max:100',
                'email_address' => 'required|email',
                'insurance' => 'required',
                'insurance_company' => 'required|max:100',
                'policy_number' => 'required|max:13'
            ]);
        }
        else {
            $request->validate([
                'name' => 'required|max:100',
                'phone_number' => 'required|max:10',
                'postal_address' => 'required|max:100',
                'email_address' => 'required|email',
                'insurance' => 'required'
            ]);
        }
        
        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->phone_number = $request->input('phone_number');
        $patient->postal_address = $request->input('postal_address');
        $patient->email_address = $request->input('email_address');
        $patient->insurance = $request->input('insurance');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->policy_number = $request->input('policy_number');
        $patient->save();

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.show')->with([
            'patient' => $patient
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
        $patient = Patient::findOrFail($id);

        return view('patients.edit')->with([
            'patient' => $patient
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
        $request->validate([
            'name' => 'required|max:100',
            'phone_number' => 'required|max:10',
            'postal_address' => 'required|max:100',
            'email_address' => 'required|email',
            'insurance' => 'required'
            //'insurance_company' => 'required|max:100',
            //'policy_number' => 'required|max:13'
        ]);

        $patient = Patient::findOrFail($id);
        $patient->name = $request->input('name');
        $patient->phone_number = $request->input('phone_number');
        $patient->postal_address = $request->input('postal_address');
        $patient->email_address = $request->input('email_address');
        $patient->insurance = $request->input('insurance');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->policy_number = $request->input('policy_number');
        $patient->save();

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
