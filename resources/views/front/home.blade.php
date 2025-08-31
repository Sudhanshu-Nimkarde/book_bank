<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>BookBank | Find Best Books</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"/>
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#"/>
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">BOOK BANK</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
					</li>	
                    {{-- <li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('findBooks') }}">Find Books</a>
					</li> --}}
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('aboutUs') }}">About us</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('services') }}">Services</a>
					</li>									
				</ul>				
				<a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}" type="submit">LogIn</a>
				<a class="btn btn-outline-primary me-2" href="{{ route('account.registration') }}" type="submit">Register</a>
			</div>
		</div>
	</nav>
</header>

<section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/bbank.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Book Bank System</h1>
                <p>Click here to Register yourself..!</p>
                <div class="banner-btn mt-5"><a href="{{ route('account.registration') }}" class="btn btn-primary mb-4 mb-sm-0">Click Here</a></div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-0 shadow p-5">
       
        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">
            <div class="job_listing_area" >                    
                <div class="job_lists" >
                    <div class="row" >
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                            <div class="col-md-4" >
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $category->category_name }}</h3>
                                    <div class="d-grid mt-3">
                                        <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                            </div>                     
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-3  py-5">
    <div class="container">
        <h2>Book Centers</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($centers->isNotEmpty())
                            @foreach ($centers as $center)
                            <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $center->center_name }}</h3>
                                    <p>Address: {{ $center->center_address }}</p>
                                    <div class="d-grid mt-3">
                                        <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                            </div>                     
                           @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-3  py-5">
    <div class="container">
        <h2>Popular Books</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($books->isNotEmpty())
                            @foreach ($books as $book)
                            <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $book->book_name }}</h3>
                                    <p>By {{ $book->book_author }}</p>
                                    <div class="d-grid mt-3">
                                        <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                            </div>                     
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark py-3 bg-2">
    <div class="container">
        <p class="text-center text-white pt-3 fw-bold fs-6">© 2024 book bank system, all right reserved</p>
    </div>
</footer> 


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
