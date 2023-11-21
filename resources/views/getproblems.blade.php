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
    {{-- <a href="{{route('download.csv')}}" class="btn btn-success" style="float: right; margin-top:20px;margin-bottom:20px;margin-right:20px;">Download CSV</a> --}}
     
    <table>
  <tr class="thead">
    <th>#</th>
    <th>First Name</th>
    <th>Last name</th>
    <th>Apartment Number</th>
    <th>Issue</th>
    <th>Additional Context</th>
  </tr>
  @foreach($problems as $position => $problem)
  <tr>
    <td>{{$position+1}}</td>
    <td>{{$problem->fname}}</td>
    <td>{{$problem->lname}}</td>
    <td>{{$problem->apartmentNo}}</td>
    <td>{{$problem->issue}}</td>
    <td>{{$problem->information}}</td>
  </tr>
  @endforeach
  
</table>

</x-app-layout>
