@extends('layouts.app')

@section('content')


<div class="container">  
<h2>Users</h2>  
<div class="row">
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Change Permisions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->usertype}}</td>
        <td>
        <!-- <a href="route('user.show',['id'=>$user->id])" class="btn btn-primary"></a> -->
        @if($user->usertype == "employee")
        <a href="{{route('user.technician',['id'=> $user->id])}}" class="btn btn-primary">Make Technician</a>
        @else($user->usertype == "technician")
        <a href="{{route('user.employee',['id'=> $user->id])}}" class="btn btn-primary">Make Employee</a>
        @endif
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>
  </div>
</div>



@endsection