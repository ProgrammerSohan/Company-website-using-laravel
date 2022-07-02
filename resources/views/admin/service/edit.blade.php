@extends('admin.admin_master')

@section('admin')

@if (session('success'))
<strong class="alert-success">{{ session('success') }}</strong>

@endif

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Service </h2>
        </div>
        <div class="card-body">

    <form action="{{ url('update/service/'.$services->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_image" value="{{ $services->image }}">
        <div class="form-group">
            <label for="exampleFormControlFile1">Service Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->image }}">
        </div>

                <div class="form-group">
  <label for="exampleFormControlInput1">Service Title </label>
  <input type="text" name="title" class="form-control" placeholder="Service Title" value="{{ $services->title }}">

                </div>

                <div class="form-group">
     <label for="exampleFormControlTextarea1">Description </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $services->description }}</textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>

                </div>
            </form>
        </div>
    </div>


@endsection
