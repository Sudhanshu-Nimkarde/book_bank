@extends('front.layouts.app')

@section('main');

<section class="section-5 bg-2">
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
        <section class="section-3 py-5 bg-2 center">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-10 ">
                        <h2>Our Services</h2>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">
                        <div class="job_lists">
                            <div class="our-mission mt-5">
                                <h6>All Books</h6>
                                <p>User can view all books their categories,centers,authors.
                                    user can also check their availability here.</p>
                            </div>
    
                            <div class="our-vision mt-5">
                                <h6>Issue Books</h6>
                                <p> By implementing an efficient "Issue Books" functionality, book bank system
                                    can streamline the borrowing process, improve users satisfaction, and 
                                    ensure the effective management of system resources. <</p>
                            </div>
                            <div class="our-team mt-5">
                                <h6>Return Books</h6>
                                <p>The "Return Books" functionality in a library management system allows users 
                                    to return borrowed books to the library. </p>
                            </div>
                            <div class="get-involved mt-5">
                                <h6>Renew Books</h6>
                                <p>By offering a user-friendly "Renew Books" functionality, system can empower
                                    users to manage their borrowed items efficiently, extend their access to library
                                     resources as needed, and optimize the circulation of materials within the system's
                                      collection.</p>
                            </div>
                            <div class="get-involved mt-5">
                                <h6>Donate a Book</h6>
                                <p>By offering a user-friendly "Renew Books" functionality, system can empower
                                    users to manage their borrowed items efficiently, extend their access to library
                                     resources as needed, and optimize the circulation of materials within the system's
                                      collection.</p>
                            </div>
                            <div class="get-involved mt-5">
                                <h6>Damage</h6>
                                <p>By effectively managing incidents of damage and loss within the  system,
                                    system can mitigate the impact on their collections, maintain accurate inventory records,
                                     and provide quality service to users.</p>
                            </div>
                            <div class="get-involved mt-5">
                                <h6>Refferal</h6>
                                <p>By effectively referring members to the  system and its resources, staff 
                                    can support their information needs, promote literacy and lifelong learning, and enhance
                                     their overall experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
            </div>
        </section>
    </div>
</section>

@endsection
