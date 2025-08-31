@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-3">
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

            <div class="py-lg-2">&nbsp;</div>
            @include('front.message')
            <div class="col-lg-12">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 text-left">DAMAGE BOOK FORM</h3>
                        {{-- <div class="mb-10 text-left">
                            <p>We appreciate your introduction to a potential new satisfied User..!</p>
                        </div> --}}
                        <form action="{{ route('account.damagestore') }}" method="post" id="damageForm" name="damageForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="damaged_book_name" class="mb-2">Book Name<span class="req">*</span></label>
                                    <input type="text" id="damaged_book_name" name="damaged_book_name" class="form-control" placeholder="Enter Book Name">
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="issue_date" class="mb-2">Date of Issue<span class="req">*</span></label>
                                    <input type="date" id="issue_date" name="issue_date" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="damage_lost" class="mb-2">Damage Type</label>
                                    <input type="text" id="damage_lost" name="damage_lost" class="form-control" placeholder="Enter Book is damage/loss">
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="contact_no" class="mb-2">Contact<span class="req">*</span></label>
                                    <input type="tel" id="contact_no" name="contact_no" class="form-control" placeholder="Enter Contact No">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="damage_loss_datetime" class="mb-2">Date & Time of Damage</label>
                                    <input type="datetime-local" id="damage_loss_datetime" name="damage_loss_datetime" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="user" class="mb-2">User</label>
                                    <input type="text" id="user" name="user" class="form-control" placeholder="Enter Name of the User">
                                    <p></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="damage_loss_description" class="mb-2">Damage Description</label>
                                <textarea id="damage_loss_description" name="damage_loss_description" class="form-control" cols="5" rows="5" placeholder="Description of Damage/Loss"></textarea>
                            </div>

                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary mx-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
