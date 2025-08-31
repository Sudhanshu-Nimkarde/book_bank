@extends('front.layouts.app')
@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="py-lg-2">&nbsp;</div>
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
            <div class="col-md-3">
                @include('admin.admin-sidebar') 
            </div>
            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <div class="bg-light p-4 border">
                                            <h1 class="h3">Add Category</h1>
                                            <form action="" id="addCategoryForm" name="addCategoryForm">
                                                <div class="mb-3">
                                                    <label for="" class="mb-2">Category Name</label>
                                                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter Category Name">
                                                    <p></p>
                                                </div> 
                                                <div class="d-flex justify-content-start">
                                                    <button type="submit" class="btn btn-primary mx-3">Add</button>
                                                </div>
                                            </form>                    
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section>
@endsection

@section('customJs')
<script>
    $("#addCategoryForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '{{ route("admin.addCategoryProcess") }}',
            type: 'POST',
            data: $("#addCategoryForm").serializeArray(),
            dataType: 'json',
            success: function(response){
                if(response.status == false){
                    var errors = response.errors;
                    if(errors.category_name){
                        $('#category_name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category_name)
                    } else{
                        $('#category_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                } else {
                    $('#category_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    window.location.href = '{{ route("admin.manageCategories") }}';
                }
            }
        })
    });
</script>
@endsection

