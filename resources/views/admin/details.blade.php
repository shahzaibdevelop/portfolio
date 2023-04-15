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
                            <h4 class="card-title">Edit Details</h4>
                        </div>
                        <div class="card-body">
                            
                            <form method="POST" action="admin-details-post">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">First Name </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="fname" value="{{$detail->fname}}" >
                                    @error('fname')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Last Name </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="lname" value="{{$detail->lname}}" >
                                    @error('lname')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="occupation" value="{{$detail->occupation}}" >
                                        
                                        @error('occupation')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea type="text" rows="5" class="form-control" id="exampleInputEmail1"  name="description"  >{{$detail->description}}</textarea>
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Projects</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="projects" value="{{$detail->projects}}" >
                                        @error('projects')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="experience" value="{{$detail->experience}}" >
                                        @error('experience')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Resume</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="resume" value="{{$detail->resume}}">
                                        @error('resume')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Facebook</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="facebook" value="{{$detail->facebook}}">
                                        @error('facebook')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="instagram" value="{{$detail->instagram}}">
                                        @error('instagram')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Twitter</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="twitter" value="{{$detail->twitter}}">
                                        @error('twitter')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Linkedin</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="linkedin" value="{{$detail->linkedin}}">
                                        @error('linkedin')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Github</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="github" value="{{$detail->github}}">
                                        @error('github')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Youtube</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  name="youtube" value="{{$detail->youtube}}">
                                        @error('youtube')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Details</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
     
         
            <!--End Row-->
            <div class="row mt-5">
                @if (Session::has('msg'))
                <span class="alert alert-success">{{Session::get('message')}}</span>
                @endif
              
                <div class="col-md-12 col-xl-12">
                 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Admin Details</h4>
                        </div>
                        <div class="card-body">
                            
                            <form method="POST" action="admin-adminDetails-post">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Name </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="name" value="{{$user->name}}" >
                                    @error('name')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="email" value="{{$user->email}}" >
                                    @error('email')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="phone" value="{{$user->phone}}" >
                                    @error('phone')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="address" value="{{$user->address}}" >
                                    @error('address')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="password"  >
                                    @error('password')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                  
                               
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Details</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
           
            <!--End Row-->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection