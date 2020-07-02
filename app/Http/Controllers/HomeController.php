<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('administration/dashboard/index');
    }

    public function employeeAddView()
    {
        return view('administration/employee/index');
    }
    public function employeeAdd(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'previous_station' => 'required',
            'joining_date' => 'required',
            'retirement_date' => 'required',
            'nid_number' => 'required|unique:employees',
            'education' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'current_address' => 'required|max:200',
            'permanent_address' => 'required|max:200',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $image = $request->file('image');
        if(!empty($image))
        {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/administration/images/employees/',$image_name);

            Employee::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'previous_station' => $request->previous_station,
                'joining_date' => $request->joining_date,
                'retirement_date' => $request->retirement_date,
                'image' => $image_name,
                'nid_number' => $request->nid_number,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'education' => $request->education,
                'dob' => $request->education,
            ]);
        }
        else
        {
            Employee::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'previous_station' => $request->previous_station,
                'joining_date' => $request->joining_date,
                'retirement_date' => $request->retirement_date,
                'nid_number' => $request->nid_number,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'education' => $request->education,
                'dob' => $request->dob,
            ]);
        }
        return back()->with('msg','✔ Employee Added');
    }

    public function employeeListView()
    {
        $employees = Employee::all();
        return view('administration/employee/allEmployee',compact('employees'));
    }

    public function employeeRemove($id)
    {
        $eid = Crypt::decrypt($id);
        $delete = Employee::find($eid);
        if(!empty($delete->image)){unlink('assets/administration/images/employees/'.$delete->image);}
        $delete->delete();
        return redirect()->back()->with('msg',"✔ Employee REMOVED");
    }

    public function employeeEditView($id)
    {
        $eid = Crypt::decrypt($id);
        $employee = Employee::where('id',$eid)->first();
        return view('administration/employee/employeeEdit',compact('employee'));
    }
    public function employeeUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'previous_station' => 'required',
            'joining_date' => 'required',
            'retirement_date' => 'required',
            'nid_number' => 'required',
            'education' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'current_address' => 'required|max:200',
            'permanent_address' => 'required|max:200',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $image = $request->file('image');
        $update = Employee::find($request->id);
        if(!empty($image))
        {
            unlink('assets/administration/images/employees/'.$update->image);

            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/administration/images/employees/',$image_name);
            $update->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'previous_station' => $request->previous_station,
                'joining_date' => $request->joining_date,
                'retirement_date' => $request->retirement_date,
                'image' => $image_name,
                'nid_number' => $request->nid_number,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'education' => $request->education,
                'dob' => $request->education,
            ]);
        }
        else
        {
            $update->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'previous_station' => $request->previous_station,
                'joining_date' => $request->joining_date,
                'retirement_date' => $request->retirement_date,
                'nid_number' => $request->nid_number,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'education' => $request->education,
                'dob' => $request->dob,
            ]);
        }
        return back()->with('msg','✔ Employee Updated');
    }
    public function employeeDetails($id)
    {
        $eid = Crypt::decrypt($id);
        $employee = Employee::where('id',$eid)->first();

        /*$join = $employee->joining_date;
        $retire = $employee->retirement_date;
        $now = Carbon::now();
        $join_carbon = Carbon::parse($join);
        $retire_carbon = Carbon::parse($retire);*/
        /*carbon test*/
        /*echo 'now: ' . $now;
        echo '<br>';
        echo 'retire: ' . $retire_carbon;
        echo '<br>';echo '<br>';*/

        /*echo $now->diffForHumans($now, [
            'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
            'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS | Carbon::TWO_DAY_WORDS,
        ]);*/


       /* echo $now->diffInDays($retire_carbon);
        echo '<br>';*/


        /*carbon test end */

        /*algorithm*/
        /*if($now->diffInDays($retire_carbon) == 0)
        {
            echo 'today';
        }
        else
        {
            echo $retire_carbon->diffForHumans($now, [
            'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
            'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS
        ]);
        }*/
        /*algorithm ends*/


        return view('administration/employee/employeeDetails',compact('employee'));
    }



}
