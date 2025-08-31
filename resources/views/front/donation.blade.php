@extends('front.layouts.app')
@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="py-lg-2">&nbsp;</div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            <p class="mb-0 pb-0">{{ Session::get('success') }}</p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            <p class="mb-0 pb-0">{{ Session::get('error') }}</p>
        </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Book Donation</h1>
                    <form action="{{ route('donations.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Book Name</label>
                            <input type="text" name="donated_book_name" id="donated_book_name" class="form-control" placeholder="Enter Book Name">
                            
                            @error('donated_book_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Donor Name</label>
                            <input type="text" name="donor_name" id="donor_name" value="{{ auth()->user()->name }}" class="form-control" placeholder="Enter Donor Name">
                            @error('donor_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Author</label>
                            <input type="text" name="donated_author" id="donated_author" class="form-control" placeholder="Enter Author Name">
                            @error('donated_author')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Select Category<span class="req">*</span></label>
                            @if ($categories->isNotEmpty())
                            <select name="category" id="category" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @endif
                            @error('category')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Select Center<span class="req">*</span></label>
                            @if ($centers->isNotEmpty())
                            <select name="center" id="center" class="form-control">
                                @foreach ($centers as $center)
                                <option value="{{ $center->id }}">{{ $center->center_name }}</option>
                                @endforeach
                            </select>
                            @endif
                            @error('center')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Date</label>
                            <input type="date" name="donated_date" id="donated_date" class="form-control" placeholder="Enter Date">
                            @error('donated_date')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection







