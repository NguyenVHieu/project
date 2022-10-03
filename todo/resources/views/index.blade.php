<style>
    input[type="checkbox"]:checked ~ .tag{
     text-decoration: line-through;
    }
</style>
@extends('app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Todo List</h2>
    </div>
    <div class="pull-right" style="margin-bottom: 10px;">
      <a href="{{ url('create') }}" class="btn btn-success">Create New To Do</a>
    </div>
  </div>
  <table class="table table-bordered"> 
    <tr>
      <th>Content</th>
      <th>Image</th>
      <th>Note</th>
      <th>Action</th>
    </tr>
    @foreach ($todolists as $todolist)
    <tr>
      <td><input type="checkbox"/> <span class="tag">{{ $todolist->content }}</span></td>
      <td><img src="{{ asset('images/'.$todolist->image) }}" width="100px"></td>
      <td>{{ $todolist->note }}</td>
      <td>
        <form action="{{ route('destroy',$todolist->id) }}" method="POST">
          <a class="btn btn-primary" href="{{ url('/edit', $todolist->url) }}">Edit</a>
          @csrf
          @method('delete')   
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection