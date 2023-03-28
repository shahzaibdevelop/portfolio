@extends('admin.layout')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- Row -->
            <div class="row mt-5">
                @if (Session::has('msg'))
                <span class="alert alert-success">Service edited !</span>
                @endif
                <div class="col-md-12 col-xl-12">
                 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Edit Services </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/edit-service/{{$service->id}}">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title" value="{{$service->title}}">
                                    @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="description" value="{{$service->description}}">
                                        
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category" name="category" value="{{$service->category}}">
                                        @error('category')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Service</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- End Row -->
           
            <!--Row -->
         
            <!--End Row-->

           
            <!--End Row-->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection