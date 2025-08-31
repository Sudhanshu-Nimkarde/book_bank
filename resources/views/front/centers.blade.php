@extends('front.layouts.app')

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">All Centers</h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($centers as $center)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4" style="background-color: #f8f9fa; border-radius: 15px;">
                                    <div class="card-body">
                                        <div class="bg-light p-3 border" style="border-radius: 10px;">
                                            <h3 class="border-0 fs-5 pb-2 mb-0" style="color: #333;">{{ $center->center_name }}</h3>
                                            <p style="color: #666;">Address: {{ $center->center_address }}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center" style="background-color: #f8f9fa; border: none;">
                                        <button class="btn btn-primary">Select</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
{{-- Custom JavaScript code --}}
@endsection
