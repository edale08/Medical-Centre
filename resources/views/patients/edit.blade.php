@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Patient<br/><a href="{{ route('patients.index') }}">Back to all patients</a></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.update', $patient) }}" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">

                      <table class="table">
                        <tbody>
                          <tr>
                              <td>Name</td>
                              <td><input class="form-control" type="text" name="name" value="{{ old('name', $patient->name) }}" />
                              <div class="errors text-danger">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Phone #</td>
                              <td><input class="form-control" type="text" name="phone_number" value="{{ old('phone_number', $patient->phone_number) }}" />
                              <div class="errors text-danger">{{ ($errors->has('phone_number')) ? $errors->first('phone_number') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Address</td>
                              <td><input class="form-control" type="text" name="postal_address" value="{{ old('postal_address', $patient->postal_address) }}" />
                              <div class="errors text-danger">{{ ($errors->has('postal_address')) ? $errors->first('postal_address') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td><input class="form-control" type="text" name="email_address" value="{{ old('email_address', $patient->email_address) }}" />
                              <div class="errors text-danger">{{ ($errors->has('email_address')) ? $errors->first('email_address') : "" }}</div></td>
                          </tr>
                          <tr>
                            <td>Insurance</td>
                            <td>
                              <select class="form-control" name="insurance">
                                <option value="0" {{ (old('insurance', $patient->insurance) == 0) ? "selected" : "" }}>I don't have</option>
                                <option value="1" {{ (old('insurance', $patient->insurance) == 1) ? "selected" : "" }}>I have</option>
                              </select>
                              @if ($errors->has('insurance'))
                                <div class="errors text-danger"> {{ $errors->first('insurance') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr>
                              <td>Company</td>
                              <td><input class="form-control" type="text" name="insurance_company" value="{{ old('insurance_company', $patient->insurance_company) }}" />
                              <div class="errors text-danger">{{ ($errors->has('insurance_company')) ? $errors->first('insurance_company') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Policy #</td>
                              <td><input class="form-control" type="text" name="policy_number" value="{{ old('policy_number', $patient->policy_number) }}" />
                              <div class="errors text-danger">{{ ($errors->has('policy_number')) ? $errors->first('policy_number') : "" }}</div></td>
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
