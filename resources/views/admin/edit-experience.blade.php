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
                            <h4 class="card-title">Edit Experience</h4>
                        </div>
                        <div class="card-body">
                            
                            <form method="POST" action="{{route('editExperience',$experience->id)}}">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Title </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="title" value="{{$experience->title}}">
                                    @error('institute_name')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="company_name" value="{{$experience->company_name}}">
                                        
                                        @error('degree_name')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="description" value="{{$experience->description}}">
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Start Year</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="start_year" value="{{$experience->start_year}}">
                                        @error('start_year')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">End Year</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="end_year" value="{{$experience->end_year}}">
                                        @error('end_year')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Experience</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
     
         
            <!--End Row-->

           
            <!--End Row-->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection