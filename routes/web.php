<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use Symfony\Component\HttpFoundation\AcceptHeader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/findBooks',[HomeController::class,'findBooks'])->name('findBooks');
Route::get('/aboutus',[HomeController::class,'aboutUs'])->name('aboutUs');
Route::get('/profile',[AccountController::class,'profile'])->name('profile');
Route::put('/update-profile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
Route::get('/services',[HomeController::class,'services'])->name('services');

Route::get('/register',[AccountController::class,'registration'])->name('account.registration');
Route::post('/proces-register',[AccountController::class,'registrationProcess'])->name('account.registrationProcess');

Route::get('/donate',[AccountController::class,'donate'])->name('account.donate');
Route::get('/donatedBooks',[AdminController::class,'donatedBooks'])->name('admin.donatedBooks');
Route::post('/donations/store', [AccountController::class, 'store'])->name('donations.store');

Route::get('/user-donate',[AccountController::class,'userDonatedBooks'])->name('account.userDonatedBooks');
Route::post('/donateBook/destroy/{id}', [AdminController::class, 'destroyDonatedBook'])->name('donatedBooks.destroy');


Route::get('/login',[AccountController::class,'login'])->name('account.login');
Route::post('/admin-authenticate',[AdminController::class,'authenticateAdmin'])->name('account.authenticateAdmin');

Route::group(['prefix' =>'admin','middleware' => 'checkRole'],function(){
    Route::get('/admin-dashboard',[AdminController::class,'dashboard'])->name('admin.admindashboard');

});

Route::get('/admin-login',[AdminController::class,'adminLogin'])->name('admin.adminlogin');
Route::get('/admin-dashboard',[AdminController::class,'dashboard'])->name('admin.adminDashboard');

Route::get('/manage-users',[AdminController::class,'showUser'])->name('admin.manageUsers');
Route::post('/user/destroy/{user_id}', [AdminController::class, 'destroyUsers'])->name('users.destroy');

Route::get('/manage-centers',[AdminController::class,'showCenters'])->name('admin.manageCenters');
Route::post('/proces-addCenter',[AdminController::class,'addCenterProcess'])->name('admin.addCenterProcess');
Route::post('/center/destroy/{id}', [AdminController::class, 'destroyCenters'])->name('centers.destroy');

Route::get('/manage-categories',[AdminController::class,'showCategories'])->name('admin.manageCategories');
Route::post('/proces-addCategory',[AdminController::class,'addCategoryProcess'])->name('admin.addCategoryProcess');
Route::post('/category/destroy/{id}', [AdminController::class, 'destroyCategories'])->name('categories.destroy');

Route::get('/manage-books',[AdminController::class,'showBooks'])->name('admin.manageBooks');
Route::post('/proces-addBook',[AdminController::class,'addBookProcess'])->name('admin.addBookProcess');
Route::post('/book/destroy/{id}', [AdminController::class, 'destroyBooks'])->name('books.destroy');

Route::get('/addcenter',[AdminController::class,'addCenter'])->name('admin.addCenter');
Route::get('/addcategory',[AdminController::class,'addCategory'])->name('admin.addCategory');
Route::get('/addbook',[AdminController::class,'addBook'])->name('admin.addBook');





        //<<----ISSUE ROUTES------>>//

//For showing 'Issue Books' page to the user
Route::get('/isuuebooks',[AccountController::class,'issuebooks'])->name('account.issuebooks');
//For sending Issue Request to Admin for Issuing Book 
Route::get('/issue_books/{id}',[AccountController::class,'issue_books'])->name('account.issueBooks');
//For showing users their 'Issue Requests'
Route::get('/my-issueReq', [AccountController::class,'myIssueReq'])->name('front.myIssueReq');
//For showing 'Manage Issue Request' page to Admin 
Route::get('/issue_request',[AdminController::class,'issue_request'])->name('admin.issueRequests');
//For Approving Issue Request on Admin Side
Route::get('/approve_book/{id}',[AdminController::class,'approve_book'])->name('admin.approveIssueRequests');
//For Rejecting Issue Book Request
Route::get('/reject_issue/{id}',[AdminController::class,'rejectIssueBook'])->name('admin.rejectIssueRequests');
//For Deleting Issue Requests
Route::post('/issue/destroy/{issue_id}', [AdminController::class, 'destroyIssueReq'])->name('issue.destroy');






        //<<----RETURN ROUTES------>>//

//For showing 'Return Book' page to User
Route::get('/returnbooks',[AccountController::class,'returnbooks'])->name('account.returnbooks');
//For Returning the Book
Route::get('/return_book/{id}',[AccountController::class,'return_book'])->name('account.returnRequests');
//For showing users their 'Return Requests'
Route::get('/my-returnReq', [AccountController::class,'myReturnReq'])->name('front.myReturnReq');
//For showing 'Manage Return Request' page to user
Route::get('/return_request',[AdminController::class,'return_request'])->name('admin.returnRequests');
Route::get('/return_book/{id}',[AdminController::class,'return_book'])->name('admin.approveReturnRequests');
//For Rejecting Return Book Request
Route::get('/reject_return/{id}',[AdminController::class,'rejectReturnBook'])->name('admin.rejectReturnRequests');


//Referral Routes
Route::get('/Referral-details',[AdminController::class,'referral_details'])->name('admin.referraldetails');
Route::get('/referral',[AccountController::class,'referral'])->name('account.referral');
Route::post('/referral_store',[AccountController::class,'referral_store'])->name('account.referralstore');


//Damage Routes
Route::get('/damage-details',[AdminController::class,'damage_details'])->name('admin.damagedetails');
Route::get('/damage',[AccountController::class,'damage'])->name('account.damage');
Route::post('/damage_store',[AccountController::class,'damage_store'])->name('account.damagestore');

//Lost Routes
Route::get('/lost-details',[AdminController::class,'lost_details'])->name('admin.lostdetails');
Route::get('/lost',[AccountController::class,'lost'])->name('account.lost');
Route::post('/lost_store',[AccountController::class,'lost_store'])->name('account.loststore');


//Giveaway
Route::get('/giveaway',[AccountController::class,'giveaway'])->name('front.giveaway');


Route::get('/centers',[AccountController::class,'centers'])->name('account.centers');

Route::post('/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
// Route::get('/forgot-password',[AccountController::class,'forgotpassword'])->name('account.forgotpassword');
Route::get('/allbooks',[AccountController::class,'allbooks'])->name('account.allbooks');
Route::get('/returnbooks',[AccountController::class,'returnbooks'])->name('account.returnbooks');
Route::get('/renewbooks',[AccountController::class,'renewbooks'])->name('account.renewbooks');
Route::get('/referral',[AccountController::class,'referral'])->name('account.referral');
Route::get('/damage',[AccountController::class,'damage'])->name('account.damage');




// Route to display the giveaway form with book details
Route::get('/giveaway/{id}', [AccountController::class, 'giveaway_form'])->name('giveaway.form');

// To submit giveaway form & submit form 
Route::get('/giveaway_issue/{id}',[AccountController::class,'giveawayReqSub'])->name('front.giveawayBooks');

//For showing 'Manage Giveaway' page & Giveaway Requests to Admin 
Route::get('/giveaway_request',[AdminController::class,'giveaway_requests'])->name('admin.giveawayRequests');

//For Approving Giveaway Book Request
Route::get('/approve_giveawayReq/{id}',[AdminController::class,'approve_giveawayReq'])->name('admin.approveGiveawayReq');

//For Rejecting Giveaway Issue Request
Route::get('/reject_giveawayReq/{id}',[AdminController::class,'rejectGiveawayReq'])->name('admin.rejectGiveawayReq');

//For showing 'My Giveaway Requests' page to user
Route::get('/my-requests', [AccountController::class,'myGiveawayReq'])->name('front.myRequests');



// Route to display the giveaway form with book details
Route::get('/renew/{id}', [AccountController::class, 'renew_form'])->name('renew.form');
// To submit giveaway form & submit form 
Route::get('/renew_issue/{id}',[AccountController::class,'renewReqSub'])->name('front.renewBooks');
//For showing 'Manage Renew Request' page to Admin 
Route::get('/renew_request',[AdminController::class,'renew_request'])->name('admin.renewRequests');
//For Approving Renew Request on Admin Side
Route::get('/approve_renew/{id}',[AdminController::class,'approve_renew'])->name('admin.approveRenewRequests');
//For showing 'My Giveaway Requests' page to user
Route::get('/myRenew-requests', [AccountController::class,'myRenewReq'])->name('front.myRenewReq');
//For Rejecting Renew Book Request
Route::get('/reject_renew/{id}',[AdminController::class,'rejectRenewBook'])->name('admin.rejectRenewRequests');
//For Deleting Issue Requests
Route::post('/renew/destroy/{renew_id}', [AdminController::class, 'destroyRenewReq'])->name('renew.destroy');




Route::get('/forgot-password', [AccountController::class, 'forgotpassword'])->name('account.forgotpassword');
Route::post('/process-forgot-password', [AccountController::class, 'processForgotPassword'])->name('account.processforgotpassword');

Route::get('/reset-password/{token}', [AccountController::class, 'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password', [AccountController::class, 'processResetPassword'])->name('account.processresetpassword');

// Route::post('/forgot-password', [AccountController::class, 'sendResetLinkEmail'])->name('forgot.password.send');
// // Routes for resetting password
// Route::get('/reset-password', [AccountController::class, 'showResetForm'])->name('password.reset'); // This route should define the name 'password.reset'
// Route::post('/reset-password', [AccountController::class, 'reset'])->name('password.update');