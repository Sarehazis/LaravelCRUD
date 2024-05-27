@extends('admin.admin-layout')

@section('content')
<h2>Create Project</h2>
<form method="post" action="{{route('admin.projects.store')}} " enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
      <label for="type" class="form-label">Tittle</label>
      <input type="text" class="form-control @error('tittle') is-invalid @enderror"  name="tittle" id="tittle">
      @error('tittle')
        <div class="invalid-feedback">
            {{$message}}
        </div>
      @enderror
    </div>
    <div class="mb-3">  
      <label for="type" class="form-label">Image</label>
      <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label for="">Project Types</label>
      <select name="project_type[]" multiple class="form-control">
        @foreach ($projectTypes as $projectType)
            <option value="{{$projectType->id}}">{{$projectType->type}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="{{route('admin.projects.index')}}" class="btn btn-danger">Cancel</a>
  </form>
@endsection