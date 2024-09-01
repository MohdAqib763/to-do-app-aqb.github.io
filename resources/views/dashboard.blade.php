@include('header')
<div class="container mx-auto p-8">
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
    Employees List
  </caption>
  <thead>
    <tr>
      <th class="px-4 py-2">Id</th>
      <th class="px-4 py-2">Name</th>
      <th class="px-4 py-2">Email</th>
      <th class="px-4 py-2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $row)
    <tr>
      <td class="px-4 py-2">{{$row->id}}</td>
      <td class="px-4 py-2">{{$row->name}}</td>
      <td class="px-4 py-2">{{$row->email}}</td>
      <td class="px-4 py-2">
        <a href="{{url('/invite-employee',[$row->id])}}" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Invite</a> 
        <a href="{{url('/Add-tasks',[$row->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Assign Tasks</a> 
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

</div>
<script>
  let table = new DataTable('#myTable');
</script>
</body>
</html>