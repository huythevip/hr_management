<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Staff;
use DB;


class HrController extends Controller
{
    public function index()
    {
    	$departments = Department::all();

    	return view('index', [
    		'departments' => $departments,
    	]);
    }

    public function department_column()
    {
    	return json_encode([
    		'columns' => ['Full Name', 'Position', 'Skill', 'Experience', 'Year Joined']
    	]);
    }

    public function staff_list (request $request)
    {
    	$requested_dept = $request->department; //Lay department dc request
    	$dept_name_id = DB::table('departments')->pluck('id', 'full_name');//Xuat ra tat ca id cua cac department theo dang: fullname => id

    	$all_staff = DB::table('staffs')->where('department_id', '=', $dept_name_id[$requested_dept])->get();

		return json_encode($all_staff);
    }

}
