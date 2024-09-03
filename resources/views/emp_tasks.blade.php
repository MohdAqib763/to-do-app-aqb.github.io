@include('employee_header')

<div class="container mx-auto p-8">


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
   
    
<table id="myTable" class="table-auto w-full text-left p-4">
<caption class="caption-top">
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
      <td class="px-4 py-2">{{ $i++  }}</td>
      <td class="px-4 py-2">{{$row->tasks_name}}</td>
         <form action="{{url('change-status')}}" method="post">
        @csrf
      <td class="px-4 py-2">
        <input type="hidden" name="tasks_id" value="{{$row->tasks_id}}">
        <select name="change_status" onchange="this.form.submit()" id="change_status">
          <option value="">-Select Status-</option>
          <option value="In-progress" <?php if($row->status == 'In-progress') {echo 'selected'; } ?> >In-Progress</option>
          <option value="completed" <?php if($row->status == 'completed') {echo 'selected'; } ?> >Completed</option>
        </select>
      </td>
      </form>
      
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
