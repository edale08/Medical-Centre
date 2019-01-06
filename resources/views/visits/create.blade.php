@extends('layouts.app')

@section('title', 'Add Visit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a visit</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visits.store') }}" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Date</td>
                            <td>
                              <input class="form-control" type="date" name="date_visit" value="{{ old('date_visit') }}">
                              @if ($errors->has('date_visit'))
                                <div class="errors text-danger"> {{ $errors->first('date_visit') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Time</td>
                            <td>
                              <input class="form-control" type="time" name="time_visit" value="{{ old('time_visit') }}">
                              @if ($errors->has('time_visit'))
                                <div class="errors text-danger"> {{ $errors->first('time_visit') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Patient</td>
                            <td>
                              <select class="form-control" name="patient_id">
                                <option>Select a patient</option>
                                @foreach ($patients as $p)
                                <option value="{{ $p->id }}" {{ (old('patient_id') == $p->id) ? "selected" : "" }}>{{ $p->name }}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('patient_id'))
                                <div class="errors text-danger"> {{ $errors->first('patient_id') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Doctor</td>
                            <td>
                              <select class="form-control" name="doctor_id">
                                <option>Select a doctor</option>
                                @foreach ($doctors as $d)
                                <option value="{{ $d->id }}" {{ (old('doctor_id') == $d->id) ? "selected" : "" }} >{{ $d->name }}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('doctor_id'))
                                <div class="errors text-danger"> {{ $errors->first('doctor_id') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                              <button class="form-control btn btn-primary" type="submit" value="Store">Submit</button>
                            </td>
                          </tr>

                        </tbody>
                      </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
