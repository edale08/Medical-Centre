@extends('layouts.app')

@section('title', 'Doctor Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctor details</div>

                <div class="card-body">

                    <form action="{{ route('doctors.destroy', $doctor)}}" method="POST">
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Name</td>
                          <td>{{ $doctor->name }}</td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td>{{ $doctor->postal_address }}</td>
                        </tr>
                        <tr>
                          <td>Phone #</td>
                          <td>{{ $doctor->phone_number }}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>{{ $doctor->email_address }}</td>
                        </tr>
                        <tr>
                          <td>Date Started</td>
                          <td>{{ $doctor->date_started }}</td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="row">
                      <div class="col"><p class="h4">Visits</p></div>
                      <div class="col"><p class="text-right"><a href="{{ route('visits.create') }}" class="btn btn-outline-dark btn-sm">Add a visit</a></p></div>
                    </div>

                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <td scope="col">Date</td>
                          <td scope="col">Time</td>
                          <td scope="col">Duration</td>
                          <td scope="col">Patient</td>
                          <td scope="col">Doctor</td>
                          <td scope="col">Cost</td>
                          <td scope="col">Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($visits as $visit)
                        @if (($visit->doctor_id)==($doctor->id))
                        <tr>
                          <td>{{ $visit->date_visit }}</td>
                          <td>{{ substr(($visit->time_visit ),0,-3) }}</td>
                          <td>{{ $visit->duration }}</td>
                          <td>{{ $visit->patient->name }}</td>
                          <td scope="row">{{ $visit->doctor->name }}</td>
                          <td>{{ $visit->cost }}</td>
                          <td>
                            <a href="{{ route('visits.show', $visit->id) }}" class="btn btn-outline-dark btn-sm">View</a>
                            <a href="{{ route('visits.edit', $visit->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="{{ route('visits.destroy', $visit)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
