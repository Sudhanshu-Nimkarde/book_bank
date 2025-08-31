@extends('front.layouts.app')

@section('main');

<section class="section-5 bg-2">
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
        <div class="row">
            <div class="col-lg-3">
                @include('front.sidebar')
            </div>
            <div class="col-lg-9">
                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}

                </div>
                @endif
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Renew Books</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{ route('front.myRenewReq') }}" class="btn btn-primary">My Renew Requests</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Center</th>
                                        <th scope="col">Issue Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($books->isNotEmpty())
                                    @php $counter = 1; @endphp <!-- Initializing the counter -->
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $book->book->book_name }}</td>
                                                <td>{{ $book->book->book_author }}</td>
                                                <td>{{ $book->book->category->category_name }}</td>                                            
                                                <td>{{ $book->book->center->center_name }}</td>
                                                <td>{{ $book->date }}</td>
                                                <td>{{ $book->due_date }}</td>
                                                <td>{{ $book->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ url('/renew', $book->id) }}">Renew</a> <!-- Issue button -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No books available to Return.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('customJs')
{{-- Alert & ajax to delete Jobs --}}
{{-- <script type="text/javascript">
function deleteJob(jobId) {
    if (confirm("Are you sure you want to delete?")) {
        $.ajax({
            url: '{{ route("account.deleteJob") }}',
            type: 'post',
            data: {jobId: jobId},
            dataType: 'json',
            success: function(response) {
                window.location.href='{{ route("account.myJobs") }}';
            }
        });
    }
}
</script> --}}
@endsection