@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-12">
  <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            {{-- <th scope="col">Action</th> --}}
        
          </tr>
        </thead>
        <tbody>
            @foreach ($order as $u)
          <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->firstname}}</td>
            <td>{{$u->item_id}}</td>
            <td>{{$u->item_id}}</td>
            {{-- <td>Done</td> --}}
            {{-- <td><a onclick="return confirm('you want to delete user?')" href="{{route('delete.user', ['id=>$u->id'])}}" class="btn btn-danger">delete</a></td>
            <td><a href="{{route('admin.edit.user', ['id'=>$u->id])}}" class="btn btn-primary">update</a></td> --}}
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
    
@endsection