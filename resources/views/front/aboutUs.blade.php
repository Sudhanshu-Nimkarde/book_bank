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
                        <h2>About Us</h2>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">
                        <div class="job_lists">
                            <div class="our-mission mt-5">
                                <h6>Our Mission</h6>
                                <p>At the Book Bank System, our mission is simple yet profound: to promote literacy and
                                    provide equitable access to educational resources for all. We believe that every
                                    individual deserves the opportunity to learn and grow through reading, regardless of
                                    their background or circumstances. Through our innovative book bank model, we strive
                                    to empower individuals and communities to unlock their full potential through
                                    education.</p>
                            </div>
    
                            <div class="our-vision mt-5">
                                <h6>Our Vision</h6>
                                <p>Our vision is to create a world where every person has access to the transformative power
                                    of books. We envision vibrant reading communities where individuals of all ages and
                                    backgrounds can discover the joy of reading, expand their knowledge, and pursue their
                                    dreams. By fostering a culture of literacy and lifelong learning, we aspire to inspire
                                    positive change and promote social equity on a global scale.</p>
                            </div>
                            <div class="our-team mt-5">
                                <h6>Our Team</h6>
                                <p>Our team is comprised of passionate individuals from diverse backgrounds who share a
                                    common commitment to promoting literacy and educational equity. From educators and
                                    librarians to technologists and social entrepreneurs, each member of our team brings
                                    unique skills and perspectives to our work. Together, we are dedicated to driving
                                    positive change and making a difference in the lives of others through the power of
                                    books.</p>
                            </div>
                            <div class="get-involved mt-5">
                                <h6>Get Involved</h6>
                                <p>Join us in our mission to make a difference one book at a time. Whether you're interested
                                    in donating books, volunteering your time, or partnering with us to expand our reach,
                                    there are many ways to get involved with the Book Bank System. Together, we can build a
                                    brighter future where everyone has the opportunity to thrive through education and
                                    reading.</p>
                            </div>
                            <div class="thank-you mt-5">
                                <h6>Thank You..!</h6>
                                <p>Thank you for supporting the Book Bank System. Together, we can turn the page on
                                    illiteracy and write a new chapter of opportunity and hope for all.</p>
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
