<?php

namespace App\Http\Controllers;

use App\Employee;
use PDF;
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
}
