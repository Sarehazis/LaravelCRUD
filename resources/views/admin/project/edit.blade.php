@extends('admin.admin-layout')

@section('content')
<h2>Edit Projects</h2>
<form method="post" action="{{route('admin.projects.update', $project->id)}} " enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="type" class="form-label">Tittle</label>
    <input type="text" class="form-control @error('tittle') is-invalid @enderror"  name="tittle" id="tittle" value="{{ $project->tittle }}">
    @error('tittle')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror
  </div>
  <div class="mb-3">  
    <label for="type" class="form-label">Image</label>
    <input type="file" class="form-control" name="image" id="image">
    <img src="{{asset(Storage::url($project->image))}}" width="100" class="mt-2"  onerror="this.src='https://via.placeholder.com/150'">
  </div>
  <div class="mb-3">
      <label for="" class="form-label">Description</label>
      <textarea name="description" id="description" rows="5" class="form-control ">{{ $project->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="">Project Types</label>
    <select name="project_type[]" multiple class="form-control">
      @foreach ($projectTypes as $projectType)
          <option value="{{$projectType->id}}" @if(in_array($projectType->id, $project_types_selected)) selected @endif>{{$projectType->type}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
  <a href="{{route('admin.projects.index')}}" class="btn btn-danger">Cancel</a>
</form>
@endsection