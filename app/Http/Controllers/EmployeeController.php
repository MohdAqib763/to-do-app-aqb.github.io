<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class EmployeeController extends Controller
{
    //
    public function Login(Request $request){
        
		$email = $request->input("email");
		$password = $request->input("password");

        $data = DB::table("employees")->where("email","=",$email)->where("password","=",$password)->get();

        if(count($data) == 0){

            return redirect()->back()->with('error','Invalid Login Details');
        }else{
            
		$row = $data[0];
		Session::put('emp_id',$row->id);
		Session::put('full_name',$row->name);
		Session::put('emp_email',$row->email);
		Session::save();   

		

		die("<div class='alert alert-success'>Login successful please wait while redirect 
			<script>window.location='".url('/emp_tasks')."'</script></div>");

        }
		
    }

    public function TasksPage(){
      $tasks = DB::table('tasks')->where('employee_id',Session::get('emp_id'))->get();

        return view('emp_tasks',['tasks'=>$tasks]);
    }

    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/employee');

    }

}
