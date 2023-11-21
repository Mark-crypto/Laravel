<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Madaraka Apartment Tenants') }}
        </h2>
        
    </x-slot>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<style>
  table {
      margin-top: 20px;
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }
  .thead{
    background: #32de84;
    color: white;
  }
  th, td {
    text-align: left;
    padding: 16px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  nav{
    width: 100%;
    background: #32de84;
    height: 60px;
    
  }
  nav ul {
  list-style: none;
  display: flex;
  float: right;
  }
  nav ul li a{
    /* padding: 5px ; */
    color: white;
    text-decoration: none;
    padding-right: 7px;
  }
</style>
</head>
{{-- <div>
        @if(session()->has('success'))
        <div>
            {{ session("success")}}
        </div>
        @endif
    </div> --}}
    <a href="{{route('download.csv')}}" class="btn btn-success" style="float: right; margin-top:20px;margin-bottom:20px;margin-right:20px;">Download CSV</a>
     
    <table>
  <tr class="thead">
    <th>#</th>
    <th>First Name</th>
    <th>Surname</th>
    <th>ID Number</th>
    <th>House No</th>
    <th>Date Joined</th>
    <th>Rent Balance</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($tenants as $position => $tenant)
  <tr>
    <td>{{$position+1}}</td>
    <td>{{$tenant->fname}}</td>
    <td>{{$tenant->lname}}</td>
    <td>{{$tenant->national_ID}}</td>
    <td>{{$tenant->house_no}}</td>
    <td>{{$tenant->date_joined}}</td>
    <td>{{$tenant->balance}}</td>
    <td>
      <a href={{route('dashboard.edit',['tenant' =>$tenant])}}><button class="btn btn-success" >Edit</button></a>
    </td>
    <td>
      <form method="post" action={{route('dashboard.destroy',['tenant' =>$tenant])}}>
        @csrf
        @method('delete')
        <button class="btn btn-danger">Delete</button>
      </form></td>
  </tr>
  @endforeach
  
</table>

</x-app-layout>
