@extends('admin.admin-layout')
@push('styles')
<style>
    p {
        color: red;
    }
</style>
@endpush
@section('content')
<p>Project Index</p>
<a class="btn btn-primary" href="{{route('admin.projects.create')}}">Add</a>
@if(!empty(session('error')))
    <p class="text-danger">{{session('error')}}</p>
@elseif(!empty(session('success')))
    <p class="text-success">{{session('success')}}</p>
@endif
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Project Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ asset(Storage::url($project->image))}}" width="100" onerror="this.src='https://via.placeholder.com/150'">
            </td>
            <td>{{ $project->tittle }}</td>
            <td>{{ $project->description }}</td>
            <td>
                <ul>
                    @foreach ($project->project_types as $pt)
                    <li>{{ $pt->type }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn bg-primary text-white">Edit</a>
                <form method="POST" action="{{route('admin.projects.destroy', [
                    'id' => $project->id
                ]) }}">
                @csrf
                @method('delete')
                    <button class="btn bg-danger border-1 text-white mt-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection