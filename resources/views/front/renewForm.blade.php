@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-3">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('account.centers') }}">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="py-lg-2">&nbsp;</div>
            @include('front.message')
            <div class="col-lg-12">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 text-left">RENEW FORM</h3>
                        {{-- <div class= "mb-10 text-left">
                            <p>To get the books in the giveaway, you need to donate at least 2 or more books..!!</p>
                        </div> --}}
                        <form action="{{ route('front.renewBooks', $issuedBooks->id) }}" method="get" id="giveawayBooks" name="giveawayBooks">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" value="{{ $issuedBooks->book->book_name }}" placeholder="Book Title" id="title" name="title" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Author<span class="req">*</span></label>
                                <input type="text" value="{{ $issuedBooks->book->book_author }}" placeholder="Enter Author Name" id="author_name" name="author_name"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Category</label>
                                <input type="text" value="{{ $issuedBooks->book->category->category_name }}" placeholder="Enter Category Name" id="category" name="category"
                                    class="form-control">
                                <p></p>
                            </div>

                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Center<span class="req">*</span></label>
                                <input type="text" placeholder="Enter Center Name " value="{{ $issuedBooks->book->center->center_name }}" id="center" name="center"
                                    class="form-control">
                                <p></p>
                            </div>
    
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Issue Date<span class="req">*</span></label>
                                <input type="date" value="{{ $issuedBooks->date }}" placeholder="" id="issue_date" name="issue_date"
                                    class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Due Date<span class="req">*</span></label>
                                <input type="dateTime" value="{{ $issuedBooks->due_date }}" placeholder="" id="due_date" name="due_date"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-2">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
