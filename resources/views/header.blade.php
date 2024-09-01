<?php
$admin_id = Session::get('admin_id');

if(empty($admin_id)){
    die('Invalid Access');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbboard</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css" rel="stylesheet">
    <!-- <link href="{{url('public/resources/css/modal.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body >
<header class="bg-gray-800 text-white py-4">
    <h2 class="px-4">Welcome! {{Session::get('full_name')}}</h2>
  <div class="container mx-auto flex justify-end">
    <a href="{{url('/logout')}}"
      class="px-4 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600"
    >
      Logout
</a>
  </div>
</header>