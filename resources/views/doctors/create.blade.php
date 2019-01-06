@extends('layouts.app')

@section('title', 'Add Doctor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a doctor</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <table class="table">
                        <tbody>
                          <tr>
                              <td>Name</td>
                              <td><input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                              <div class="errors text-danger">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</div></td>

                          </tr>
                          <tr>
                              <td>Address</td>
                              <td><input class="form-control" type="text" name="postal_address" value="{{ old('postal_address') }}" />
                              <div class="errors text-danger">{{ ($errors->has('postal_address')) ? $errors->first('postal_address') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Phone</td>
                              <td><input class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}" />
                              <div class="errors text-danger">{{ ($errors->has('phone_number')) ? $errors->first('phone_number') : "" }}</div></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td><input class="form-control" type="text" name="email_address" value="{{ old('email_address') }}" />
                              <div class="errors text-danger">{{ ($errors->has('email_address')) ? $errors->first('email_address') : "" }}</div></td>
                          </tr>
                          <tr>
                            <td>Start Date</td>
                            <td>
                              <input class="form-control" type="date" name="date_started" value="{{ old('date_started') }}">
                              @if ($errors->has('date_started'))
                                <div class="errors text-danger"> {{ $errors->first('date_started') }} </div>
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
