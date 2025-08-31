@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Home</a></li>
                        <li class="breadcrumb-item active">Donated Books</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Donated Books</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{ route('account.donate') }}" class="btn btn-primary">Donate Book</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Center</th>
                                        {{-- <th scope="col">Donor</th> --}}
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($donations->isNotEmpty())
                                        @foreach ($donations as $key => $donation)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $donation->donated_book_name }}</td>
                                                <td>{{ $donation->donated_author }}</td>
                                                <td>{{ $donation->category->category_name }}</td>
                                                <td>{{ $donation->center->center_name }}</td>
                                                {{-- <td>{{ $donation->user->name }}</td> --}}
                                                <td>{{ $donation->donated_date }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-warning" role="alert">
                                                    No donations yet..! Consider donating a book today.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        <div class="pagination justify-content-center">
                            {{ $donations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
