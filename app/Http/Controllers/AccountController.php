<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Center;
use App\Models\Book;
use App\Models\IssueBook;
use App\Models\Donation;
use App\Models\Referral;
use Carbon\Carbon;
use App\Models\Damage;
use App\Models\Lost;
use App\Models\Giveaway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    //It will show registration page to the user
    public function registration()
    {
        return view('front.registration');
    }

    //It will save user in DB after registration
    public function registrationProcess(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'contact_no' => 'required|numeric',
            'password' => 'required|min:5|same:c_password',
            'c_password' => 'required',
        ]);

        if ($validator->passes()) 
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_no = $request->contact_no;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'You have registered successfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    //To show book donation form to the user
    public function donate()
    {
        //Using Category model to fetch categories from the DB & show on home screen

        $categories = Category::where('status',1)->orderBy('category_name','ASC')->take(8)->get();

        //Using Center model to fetch centers from the DB & show on home screen
        $centers = Center::where('status',1)->orderBy('center_name','ASC')->take(8)->get();

        return view('front.donation',[
            'categories' => $categories,
            'centers' => $centers,
        ]);
    }

    //This will store donated books in DB
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'donated_book_name' => 'required|string',
            'donor_name' => 'required|string',
            'donated_author' => 'required|string',
            'category' => 'required|exists:categories,id',
            'center' => 'required|exists:centers,id',
            'donated_date' => 'required|date',
        ]);

        // Create a new Donate instance
        $donation = new Donation();

        // Assign values from the form
        $donation->donated_book_name = $request->donated_book_name;
        $donation->donor_name = $request->donor_name;
        $donation->donated_author = $request->donated_author;
        $donation->category_id = $request->category;
        $donation->center_id = $request->center;
        $donation->user_id = Auth::user()->id;
        $donation->donated_date = $request->donated_date;

        // Save the Donate instance
        $donation->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'You have donated the Book successfully!');
    }

    //It will show all the books donated by the user
    public function userDonatedBooks()
    {
    
        // Fetch the currently logged-in user
        $user = Auth::user();

        // Fetch the donations made by the currently logged-in user
        $donations = Donation::where('user_id', $user->id)
            ->with('user')
            ->paginate(5);

        // Load the view with the donations data
        return view('front.userDonatedBooks', ['donations' => $donations]);
    }


    //To show login page to user
    public function login()
    {
        return view('front.login');
    }

    //To show Forgot Password page to user
    public function forgotpassword()
    {
        return view('front.forgotpassword');
    }

    //For the Authentication
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('profile');
            } else {
                return redirect()->route('account.login')->with('error', 'Either Email/Password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    public function centers()
    {

        //To get the id of user which is logged in
        $id = Auth::user()->id;

        //To get the info of the user which is logged in
        // $user = User::where('id',$id)->first();
        // OR
        $user = User::find($id);


        $centers = Center::orderBy('center_name', 'ASC')->where('status',1)->get();

        // $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();

        // Passing user info in profile.blade so we can use it there
        return view('front.centers', [
            'user' => $user,
            'centers' => $centers,

        ]);
    }

    //This function will show users 'All Books' page
    public function allbooks()
    {
        $books = Book::paginate(10); // Fetch 10 books per page
        return view('front.allbooks', compact('books'));
    }

    //This function will logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }

    //This function will show users 'Issue Books' page
    public function issuebooks()
    {
        $books = Book::paginate(10); // Fetch 10 books per page
        return view('front.issuebooks', compact('books'));
    }

    //For showing users their 'Issue Requests'
    public function myIssueReq()
    {
        $userId = Auth::id();
        $issuedBooks = IssueBook::where('user_id', $userId)
        ->whereIn('status', ['Issue Request', 'Issue Approved', 'Issue Rejected'])
        ->paginate(10); 
        return view('front.my-issueReq', compact('issuedBooks'));
    }      

    //Sending Request to Admin for Issuing Book 
    public function issue_books($id)
    {
        $book = Book::find($id);
        $book_id = $id;

        $availability = $book->status;
        //dd($availability);

        if ($availability == 1)
        {
            if (Auth::id())
            {
                $user_id = Auth::user()->id;
                $issue_book = new IssueBook;

                $issue_book->book_id = $book_id;
                $issue_book->user_id = $user_id;
                $issue_book->status = 'Issue Request';
                $issue_book->save();

                return redirect()->back()->with('message', 'A request is sent to admin to Issue Book');

            }
            else {
                return redirect('/login');
            }
        }
        else {
            return redirect()->back()->with('message', 'Book Not Available');
        }
    }

    public function returnbooks()
    {
        $userId = Auth::id();
        $books = IssueBook::where('user_id', $userId)->where('status', 'Issue Approved')->paginate(10);
        return view('front.returnbooks', compact('books'));
    }

    // Sending Request to Admin for Returning Book
    public function return_book($id)
    {
        $book = Book::find($id);
        $issued_book_show = IssueBook::find($id);

        if (!$book) {
            return redirect()->back()->with('message', 'Book Not Found');
        }

        $staus = $issued_book_show->status;

        if ($staus == 'Issue Approved')
        {
            if (Auth::check())
            {
            $user_id = Auth::id();
            $return_book = new IssueBook;

            $return_book->book_id = $id;
            $return_book->user_id = $user_id;
            $return_book->status = 'Return Request';
            $return_book->save();

            return redirect()->back()->with('message', 'A request is sent to admin to Return Book');
            }
            else {
                return redirect('/login');
            }
            }
        else {
            return redirect()->back()->with('message', 'Book Not Available for return');
        }
    }

    //For showing users their 'Issue Requests'
    public function myReturnReq()
    {
        $userId = Auth::id();
        $returnedBooks = IssueBook::where('user_id', $userId)->whereIn('status', ['Return Request', 'Returned', 'Return Rejected'])->paginate(10);
     
        return view('front.my-returnReq', compact('returnedBooks'));
    }

    
    //This function will show users 'Refferal' page
    public function referral()
    {
        return view('front.referral');
    }

    //this function will save the data of referral form in database
    public function referral_store(Request $request)
    {

        $validatedData = $request->validate([
            'reffered_first_name' => 'required|string',
            'reffered_last_name' => 'required|string',
            'reffered_email' => 'required|email',
            'reffered_contact' => 'required|numeric',
            'reffered_message' => 'required|string',
            
        ]);

         //Create a new referral instance
        $referral = new Referral();

       //  Assign values from the form
        $referral->reffered_first_name = $request->reffered_first_name;
        $referral->reffered_last_name = $request->reffered_last_name;
        $referral->reffered_email = $request->reffered_email;
        $referral->reffered_contact = $request->reffered_contact;
        $referral->reffered_message = $request->reffered_message;
        //$referral->user_id = Auth::user()->id;
        

        // Save the Donate instance
        $referral->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'You have successfully reffered!');
    }


    //This function will show users 'Damage' page
    public function damage()
    {
        return view('front.damage');
    }

    //this function will save the data of damage form in database
    public function damage_store(Request $request)
    {
 
         $validatedData = $request->validate([
            'damaged_book_name' => 'required|string',
            'issue_date' => 'required|date',
            'damage_lost' => 'required',
            'contact_no' => 'required|numeric',
            'damage_loss_datetime' => 'required',
            'user' => 'required|string',
            'damage_loss_description' => 'required|string',
             
        ]);
 
        //Create a new damage instance
         $damage = new Damage();
 
        //  Assign values from the form
         $damage->damaged_book_name = $request->damaged_book_name;
         $damage->issue_date = $request->issue_date;
         $damage->damage_lost = $request->damage_lost;
         $damage->contact_no = $request->contact_no;
         $damage->damage_loss_datetime = $request->damage_loss_datetime;
         $damage->user = $request->user;
         $damage->damage_loss_description = $request->damage_loss_description;
         
         
 
         // Save the Damage instance
         $damage->save();
 
         // Redirect back with success message
         return redirect()->back()->with('success', 'Your Damaged Book details are successfully submitted..!');
    }

    //This function will show users 'Lost' page
    public function lost()
    {
        return view('front.lost');
    }

    //this function will save the data of lost form in database
    public function lost_store(Request $request)
    {
 
         $validatedData = $request->validate([
            'lost_book_name' => 'required|string',
            'issue_date' => 'required|date',
            'contact_no' => 'required|numeric',
            'lost_datetime' => 'required',
            'user' => 'required|string',
            'loss_description' => 'required|string',
             
        ]);
 
        //Create a new damage instance
         $lost = new Lost();
 
        //  Assign values from the form
         $lost->lost_book_name = $request->lost_book_name;
         $lost->issue_date = $request->issue_date;
         $lost->contact_no = $request->contact_no;
         $lost->lost_datetime = $request->lost_datetime;
         $lost->user = $request->user;
         $lost->loss_description = $request->loss_description;
         
         
 
         // Save the Damage instance
         $lost->save();
 
         // Redirect back with success message
         return redirect()->back()->with('success', 'Your Lost Book details are successfully submitted..!');
    }

    


    //For showing the 'Books Giveaway' page 
    public function giveaway()
    {
        $donatedBooks = Donation::all(); // Fetch 10 books per page
        return view('front.giveaway', compact('donatedBooks'));
    }


    //For showing giveaway form with the user & donated books data
    public function giveaway_form($id)
    {
        $userId = auth()->user()->id;

        $userDonations = Donation::where('user_id', $userId)->count();

        // Find the book by its ID
        $donatedBooks = Donation::findOrFail($id);

        return view('front.giveawayForm', compact('userDonations', 'donatedBooks'));
    }


    //Sending Request & submitting giveaway form to get the Giveaway Books
    public function giveawayReqSub($id)
    {
        $donatedBook = Donation::find($id);
        $donatedBook_id = $id;

        // $availability = $book->status;
        //dd($availability);

            if (Auth::id())
            {
                $user_id = Auth::user()->id;
                $donatedBook_Issue = new Giveaway();

                $donatedBook_Issue->donation_id = $donatedBook_id;
                $donatedBook_Issue->user_id = $user_id;
                $donatedBook_Issue->status = 'Issue Request';
                $donatedBook_Issue->save();

                return redirect()->back()->with('success', 'A request is sent to admin to Issue Book..!!');
            }
            else {
                return redirect('/login');
            }
    }

    //For showing users 'My Request' page with their requests
    public function myGiveawayReq()
    {
        $userId = Auth::id();
        $donatedBooks = Giveaway::where('user_id', $userId)->with('donation')->paginate(10);
 
        return view('front.myGiveawayReq', compact('donatedBooks'));
    }      
    
    

    //This function will show users 'Renew Books' page
    public function renewbooks()
    {
        $userId = Auth::id();
        $books = IssueBook::where('user_id', $userId)->where('status', 'Issue Approved')->paginate(10);
        return view('front.renewbooks', compact('books'));
    }

    //For showing giveaway form with the user & donated books data
    public function renew_form($id)
    {
        $userId = auth()->user()->id;

        $userIssue = IssueBook::where('user_id', $userId)->count();

        // Find the book by its ID
        $issuedBooks = IssueBook::findOrFail($id);

        return view('front.renewForm', compact('userIssue', 'issuedBooks'));
    }

    
public function renewReqSub(Request $request, $id)
{
    $issuedBook = IssueBook::find($id);

    if (!$issuedBook) {
        return redirect()->back()->with('error', 'Book not found.');
    }

    if (Auth::check()) {
        $user_id = Auth::user()->id;

        // Calculate new due date by adding 7 days to the existing due date
        $newDueDate = Carbon::parse($issuedBook->due_date)->addDays(7);

        $renew_book = new IssueBook;

        $renew_book->book_id = $issuedBook->book_id;
        $renew_book->user_id = $user_id;
        $renew_book->due_date = $newDueDate;
        $renew_book->status = 'Renew Request';
        $renew_book->save();

        return redirect()->back()->with('success', 'A request is sent to admin to Renew Book..!!');
    } else {
        return redirect('/login');
    }
}

    //For showing users 'My Renew Requests' page with their requests
    public function myRenewReq()
    {
        $userId = Auth::id();
        $books = IssueBook::where('user_id', $userId)->whereIn('status', ['Renew Request', 'Renew Approved', 'Renew Rejected'])->paginate(10);
        return view('front.myRenewReq', compact('books'));
    }

    public function processForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails())
        {
            return redirect()->route('account.forgotpassword')->withInput()->withErrors($validator);
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send Email Here
        $user = User::where('email', $request->email)->first();
        $mailData = [
            'token' => $token,
            'user' => $user,
            'subject' => 'You have requested to change your password',
        ];

        Mail::to($request->email)->send(new ResetPasswordEmail($mailData));
        return redirect()->route('account.forgotpassword')->with('success', 'Reset password email has been sent to your inbox');

    }


    public function resetPassword($tokenString)
    {
        $token = DB::table('password_reset_tokens')->where('token', $tokenString)->first();

        if($token == null)
        {
            return redirect()->route('account.forgotpassword')->with('error', 'Invalid token..!!');
        }

        return view('front.reset-password',[
            'tokenString' => $tokenString
        ]);
    }

    public function processResetPassword(Request $request)
    {
        $token = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if($token == null)
        {
            return redirect()->route('account.forgotpassword')->with('error', 'Invalid token..!!');
        }

        $validator = Validator::make($request->all(),[
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('account.resetPassword', $request->token)->withErrors($validator);
        }

        User::where('email', $token->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('account.login')->with('succeess', 'You have successfully changed your password..!!');
    }

    public function profile()
    {
        //To get the id of user which is logged in
        $id = Auth::user()->id;

        //To get the info of the user which is logged in
        // $user = User::where('id',$id)->first();
        // OR
        $user = User::find($id);

        // Passing user info in profile.blade so we can use it there
        return view('front.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            //for ensuring that user should not update email with the emailid that already exists
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            // 'contact_no' => 'required|numeric',
            
        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_no = $request->mobile;
            $user->save();

            session()->flash('success', 'Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    
}