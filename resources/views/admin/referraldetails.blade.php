@extends('front.layouts.app')

@section('main');

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
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
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                              <a href="{{ route('admin.referraldetails') }}"></a>  <h3 class="fs-4 mb-1">Referral Details</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordere">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Message</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ( $referral->isNotEmpty())
                                    @php $counter = 1; @endphp <!-- Initializing the counter -->
                                        @foreach ( $referral as  $referral)
                                            <tr>
                                              <td> {{ $counter++}}</td>
                                              <td> {{ $referral->reffered_first_name}}</td>
                                              <td> {{ $referral->reffered_last_name}}</td>
                                              <td> {{ $referral->reffered_email}}</td>
                                              <td> {{ $referral->reffered_contact}}</td>
                                              <td> {{ $referral->reffered_message}}</td>
            
                                                
                                                </td>                                     
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection