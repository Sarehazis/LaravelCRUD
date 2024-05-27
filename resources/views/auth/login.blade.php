@extends('admin.admin-layout')

@section('content')
<h2>Form Login</h2>
@if(!empty(session('error')))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<form action="{{route('login.proses')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection   