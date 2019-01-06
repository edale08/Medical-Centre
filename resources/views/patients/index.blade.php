@extends('layouts.app')

@section('title', 'Patients')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Patients</div>

                <div class="card-body">
                    <a href="{{ route('home') }}">Back to home</a> <br/>
                    <a href="{{ route('patients.create') }}" class="btn btn-outline-dark btn-sm">Add a patient</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table small">
                      <thead class="thead-light">
                        <tr>
                          <td scope="col">Name</td>
                          <td scope="col">Phone #</td>
                          <td scope="col">Address</td>
                          <td scope="col">Email</td>
                          <td scope="col">Insurance</td>
                          <td scope="col">Ins. Company</td>
                          <td scope="col">Policy #</td>
                          <td scope="col">Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                          <td scope="row">{{ $patient->name }}</td>
                          <td>{{ $patient->phone_number }}</td>
                          <td>{{ $patient->postal_address }}</td>
                          <td>{{ $patient->email_address }}</td>
                          @if ($patient->insurance != NULL)
                          <td>{{ $patient->insurance }}</td>
                          <td>{{ $patient->insurance_company }}</td>
                          <td>{{ $patient->policy_number }}</td>
                          @else
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          @endif
                          <td>
                              <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-outline-dark btn-sm">View</a>
                              <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                              <form action="{{ route('patients.destroy', $patient)}}" method="POST">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button class="btn btn-outline-danger btn-sm">Delete</button>
                              </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
