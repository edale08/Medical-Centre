@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a Patient</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <table class="table">
                        <tbody>
                          <tr>
                              <td>Name</td>
                              <td><input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                              <div class="errors text-danger">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Phone</td>
                              <td><input class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}" />
                              <div class="errors text-danger">{{ ($errors->has('phone_number')) ? $errors->first('phone_number') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Address</td>
                              <td><input class="form-control" type="text" name="postal_address" value="{{ old('postal_address') }}" />
                              <div class="errors text-danger">{{ ($errors->has('postal_address')) ? $errors->first('postal_address') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td><input class="form-control" type="text" name="email_address" value="{{ old('email_address') }}" />
                              <div class="errors text-danger">{{ ($errors->has('email_address')) ? $errors->first('email_address') : "" }}</div></td>
                          </tr>
                          <tr>
                            <td>Insurance</td>
                            <td>
                              <select id="mySelect" class="form-control" name="insurance" onchange="myFunction()">
                                <option value="0" {{ (old('insurance') == 0) ? "selected" : "" }}>I don't have an insurance</option>
                                <option value="1" {{ (old('insurance') == 1) ? "selected" : "" }}>I have an insurance</option>
                              </select>
                              @if ($errors->has('insurance'))
                                <div class="errors text-danger"> {{ $errors->first('insurance') }} </div>
                              @endif
                            </td>
                          </tr>
                          <tr >
                              <td>Company</td>
                              <td><input id="insurance_company_check" class="form-control" type="text" name="insurance_company" value="{{ old('insurance_company') }}" disabled/>
                              <div class="errors text-danger">{{ ($errors->has('insurance_company')) ? $errors->first('insurance_company') : "" }}</div></td>
                          </tr>
                          <tr >
                              <td>Policy #</td>
                              <td><input id="policy_number_check" class="form-control" type="text" name="policy_number" value="{{ old('policy_number') }}" disabled/>
                              <div class="errors text-danger">{{ ($errors->has('policy_number')) ? $errors->first('policy_number') : "" }}</div></td>
                          </tr>

                          <script>
                          function myFunction() {
                            var x = document.getElementById("mySelect").value;

                            if(x == 1){
                                document.getElementById("insurance_company_check").removeAttribute("disabled");
                                document.getElementById("policy_number_check").removeAttribute("disabled");
                            }
                            else {
                                document.getElementById("insurance_company_check").setAttribute("disabled","");
                                document.getElementById("policy_number_check").setAttribute("disabled","");
                            }
                          }
                          </script>

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
