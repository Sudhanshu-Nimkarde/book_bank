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
                            <div class="bg-light p-4 border">
                                <h1 class="h3">Add Book</h1>
                                <form action="" name="addBookForm" id="addBookForm">
                                    <div class="card border-0 shadow mb-4 ">
                                        <div class="card-body card-form p-4">
                                            <div class="row">
                                                <div class="mb-4 col-md-6">
                                                    <label for="" class="mb-2">Book Name<span class="req">*</span></label>
                                                    <input type="text" placeholder="Enter Book Name" id="book_name" name="book_name"
                                                        class="form-control">
                                                    <p></p>
                                                </div>
                                                <div class="mb-4 col-md-6">
                                                    <label for="" class="mb-2">Book Author<span class="req">*</span></label>
                                                    <input type="text" placeholder="Enter Author Name" id="book_author" name="book_author"
                                                        class="form-control">
                                                    <p></p>
                                                </div>
                                            </div>
                            
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <label for="" class="mb-2">Select Center<span class="req">*</span></label>
                                                    @if ($centers->isNotEmpty())
                                                    <select name="center" id="center" class="form-control">
                                                        @foreach ($centers as $center)
                                                        <option value="{{ $center->id }}">{{ $center->center_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                    <p></p>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label for="" class="mb-2">Select Category<span class="req">*</span></label>
                                                    @if ($categories->isNotEmpty())
                                                    <select name="category" id="category" class="form-control">
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                    <p></p>
                                                </div>  
                                            </div>
                            
                                            <div class="d-flex justify-content-start">
                                                <button type="submit" class="btn btn-primary mx-3">Add</button>
                                            </div>
                                                    
                                        </div>
                                    </div>
                                </form>                
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
    $("#addBookForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '{{ route("admin.addBookProcess") }}',
            type: 'POST',
            data: $("#addBookForm").serializeArray(),
            dataType: 'json',
            success: function(response){
                if(response.status == false){
                    var errors = response.errors;
                    if(errors.book_name){
                        $('#book_name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.book_name)
                    } else{
                        $('#book_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.book_author){
                        $('#book_author').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.book_author)
                    } else{
                        $('#book_author').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.center){
                        $('#center').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.center)
                    } else{
                        $('#center').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.category){
                        $('#category').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category)
                    } else{
                        $('#category').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                } else {
                    $('#book_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#book_author').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#center').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#category').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    window.location.href = '{{ route("admin.manageBooks") }}';
                }
            }
        })
    });
</script>
@endsection
