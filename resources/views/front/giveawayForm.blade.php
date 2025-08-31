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
                        <h3 class="fs-4 text-left">GIVEAWAY FORM</h3>
                        <div class= "mb-10 text-left">
                            <p class="alert">To get the books in the giveaway, you need to donate at least 2 or more books..!!</p>
                        </div>
                        <form action="{{ route('front.giveawayBooks', $donatedBooks->id) }}" method="get" id="giveawayBooks" name="giveawayBooks">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" value="{{ $donatedBooks->user->name }}" placeholder="Enter Name" id="user_name" name="user_name" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Email<span class="req">*</span></label>
                                <input type="email" placeholder="Enter Email" value="{{ $donatedBooks->user->email }}" id="email" name="email"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Contact<span class="req">*</span></label>
                                <input type="tel" placeholder="Enter Contact No " id="contact" name="contact"
                                    class="form-control" value="{{ $donatedBooks->user->contact_no }}">
                                <p></p>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Book Name</label>
                                <input type="text" id="book_name" name="book_name" placeholder="Enter Book Name" value="{{ $donatedBooks->donated_book_name }}" required class="form-control">
                            </div>
    
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Author<span class="req">*</span></label>
                                <input type="text" value="{{ $donatedBooks->donated_author }}" placeholder="Enter Author Name" id="author_name" name="author_name"
                                    class="form-control">
                                <p></p>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Category</label>
                                <input type="text" value="{{ $donatedBooks->category->category_name }}" placeholder="Enter Category Name" id="category" name="category"
                                    class="form-control">
                                <p></p>
                            </div>
    
                        </div>
                        
                        
                        <div class="col-md-6  mb-4">
                            <label for="" class="mb-2">Center<span class="req">*</span></label>
                            <input type="text" placeholder="Enter Center Name " value="{{ $donatedBooks->center->center_name }}" id="center" name="center"
                                class="form-control">
                            <p></p>
                        </div>

                        <div class="d-flex justify-content-start">
                            @if ($userDonations >= 2)
                                <button class="btn btn-primary mt-2">Submit</button>
                            @else
                                <p>Sorry, you are not eligible to fill the book giveaway form. You need to donate 2 or more books.</p>
                            @endif
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
