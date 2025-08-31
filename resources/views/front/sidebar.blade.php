<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">
        <img src="assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="mt-3 pb-0">{{ Auth::user()->name }}</h5>
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
                <a href="{{ route('account.centers') }}">Book Centers</a>
            </li>
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('account.allbooks') }}">All Books</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.issuebooks') }}">Issue Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.returnbooks') }}">Return Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.renewbooks') }}">Renew Book</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.userDonatedBooks') }}">Book Donation</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('front.giveaway') }}">Books Giveaway</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.referral') }}">Referral</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.damage') }}">Damage</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.lost') }}">Lost</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.logout') }}">Logout</a>
            </li>                                                       
        </ul>
    </div>
</div>
