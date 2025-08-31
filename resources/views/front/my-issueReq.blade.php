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
                                <h3 class="fs-4 mb-1">My Issue Requests</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Book Title</th>
                                        <th scope="col">Book Author</th>
                                        <th scope="col">Book Category</th>
                                        <th scope="col">Book Center</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Return Date</th>
                                        <th scope="col">Request Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($issuedBooks->isNotEmpty())
                                    @php $counter = 1; @endphp <!-- Initializing the counter -->
                                    @foreach ($issuedBooks as $issuedBook)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $issuedBook->book->book_name }}</td>
                                            <td>{{ $issuedBook->book->book_author }}</td>
                                            <td>{{ $issuedBook->book->category->category_name }}</td>                                            
                                            <td>{{ $issuedBook->book->center->center_name }}</td>
                                            <td>{{ $issuedBook->date }}</td>
                                            <td>{{ $issuedBook->due_date }}</td>
                                            <td style="color: {{ $issuedBook->status === 'Issue Rejected' ? 'red' : ($issuedBook->status === 'Issue Approved' ? 'skyblue' : 'black') }}">{{ $issuedBook->status }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-warning" role="alert">
                                                    Books are not available..!!
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $issuedBooks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
