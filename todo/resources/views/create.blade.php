@extends('app') 

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Add New To Do</h2>
    </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ url('/') }}">Back</a>
      </div>
  </div>
</div>
<form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Content:</strong>
        <input type="text" name="content" class="form-control">
      </div>
      <div class="form-group">
        <strong>Image:</strong>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <strong>Note:</strong>
        <input type="text" name="note" class="form-control">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
@endsection

