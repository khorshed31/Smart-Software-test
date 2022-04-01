@extends('master.master')

@section('title')
    Doctor Add
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
                            <form action="{{ route('doctor.new') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="col-form-label col-md-3">Department Name</label>
                                    <div class="col-md-9">
                                        <select name="department_id" class="form-control">
                                            <option value="">-- Select Department --</option>
                                            @foreach($departments as $department)
                                             <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row  mt-3">
                                    <label class="col-form-label col-md-3">Doctor Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                                <div class="row  mt-3">
                                    <label class="col-form-label col-md-3">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="phone"/>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label class="col-form-label col-md-3">Fee</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="fee"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Add Doctor"/>
                                        <a href="{{ route('doctor.manage') }}" class="btn btn-info">Manage Doctor</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
