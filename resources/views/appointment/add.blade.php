@extends('master.master')

@section('title')
    Appointment Doctor
@endsection

@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 bg-light">
                    <h6 class="text-warning text-center">{{ Session::get('message') }}</h6>
                    <form action="{{ route('appointment.new') }}" method="POST" class="m-2 my-5 me-auto">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Appointment Date</strong></label>
                            <input type="date" class="form-control" name="appointment_date"/>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Select Department</strong></label>
                            <select name="department_id" class="form-control department_id" id="department_id">
                                <option value="">--- Select ---</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Select Doctor</strong></label>
                            <select name="doctor_id" class="form-control doctor_id" id="doctor_id">
                                <option value="">--- Select ---</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Fee</strong></label>
                            <input type="text" class="form-control fee" id="fee" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"></label>
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
                <div class="col-6 bg-secondary">
                    <div class="col-md-10 mx-auto mt-5">
                        <div class="card bg-transparent">
                            <div class="card-body ">
                                <h6 class="text-success text-center">{{ Session::get('message') }}</h6>
                                <table class="table table-striped text-white">
                                    <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">App. Date</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $appointment->appointment_date }}</td>
                                            <td>{{ \App\Models\Doctor::find($appointment->doctor_id)->name }}</td>
                                            <td>{{ \App\Models\Doctor::find($appointment->doctor_id)->fee }}</td>
                                            <td>
                                                <a href="{{ route('appointment.delete', ['id'=> $appointment->id]) }}" class="btn btn-danger btn-sm">
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
                    <div class="col-md-10 mx-auto my-5">
                        <div class="card bg-white">
                            <div class="card-body ">
                                <form action="">
                                    <div class="row g-3">
                                        <strong>Patient Information</strong>
                                        <div class="col">
                                            <input type="text" class="form-control" name="patient_name" placeholder="Patient name">
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" name="patient_phone" placeholder="Patient Phone">
                                    </div>
                                    <div class="row g-3">
                                        <strong>Payment</strong>
                                        <div class="col">
                                            <input type="number" class="form-control" name="total_fee" placeholder="Total Fee" readonly>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" name="paid_amount" placeholder="Paid Amount" aria-label="Last name">
                                        </div>
                                    <br>
                                    <div class="row g-3">
                                        <input type="submit" class="btn btn-primary d-block" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>
                            </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.department_id',function(){
                // console.log("hmm its change");

                var dept_id=$(this).val();
                //console.log(dept_id);
                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{{ route('doctor.get') }}',
                    data:{'id':dept_id},
                    success:function(data){
                        //console.log('success');

                        //console.log(data);

                        //console.log(data.length);
                        op+='<option>chose doctor</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }

                        div.find('.doctor_id').html(" ");
                        div.find('.doctor_id').append(op);
                    },
                    error:function(){

                    }
                });
            });

            $(document).on('change','.doctor_id',function () {
                var doc_id=$(this).val();

                var a=$(this).parent();
                //console.log(doc_id);
                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('find-fee')!!}',
                    data:{'id':doc_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        //console.log("fee");
                        //console.log(data.fee);

                        a.find('.fee').val(data.fee);

                    },
                    error:function(){

                    }
                });


            });

        });
    </script>

@endsection

