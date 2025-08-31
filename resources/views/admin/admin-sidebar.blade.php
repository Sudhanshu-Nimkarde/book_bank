<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">
        <img src="assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="mt-3 pb-0">Welcome Admin</h5>
        {{-- <p class="text-muted mb-1 fs-6">{{ Auth::user()->name }}</p> --}}
        {{-- <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Update Profile </button>
        </div> --}}
    </div>
</div>
<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.manageUsers') }}">Manage Users</a>
            </li>
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('admin.manageCenters') }}">Manage Centers</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.manageCategories') }}">Manage Categories</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.manageBooks') }}">Manage Books</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ url('issue_request') }}">Manage Issued Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.renewRequests') }}">Manage Renew Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ url('return_request') }}">Manage Return Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.donatedBooks') }}">Donated Books</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.giveawayRequests') }}">Manage Giveaway</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.damagedetails') }}">Manage Damaged Books</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.lostdetails') }}">Manage Lost Books</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('admin.referraldetails') }}">Referral Details</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.logout') }}">Logout</a>
            </li>                                                       
        </ul>
    </div>
</div>
