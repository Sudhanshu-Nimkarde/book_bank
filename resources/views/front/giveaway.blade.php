@extends('front.layouts.app')

@section('main')
<div class="container py-5">
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
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-left mb-5">Books Available in the Giveaway</h2>
        </div>
        <div class="col-md-auto text-end">
            <a href="{{ route('front.myRequests') }}" class="btn btn-primary">My Requests</a>
        </div>
    </div>
    <div class="row">
        @foreach($donatedBooks as $donatedBook)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header text-white" style="background-color:#A8DF8E;">{{ $donatedBook->donated_book_name }}</div>
                <div class="card-body">
                    <p class="card-text"><strong>Title:</strong> {{ $donatedBook->donated_book_name }}</p>
                    <p class="card-text"><strong>Author:</strong> {{ $donatedBook->donated_author }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $donatedBook->category->category_name }}</p>
                    <p class="card-text"><strong>Center:</strong> {{ $donatedBook->center->center_name }}</p>
                    <p class="card-text">{{ $donatedBook->description }}</p>
                </div>
                <div class="card-footer bg-light text-center">
                    <div class="btn-group justify-content-center">
                        <a href="{{ route('giveaway.form', $donatedBook->id) }}" class="btn btn-sm btn-outline-secondary btn-center" style="background-color:#A8DF8E;">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
