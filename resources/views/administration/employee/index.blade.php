@extends('administration.master')
@section('title','Employee Add')
@section('Employee_management','active')
@section('Emplpyee_Add','active')
@section('content')
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{ route('employeeAdd') }}">
                    @csrf
                    <div class=" mar-top" >
                        <div class="form-group row">
                                <div class="col-sm-12 " style="min-height: 150px">
                                    <label  class=" label label-default">Image Preview</label>
                                    <div id="preview"></div>
                                </div>
                        </div>{{--1 row--}}
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Name</label>
                                <input name="name" type="text" class="form-control form-control-sm" value="{{ old('name') }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Designation</label>
                                <input name="designation" type="text" class="form-control form-control-sm" value="{{ old('designation') }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Previous Station</label>
                                <input name="previous_station" type="text" class="form-control form-control-sm" value="{{ old('previous_station') }}" required >
                            </div>
                        </div>{{--2 row--}}
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label  class=" label label-default">Image</label>
                                <input type='file' id="image-preview" name="image" class="form-control" accept=".png, .jpg, .jpeg"  title="Choose Image" onclick="gritter_custom('image upload','Select good resolution images','The image you are going to select should be greater than 700X700 pixels for better quality ')"  >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Joining Date</label>
                                <input name="joining_date" type="date" class="form-control form-control-sm" value="{{ old('joining_date') }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Retirement Date</label>
                                <input name="retirement_date" type="date" class="form-control form-control-sm" value="{{ old('retirement_date') }}" required >
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">NID number</label>
                                <input name="nid_number" type="number" class="form-control form-control-sm" value="{{ old('nid_number') }}" required >
                            </div>
                        </div>{{--3 row--}}
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label  class=" label label-primary">Education</label>
                                <input name="education" type="text" class="form-control form-control-sm" value="{{ old('education') }}" required>
                            </div>
                            <div class="col-sm-2">
                                <label  class=" label label-primary">Phone</label>
                                <input name="phone" type="number" class="form-control form-control-sm" value="{{ old('phone') }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-primary">Email</label>
                                <input name="email" type="text" class="form-control form-control-sm" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label  class=" label label-default">D.O.B</label>
                                <input name="dob" type="date" class="form-control form-control-sm" value="{{ old('dob') }}" >
                            </div>
                        </div>{{--4 row--}}
                        {{--<div class="form-group row">

                        </div>--}}{{--5 row--}}
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Current Address</label>
                                <textarea  name="current_address" class="form-control " required >{{ old('current_address') }} </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label  class=" label label-primary">Permanent Address</label>
                                <textarea id="" name="permanent_address" class="form-control" required>{{ old('permanent_address') }}</textarea>
                            </div>
                        </div>{{--6 row--}}
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-lg center-block">+ Add Employee</button>
                            </div>
                        </div>{{--7 row--}}
                    </div>
                </form>
    </div>
@endsection
