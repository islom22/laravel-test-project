@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
              <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumot qo`shuvchi sahifa
                        <a href="{{url('/index')}}" class="btn btn-info float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body py-4">
                    <form action="{{url('add-post')}}" method="POST" class="dropzone dz-clickable" id="image-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3 dz-default dz-message">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea id="summernote" name="editordata"></textarea>
                        {{--  <input type="text" name="description" class="form-control">  --}} 
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Sub-title</label>
                            <input type="text" name="sub_title" class="form-control">
                        </div>
                        <div>
                            <label for="">Cats</label>
                            <select class="form-control" name="cats" id="exampleFormControlSelect1">
                                @foreach ($cats as $category)
                                    <option value="{{$category->id}}" >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Keywords</label>
                            <input type="text" name="keywords" class="form-control">
                        </div>
                        <div class="form-gruop mb-3 py-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <script>
                            $('#summernote').summernote({
                              placeholder: 'Description',
                              tabsize: 2,
                              height: 100
                            });
                          </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection