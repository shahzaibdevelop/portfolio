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
                            <h4 class="card-title">Edit Testimonial</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('editTestimonial',$testimonial->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$testimonial->name}}">
                                    @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="company_name" value="{{$testimonial->company_name}}">
                                        
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="description" value="{{$testimonial->description}}">
                                        
                                        @error('tags')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                  
                                    
                                    <div class="form-group">
                                        
                                        <div class="form-group">
                                            <label for="images">Image</label>
                                            <input type="file" name="image" class="form-control-file" id="images" multiple >
                                            <div id="images-preview" style="width:400px;height:auto;"><div class="image-container">
                                                <img id="image" src="{{ asset('testimonial_images/'.$testimonial->image) }}">
                                                <i class="fa fa-times delete-icon" onclick="deleteImg()"></i>
                                              </div>
                                              
                                              </div>

                                        </div>
                                        @error('images')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark" type="submit">Edit Testimonial</button>
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
@section('script')

<script>
    $(function() {
        $('#images').change(function() {
            $('.preview').remove();
            for (var i = 0; i < this.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass('preview');
                    $('#images-preview').append(img);
                }
                reader.readAsDataURL(this.files[i]);
            }
            
        });
    });
    function deleteImg() {
  var container = document.querySelector(".image-container");
  container.parentNode.removeChild(container);
}


</script>
@endsection