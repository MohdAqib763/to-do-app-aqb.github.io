@include('header')

<div class="container mx-auto p-8">

<a href="{{url('/Add-tasks',[$emp->id])}}" class="bg-black hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
<br>
@if(session()->has('status'))
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4" role="alert">
    <p class="font-bold">Success!</p>
        <p>    {{session('status')}}</p>
        </div>
    @endif
    @if(session()->has('error'))
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4" role="alert">
    <p class="font-bold">Error!</p>
    <p>{{session('error')}}</p>
    </div>
    @endif
   
    <br>

    <form action="{{url('/update-task',)}}" method="Post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tasks">Edit Tasks</label>
                <input type="hidden" name="task_id" value="{{ $tasks->tasks_id}}">
                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="employee_tasks" id="employee_tasks" type="text" value="{{$tasks->tasks_name}}">
            </div>
            
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Save</button>
        </form>  

</body>
</html>