@extends('admin.layout')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- Row -->
            <div class="row mt-5">
                @if (Session::has('msg'))
                <span class="alert alert-success">{{Session::get('msg')}}</span>
                @endif
              
                <div class="col-md-12 col-xl-12">
                 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Portfolio</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/edit-portfolio/{{$portfolio->id}}" >
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="title" value="{{$portfolio->title}}">
                                    @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="description" value="{{$portfolio->description}}">
                                        
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Tags</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="tags" value="{{$portfolio->tags}}">
                                        
                                        @error('tags')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Technology</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="technology" value="{{$portfolio->technology}}">
                                        @error('technology')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Year</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="year" value="{{$portfolio->year}}">

                                        @error('year')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                   
                                    
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Portfolio</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>

            
           
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection
