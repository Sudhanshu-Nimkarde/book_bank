@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-3">
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

            <div class="py-lg-2">&nbsp;</div>
            {{-- @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}

                </div>
            @endif --}}
            @include('front.message')
            <div class="col-lg-12">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 text-left">REFERRAL FORM</h3>
                        <div class= "mb-10 text-left">
                            <p>We appreciate your introduction to a potential new satisfied User..!</p>
                        </div>
                        <form action="{{ route('account.referralstore') }}" method="post" id="refferalForm" name="refferalForm">
                            @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">First Name<span class="req">*</span></label>
                                <input type="text" placeholder="Enter First Name" id="reffered_first_name" name="reffered_first_name" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Last Name<span class="req">*</span></label>
                                <input type="text" placeholder="Enter Last Name" id="reffered_last_name" name="reffered_last_name" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Email<span class="req">*</span></label>
                                <input type="email" placeholder="Enter Email" id="reffered_email" name="reffered_email"
                                    class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Contact<span class="req">*</span></label>
                                <input type="tel" placeholder="Enter Contact No " id="reffered_contact" name="reffered_contact"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Message</label>
                            <textarea class="form-control" name="reffered_message" id="message" cols="5"
                                rows="5" placeholder="Your Message"></textarea>
                        </div>

                            <div class="d-flex justify-content-start">
                                <button class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection