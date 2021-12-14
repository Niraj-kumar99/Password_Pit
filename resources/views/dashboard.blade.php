<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<!-- for create button -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

<!--Adding required References as mentioned in Step 1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


<!--Adding our table as described in Step 2-->
    <div class="container">
        <div class="text-right">
            <a href="create" class="btn btn-success">Create Site</a>
        </div>
<table id="pitTable" >
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Site</th>
        <th>URL</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    </thead>

    <!--$pit_arr as $pa-->
    <tbody>
    @foreach($pit_arr as $pa)
        <tr>
            <td>{{$pa->id}}</td>
            <td>{{$pa->name}}</td>
            <td>{{$pa->site}}</td>
            <td><a href="$pa->site">{{$pa->site}}</a></td>
            <td>********</td>
            <td> <a href="delete/{{$pa->id}}" class="btn btn-danger">Delete</a>  <a href="edit/{{$pa->id}}" class="btn btn-warning">Edit</a>  <a href="showPassword/{{$pa->id}}" class="btn btn-info">Show Password</a> <a href="editPassword/{{$pa->id}}" class="btn btn-primary">Change Password</a> </td>
        </tr>
    @endforeach
    </tbody>

</table>

<!--Initializing DataTable as per the final Step 3-->
<script>
    $("#pitTable").DataTable();
</script>

</x-app-layout>
