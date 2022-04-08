@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumotni o`zgartiruvchi sahifa
                        <a href="{{url('/cats')}}" class="btn btn-danger float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-cats/'.$admin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$admin->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img  src="{{asset('uploads/cat/'.$admin->image)}}" alt="Image" width="70px" height="70px">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="parent_cat" value="{{$admin->parent_cat}}" class="form-control">
                        </div>
                        <div class="form-gruop mb-3">
                            <button class="btn btn-primary" type="submit">Update post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection