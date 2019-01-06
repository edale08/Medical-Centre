@extends('layouts.app')

@section('title', 'Visits')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Visits</div>

                <div class="card-body">
                    <a href="{{ route('home') }}">Back to home</a> <br/>
                    <a href="{{ route('visits.create') }}" class="btn btn-outline-dark btn-sm">Add a visit</a>

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
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
