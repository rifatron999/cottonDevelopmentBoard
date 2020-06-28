<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
                'dob' => $request->education,
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


}
