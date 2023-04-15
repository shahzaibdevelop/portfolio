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
              
                  <!-- End Row -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h2 class="card-title">All Education</h2>
                           
                        </div>
                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0">
                                    <thead>
                                        <tr>
                                           
                                            <th>Sn</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contact as $contacts)
                                            
                                        <tr>
                                            <td class="text-nowrap align-middle">{{$sn=$sn+1}}</td>
                                            <td class="text-nowrap align-middle">{{$contacts->name}}</td>
                                            <td class="text-nowrap align-middle"><span>{{$contacts->email}}</span></td>
                                            <td class="text-nowrap align-middle"><span>{{$contacts->subject}} </span></td>
                                            <td class="text-nowrap align-middle"><span>{{$contacts->message}} </span></td>
                                          
                                        </tr>
                                    
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                        {{ $contact->links() }}
                      </div>
                      
                </div>
                <!-- COL-END -->
            </div>
            <!--Row -->
               
            </div>
          
         
            <!--End Row-->

           
            <!--End Row-->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection