<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AdminController extends Controller
{
    public function Dashboard(){
        $employees = DB::table('employees')->get();
        return view('dashboard',['employees'=>$employees]);
    }
    public function LoginAdmin(Request $request){
        
		$email = $request->input("email");
		$password = $request->input("password");

        $data = DB::table("admin")->where("email","=",$email)->where("password","=",$password)->get();

        if(count($data) == 0){

            return redirect()->back()->with('error','Invalid Login Details');
        }else{
            
		$row = $data[0];
		Session::put('admin_id',$row->id);
		Session::put('full_name',$row->full_name);
		Session::put('email',$row->email);
		Session::save();   

		

		die("<div class='alert alert-success'>Login successful please wait while redirect 
			<script>window.location='".url('/dashboard')."'</script></div>");

        }
		
    }


    public function DeleteTasks($id){

        DB::table('tasks')->where('tasks_id',$id)->delete();
        return redirect()->back()->with('success','Task deleted successfully');
    }


    public function SendMail($id){

            $base_url = env('APP_URL');
            $employee = DB::table('employees')->where('id',$id)->first();

            

            $to = $employee->email;
            $subject = "Invitation Email";
            $msg = "HI!".$employee->name;
            $msg .= "click on this link to join ".$base_url;
            

            if (mail($to, $subject, $msg,)) {
                echo "Email sent successfully!";
                return redirect()->back()->with('success','Invitation sent successfully');

            } else {
                
                return redirect()->back()->with('error','Email sending failed.');

            }
          


    }

    public function EditTasks($id){
        $tasks = DB::table('tasks')->where('tasks_id',$id)->first();
        $employee = DB::table('employees')->where('id',$tasks->employee_id)->first();

        return view('edit_task',['tasks'=>$tasks,'emp'=>$employee]);
    }

    public function UpdateTasks(Request $request){
        $task_name = $request->employee_tasks;
        $task_id = $request->task_id;

    
      $employee = DB::table('tasks')->where('tasks_id',$task_id)->update(['tasks_name'=>$task_name]);
      return redirect()->back()->with('success','Task updated successfully');
    }
    public function AddTasks($id){
      $tasks = DB::table('tasks')->where('employee_id',$id)->get();
    
      $employee = DB::table('employees')->where('id',$id)->first();
      return view('add_task',['id'=>$id,'tasks'=>$tasks,'data'=>$employee]);
    }

    public function SaveTasks(Request $request){

        $employee_id = $request->input('employee_id');
        $tasks = $request->input('employee_tasks');

        DB::table('tasks')->insert(['employee_id'=>$employee_id,'tasks_name'=>$tasks]);
        return redirect()->back()->with('success','Tasks addedd successfully');
    }

    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
