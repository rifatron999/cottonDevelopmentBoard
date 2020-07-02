@extends('administration.master')
@section('title','All Employee')
@section('Employee_management','active')
@section('All_Emplpyee','active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center">All Employee</h1>
            @php
                use Carbon\Carbon;
                use Carbon\CarbonInterface;
            @endphp
            <table class="table table-striped table-hover table-bordered" id="employee_table" width="100%" cellspacing="0" >
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">NID</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Retirement</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $key => $s)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if(empty($s->image))
                                <img src="{{ asset('assets/administration/images/icon/no_image.jpg') }}" class="img" alt="" style="height: 50px; width: 50px;">
                            @else
                                @php
                                    $imgarray = json_decode($s->image);
                                @endphp
                                <img src="{{ asset('assets/administration/images/employees/') }}/{{$s->image}}" class="img" alt="" style="height: 50px; width: 50px;">
                            @endif
                        </td>
                        <td>{{$s->name}}</td>
                        <td>{{$s->designation}}</td>
                        <td>{{$s->nid_number}}</td>
                        <td>{{$s->phone}}</td>
                        <td>{{$s->email}}</td>
                        <td>
                            @php
                                $retire = $s->retirement_date;
                                $now = Carbon::now();
                                $retire_carbon = Carbon::parse($retire);
                                 if($now->diffInDays($retire_carbon) == 0)
                            {
                                echo 'today';
                            }
                            else
                            {
                                echo $retire_carbon->diffForHumans($now, [
                                'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS
                            ]);
                            }
                            @endphp
                        </td>
                        <td>
                            <a href="{{route('employeeDetails',Crypt::encrypt($s->id))}}" title="See Details" target="_blank" class="btn btn-primary "><i class="fas fa-arrow-circle-right"></i> </a>
                            <a href="{{route('employeeDetailsPdf',Crypt::encrypt($s->id))}}" title="Downlode Employee Details" class="btn btn-default "><i class="fas fa-file-invoice-dollar"></i> </a>
                            <a class="btn btn-success"  href="{{route('employeeEditView',Crypt::encrypt($s->id))}}" target="_blank" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('employeeRemove',Crypt::encrypt($s->id))}}" title="Remove Employee" onclick="return confirm('Are you sure ?')" class="btn btn-danger "><i class="fas fa-trash"></i> </a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
