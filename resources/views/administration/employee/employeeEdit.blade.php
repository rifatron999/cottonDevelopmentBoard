@extends('administration.master')
@section('title','Employee Edit')
@section('Employee_management','active')
@section('All_Emplpyee','active')
@section('content')
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{ route('employeeUpdate') }}">
                    @csrf
                    <div class=" mar-top" >
                        <div class="form-group row">
                                <div class="col-sm-8 " style="min-height: 150px">
                                    <label  class=" label label-default">Image Preview</label>
                                    <div id="preview"></div>
                                </div>
                            <div class="col-sm-4 form-style" style="min-height: 150px">
                                <label  class=" label label-default">Published Images</label>
                                <p >

                                        <img src="{{ asset('assets/administration/images/employees/') }}/{{$employee->image}}" class="imgss center-block inline-block"  alt="">

                                </p>
                            </div>
                        </div>{{--1 row--}}
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ $employee->name }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Designation</label>
                                <input name="designation" type="text" class="form-control form-control-sm" value="{{ $employee->designation }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Previous Station</label>
                                <input name="previous_station" type="text" class="form-control form-control-sm" value="{{ $employee->previous_station }}" required >
                            </div>
                        </div>{{--2 row--}}
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label  class=" label label-default">Image</label>
                                <input type='file' id="image-preview" name="image" class="form-control" accept=".png, .jpg, .jpeg"  title="Choose Image"   >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Joining Date</label>
                                <input name="joining_date" type="date" class="form-control form-control-sm" value="{{ $employee->joining_date }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Retirement Date</label>
                                <input name="retirement_date" type="date" class="form-control form-control-sm" value="{{ $employee->retirement_date }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">NID number</label>
                                <input name="nid_number" type="number" class="form-control form-control-sm" value="{{ $employee->nid_number }}" required >
                            </div>
                        </div>{{--3 row--}}
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Education</label>
                                <input name="education" type="text" class="form-control form-control-sm" value="{{ $employee->education }}" required>
                            </div>
                            <div class="col-sm-2">
                                <label  class=" label label-primary">Phone</label>
                                <input name="phone" type="number" class="form-control form-control-sm" value="{{ $employee->phone }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Email</label>
                                <input name="email" type="text" class="form-control form-control-sm" value="{{ $employee->email }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-default">D.O.B</label>
                                <input name="dob" type="date" class="form-control form-control-sm" value="{{ $employee->dob }}" >
                            </div>
                        </div>{{--4 row--}}
                        {{--<div class="form-group row">

                        </div>--}}{{--5 row--}}
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Current Address</label>
                                <textarea  name="current_address" class="form-control " required >{{ $employee->current_address }} </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Permanent Address</label>
                                <textarea id="" name="permanent_address" class="form-control" required>{{ $employee->permanent_address }}</textarea>
                            </div>
                        </div>{{--6 row--}}
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input name="id" type="text" value="{{$employee->id}}" class="form-control form-control-sm" style="display: none">
                                <button type="submit" class="btn btn-success btn-lg center-block"> Update</button>
                            </div>
                        </div>{{--7 row--}}
                    </div>
                </form>
    </div>
@endsection
