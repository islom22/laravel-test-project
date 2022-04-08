@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumotni o`zgartiruvchi sahifa
                        <a href="{{url('/index')}}" class="btn btn-danger float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-post/'.$admin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$admin->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img  src="{{asset('uploads/admins/'.$admin->image)}}" alt="Image" width="70px" height="70px">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{$admin->description}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Date</label>
                            <input type="date" name="date" value="{{$admin->date}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Sub-title</label>
                            <input type="text" name="sub_title" value="{{$admin->sub_title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="cats" id="exampleFormControlSelect1">
                                @foreach ($cats as $category)   
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Keywords</label>
                            <input type="text" name="keywords" value="{{$admin->keywords}}" class="form-control">
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