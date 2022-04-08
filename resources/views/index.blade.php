@extends('layouts.app')

@section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">
           
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Posts </h1>
                  <ul class="breadcrumb">
                    <li><a href="{{ url('/index') }}">Post</a></li>
                    <li>Malumotlar ro`yxati</li>
                  </ul>  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example
                                <a href="{{url('/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>             
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Sub-title</th>
                                            <th>Cats</th>
                                            <th>keywords</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>
                                                    <img src="{{asset('/uploads/admins/'.$item->image)}}" alt="Image" width="70px" height="70px">
                                                </td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->sub_title}}</td>
                                                <td>{{$item->cats->title}}</td>
                                                <td>{{$item->keywords}}</td>
                                                <td>
                                                <div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="{{url('/edit-post/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form action="{{ url('/delete-post/'.$item->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        

@endsection