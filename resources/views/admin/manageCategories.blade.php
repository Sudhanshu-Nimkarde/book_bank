@extends('front.layouts.app')

@section('main');

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
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
                                <h3 class="fs-4 mb-1">All Categories</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{ route('admin.addCategory') }}" class="btn btn-primary">Add Category</a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($categories->isNotEmpty())
                                    @php $counter = 1; @endphp <!-- Initializing the counter -->
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td class="delete"> 
                                                <form action="{{ route('categories.destroy', $category) }}" method="post" class="form-hidden">                 
                                                    <button class="btn btn-danger btn-sm delete-user">Delete</button> <!-- Issue button -->
                                                    @csrf
                                                </form>
                                            </td>                                          
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                
                            </table>
                        </div>
                        <div>
                            {{-- //for paginate(10);  --}}
                            {{ $categories->links() }}
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