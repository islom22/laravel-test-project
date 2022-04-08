@extends('layouts.app')


@section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">
            
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Cats </h1>
                  <ul class="breadcrumb">
                    <li><a href="{{ url('/cats') }}">Post</a></li>
                    <li>Malumotlar ro`yxati</li>
                  </ul> 
               
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example
                                <a href="{{url('/add-cats')}}" class="btn btn-primary float-end">Add Cats</a>
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
                                            <th>Parent cat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <img src="{{asset('/uploads/cat/'.$item->image)}}" alt="Image" width="70px" height="70px">
                                            </td>
                                            <td>{{$item->parent_cat}}</td>
                                            <td>
                                              <div>
                                                  <div class="container">
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                            <a href="{{url('/edit-cats/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <form action="{{ url('/delete/cats/'.$item->id) }}" method="POST">
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