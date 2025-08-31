@extends('front.layouts.app')
@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.adminDashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.admin-sidebar') 
            </div>
            
                <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">                    
                        <div class="job_lists">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <div class="bg-light p-4 border">
                                                {{-- <p class="card-text text-center">6</p> --}}
                                                <h4 class="card-title mb-0 text-center">{{ $users }}</h4>
                                                <h5 class="card-title mb-0 text-center">Total Users</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <div class="bg-light p-4 border">
                                                {{-- <p class="card-text text-center">6</p> --}}
                                                <h4 class="card-title mb-0 text-center">{{ $centers }}</h4>
                                                <h5 class="card-title mb-0 text-center">Centers Listed</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <div class="bg-light p-4 border">
                                                {{-- <p class="card-text text-center">6</p> --}}
                                                <h4 class="card-title mb-0 text-center">{{ $categories }}</h4>
                                                <h5 class="card-title mb-0 text-center">Categories Listed</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <div class="bg-light p-4 border">
                                                {{-- <p class="card-text text-center">6</p> --}}
                                                <h4 class="card-title mb-0 text-center">{{ $books }}</h4>
                                                <h5 class="card-title mb-0 text-center">Total Books</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <div class="bg-light p-4 border">
                                                {{-- <p class="card-text text-center">6</p> --}}
                                                <h4 class="card-title mb-0 text-center">{{ $issuebooks }}</h4>
                                                <h5 class="card-title mb-0 text-center">Issued Books</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
</section>
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div> --}}
@endsection