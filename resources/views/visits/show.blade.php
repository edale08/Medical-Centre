@extends('layouts.app')

@section('title', 'Visit Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Visit details</div>

                <div class="card-body">

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Date</td>
                          <td>{{ $visit->date_visit }}</td>
                        </tr>
                        <tr>
                          <td>Time</td>
                          <td>{{ $visit->time_visit }}</td>
                        </tr>
                        <tr>
                          <td>Duration</td>
                          <td>{{ $visit->duration }}</td>
                        </tr>
                        <tr>
                          <td>Patient</td>
                          <td>{{ $visit->patient->name }}</td>
                        </tr>
                        <tr>
                          <td>Doctor</td>
                          <td>{{ $visit->doctor->name }}</td>
                        </tr>
                        <tr>
                          <td>Cost</td>
                          <td>{{ $visit->cost }}</td>
                        </tr>

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
