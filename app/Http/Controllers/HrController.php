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

    public function staff_add (request $request) {

        $requested_dept = $request->department;
        $dept_name_id = DB::table('departments')->pluck('id', 'full_name');
        $dept_id = $dept_name_id[$requested_dept];

        $staff = new Staff;
            $staff->full_name = $request->full_name;
            $staff->department_id = $dept_id;
            $staff->position = $request->position;
            $staff->skill = $request->skill;
            $staff->year_exp = $request->exp;
            $staff->year_join = $request->year_join;
        $staff->save();
        return json_encode(['message' => "Successfully added!",
                            'staff_id' => $staff->id
    ]);
    }

    public function staff_edit (request $request) {

        $staff = Staff::find($request->staff_id);
            $staff->full_name = $request->full_name;
            $staff->department_id = $request->department;
            $staff->position = $request->position;
            $staff->skill = $request->skill;
            $staff->year_exp = $request->exp;
            $staff->year_join = $request->year_join;
        $staff->save();
        return json_encode(['message' => "Successfully edited!"]);
    }

    public function staff_delete (request $request) {
        $staff = Staff::find($request->staff_id);
        $staff->delete();

        return json_encode(['message' => "Staff deleted permanently"]);
    }

    public function staff_search (request $request) {
        $requestedContent = $request->search_content;
        $staff_list = Staff::where('full_name', 'like', '%'.$requestedContent.'%')
                    ->orWhere('position', 'like', '%'.$requestedContent.'%')
                    ->orWhere('skill', 'like', '%'.$requestedContent.'%')
                    ->orWhere('year_exp', 'like', '%'.$requestedContent.'%')
                    ->orWhere('year_join', 'like', '%'.$requestedContent.'%')
                    ->get();
        return json_encode($staff_list);
    }

}
