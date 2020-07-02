@extends('administration.master')
@section('title','Employee Details')
@section('Employee_management','active')
@section('All_Emplpyee','active')
@section('content')
<div style="padding:15px;">
    <section>

        <div class="row" style="border-bottom:3px solid; margin-top:10px;">

            <div class="col-md-2">
                <img style="width:80px; height:80px;" src="{{ asset('assets/administration/images/icon/cdblogo.png') }}" alt="">
            </div>

            <div class="col-md-8">
                <h1 style="font-size:40px; text-align:center;">Cotton Development Board</h1>
                <h3 style="text-align:center; margin-left:-10%;">Founded:1972</h3>
            </div>

            <div class="col-md-2">
                <img style="width:80px; height:80px; " src="{{ asset('assets/administration/images/icon/bdlogo.png') }}" alt="">
            </div>

        </div>


    </section>

    <section>
        <div class="row">

            <div class="col-md-2">
                <img style="width: 150px; height: 150px; " src="{{ asset('assets/administration/images/employees/') }}/{{$employee->image}}" alt="">
            </div>
            <div class="col-md-10">
                <h2> <span style="font-weight:bold;">Name</span> : {{ $employee->name }}</h1>
                    <h2> <span style="font-weight:bold;">Designation</span> : {{ $employee->designation }}</p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">

                <h3 style="font-weight:bold;">Official Information</h3>
                <p><span style="font-weight:bold;">Joining Date</span> : {{ $employee->joining_date }}</p>
                <p><span style="font-weight:bold;">Retirement Date</span> : {{ $employee->retirement_date }}
                    <b>[ @php
                        use Carbon\Carbon;
                        use Carbon\CarbonInterface;
                        $retire = $employee->retirement_date;
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
                    @endphp ]</b>
                </p>
                <p><span style="font-weight:bold;">Previous Station</span> : {{ $employee->previous_station }}</p>
                <p> <span style="font-weight:bold;">NID Number</span> : {{ $employee->nid_number }}</p>
            </div>
            <div class="col-md-6">
                <h3 style="font-weight:bold;">Personal Information </h3>
                <p> <span style="font-weight:bold;">Current Address</span> : {{ $employee->current_address }}</p>
                <p> <span style="font-weight:bold;">Permanent Address</span> : {{ $employee->permanent_address }}</p>
                <p> <span style="font-weight:bold;">Phone</span> : {{ $employee->phone }}</p>
                <p> <span style="font-weight:bold;">Email</span> : {{ $employee->email }}</p>
                <p> <span style="font-weight:bold;">Date of Birth</span> : {{ $employee->dob }}</p>
                <p> <span style="font-weight:bold;">Education</span> : {{ $employee->education }}</p>
            </div>
        </div>
    </section>

</div>
@endsection
