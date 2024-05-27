@extends('admin.admin-layout')

@section('content')
<h2>Create Project Type</h2>
<form method="post" action="{{route('admin.project-types.store')}}">
    @csrf
    <div class="mb-3">
      <label for="type" class="form-label">Type Name</label>
      <input type="type" class="form-control" name="type" id="type">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="{{route('admin.project-types.index')}}" class="btn btn-danger">Cancel</a>
  </form>
@endsection