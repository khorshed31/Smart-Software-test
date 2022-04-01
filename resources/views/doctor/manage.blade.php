@extends('master.master')

@section('title')
    Manage Doctor
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card bg-light">
                        <div class="card-header text-center">
                            <h4> Add Doctor</h4>
                        </div>
                        <div class="card-body">
                            <h6 class="text-success text-center">{{ Session::get('message') }}</h6>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Fee</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->department->name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->fee }}</td>
                                        <td>
                                            <a href="{{ route('doctor.edit', ['id'=> $doctor->id]) }}" class="btn btn-success btn-sm">
                                                edit
                                            </a>
                                            <a href="{{ route('doctor.delete', ['id'=> $doctor->id]) }}" class="btn btn-danger btn-sm">
                                                delete
                                            </a>
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
    </section>
@endsection
