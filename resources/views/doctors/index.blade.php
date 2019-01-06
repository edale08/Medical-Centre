@extends('layouts.app')

@section('title', 'Doctors')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctors</div>

                <div class="card-body">
                    <a href="{{ route('home') }}">Back to home</a> <br/>
                    <a href="{{ route('doctors.create') }}" class="btn btn-outline-dark btn-sm">Add a doctor</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <td scope="col">Name</td>
                          <td scope="col">Address</td>
                          <td scope="col">Phone #</td>
                          <td scope="col">Email</td>
                          <td scope="col">Start Date</td>
                          <td scope="col">Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                          <td scope="row">{{ $doctor->name }}</td>
                          <td>{{ $doctor->postal_address }}</td>
                          <td>{{ $doctor->phone_number }}</td>
                          <td>{{ $doctor->email_address }}</td>
                          <td>{{ $doctor->date_started }}</td>
                          <td>
                              <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-outline-dark btn-sm">View</a>
                              <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                              <form action="{{ route('doctors.destroy', $doctor)}}" method="POST">
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
