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
                            <h4 class="card-title">Testimonial</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="add-testimonial" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                                    @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="company_name">
                                        
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="description">
                                        
                                        @error('tags')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                  
                                    
                                    <div class="form-group">
                                        
                                        <div class="form-group">
                                            <label for="images">Image</label>
                                            <input type="file" name="image" class="form-control-file" id="images" multiple>
                                            <div id="images-preview" style="width:400px;height:auto;"></div>

                                        </div>
                                        @error('images')
                                        <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark" type="submit">Add Testimonial</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>

            
            <!-- End Row -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h2 class="card-title">All Testimonials</h2>
                           
                        </div>
                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0">
                                    <thead>
                                        <tr>
                                           
                                            <th>Sn</th>
                                            <th>Name</th>
                                            <th>Comapny Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($testimonial as $tt)
                                        <tr>
                                            <td class="text-nowrap align-middle">{{$sn=$sn+1}}</td>
                                            <td class="text-nowrap align-middle">{{$tt->name}}</td>
                                            <td class="text-nowrap align-middle"><span>{{$tt->company_name}}</span></td>
                                            <td class="text-nowrap align-middle"><span>{{$tt->description}}</span></td>
                                            <td class="text-nowrap align-middle"><span> <a href="{{ asset('testimonial_images/' . $tt->image) }}" style="margin-bottom: 30px;" download class="mx-3">
                                                {{ $tt->image }} <a class="btn btn-dark" href="{{ asset('testimonial_images/' . $tt->image) }}">View</a>
                                            </a></span></td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a href="edit-testimonial/{{$tt->id}}"  class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">Edit</a>
                                                    <a href="delete-testimonial/{{$tt->id}}" class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <ul class="pagination float-end">
                            <li class="page-item page-prev disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                            <li class="page-item page-next">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!--Row -->
         
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

</script>
@endsection