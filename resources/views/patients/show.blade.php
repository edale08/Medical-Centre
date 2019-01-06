@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Patient details</div>

                <div class="card-body">

                    <form action="{{ route('patients.destroy', $patient)}}" method="POST">
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Name</td>
                          <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                          <td>Phone #</td>
                          <td>{{ $patient->phone_number }}</td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td>{{ $patient->postal_address }}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>{{ $patient->email_address }}</td>
                        </tr>
                        <tr>
                          <td>Insurance</td>
                          <td>{{ $patient->insurance }}</td>
                        </tr>
                        <tr>
                          <td>Company</td>
                          <td>{{ $patient->insurance_company }}</td>
                        </tr>
                        <tr>
                          <td>Policy #</td>
                          <td>{{ $patient->policy_number }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
