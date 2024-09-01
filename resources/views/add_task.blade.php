@include('header')

<div class="container mx-auto p-8">

<a href="{{url('/dashboard')}}" class="bg-black hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
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

    <form action="{{url('save-tasks')}}" method="Post">
            @csrf
            <div class="flex items-center  mb-4">
              
               
                <input type="hidden" name="employee_id" value="{{$id}}">
                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="employee_tasks" id="employee_tasks" type="text" placeholder="Add task here..">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Save</button>
           
              </div>
            
        </form>  
        <br>
<table id="myTable" class="table-auto w-full text-left p-4">
<caption class="caption-top">
    {{ $data->name }} Tasks
  </caption>
  <thead>
    <tr>
      <th class="px-4 py-2">Id</th>
      <th class="px-4 py-2">To Do</th>
      <th class="px-4 py-2">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($tasks))

    @php $i = 1; @endphp
    @foreach($tasks as $row)
    <tr>
      <td class="px-4 py-2">{{ $i++ }}</td>
      <td class="px-4 py-2">{{$row->tasks_name}}</td>
      <td class="px-4 py-2">
        <a href="{{url('/edit-tasks',[$row->tasks_id])}}" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit</a> 
        <a href="{{url('/delete-tasks',[$row->tasks_id])}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</a> 
      </td>
    </tr>
    @endforeach
    @endif
   
  </tbody>
</table>

</div>

<script>
  let table = new DataTable('#myTable');
</script>
</body>
</html>