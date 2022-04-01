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
                            <form action="{{ route('doctor.update' ,['id' => $doctor->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="col-form-label col-md-3">Department Name</label>
                                    <div class="col-md-9">
                                        <select name="department_id" class="form-control">
                                            <option value="{{ $doctor->department->id }}">{{$doctor->department->name}}</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row  mt-3">
                                    <label class="col-form-label col-md-3">Doctor Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
                                    </div>
                                </div>
                                <div class="row  mt-3">
                                    <label class="col-form-label col-md-3">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label class="col-form-label col-md-3">Fee</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="fee" value="{{ $doctor->fee }}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Update Doctor"/>
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

