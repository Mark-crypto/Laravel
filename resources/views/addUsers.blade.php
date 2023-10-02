<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Tenants') }}
        </h2>
    </x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div style="margin:20px">
    <form method="post" action={{route('dashboard.store')}}>
      @csrf
      @method('post')
     <div class="mb-3 ">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname"  name="fname">
     </div>
     <div class="mb-3">
        <label for="lname" class="form-label">Surname</label>
        <input type="text" class="form-control" id="lname"  name="lname">
     </div>
     <div class="mb-3">
        <label for="national_ID" class="form-label">National ID</label>
        <input type="number" class="form-control" id="national_ID"  name="national_ID">
     </div>
     <div class="mb-3">
        <label for="house_no" class="form-label">House No</label>
        <input type="text" class="form-control" id="house_no" name="house_no">
     </div>
     <div class="mb-3">
        <label for="date_joined" class="form-label">Date Joined</label>
        <input type="date" class="form-control" id="date_joined" name="date_joined">
     </div>
     <div class="mb-3">
        <label for="balance" class="form-label">Balance</label>
        <input type="number" class="form-control" id="balance" name="balance">
     </div>
     
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    
</body>
</html>
</x-app-layout>