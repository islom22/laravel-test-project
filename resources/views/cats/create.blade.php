@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumot qo`shuvchi sahifa
                        <a href="{{url('/cats')}}" class="btn btn-info float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body py-4">
                    <form action="{{url('add-cats')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Parent cat</label>
                            <input type="text" name="parent_cat" class="form-control">
                        </div>
                        <div class="form-gruop mb-3 py-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection