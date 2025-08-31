<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Center;
use App\Models\Book;
use App\Models\Donation;
use App\Models\IssueBook;
use App\Models\Damage;
use App\Models\Lost;
use App\Models\Giveaway;
use App\Models\Referral;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //This will show admin login form
    public function adminLogin()
    {
        return view('admin.admin-login');
    }

public function authenticateAdmin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'admin_email' => 'required|email',
        'admin_password' => 'required'
    ]);

    if ($validator->passes()) {
        $credentials = $request->only('admin_email', 'admin_password');

        if (Auth::guard('admins')->attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect()->route('admin.adminDashboard');
        } else {
            return redirect()->route('admin.adminlogin')->with('error', 'Either Email/Password is incorrect');
        }
    } else {
        return redirect()->route('admin.adminlogin')
            ->withErrors($validator)
            ->withInput($request->only('admin_email'));
    }
}

    //This will show dashboard
    public function dashboard()
    {
        return view('admin.admin-dashboard',[
            'categories' => Category::count(),
            'centers' => Center::count(),
            'users' => User::count(),
            'books' => book::count(),
            'issuebooks' => IssueBook::count()
        ]);
    }

    //This will show 'Manage User' Page
    public function showUser()
    {

        return view('admin.manageusers',[
            'users' => User::Paginate(5)
        ]);
    }

    //This will destroy Users
    public function destroyUsers($user_id)
    {
        User::find($user_id)->delete();
        return redirect()->route('admin.manageUsers');
    }

    //This will show 'Manage Centers' Page
    public function showCenters()
    {

        return view('admin.manageCenters',[
            'centers' => Center::Paginate(5)
        ]);
    }

    //This function will show 'Add Center' page
    public function addCenter()
    {
        return view('admin.addCenter');
    }

    //This function will Add OR Save Center in DB
    public function addCenterProcess(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'center_name' => 'required',
            'center_address' => 'required',
            'center_contact' => 'required|numeric'
        ]);

        if ($validator->passes())
        {
            $center = new Center();
            $center->center_name = $request->center_name;
            $center->center_address = $request->center_address;
            $center->center_contact = $request->center_contact;
            $center->save();

            session()->flash('success', 'New Center Added Successfully..!');

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

    //This will destroy Centers
    public function destroyCenters($id)
    {
        Center::find($id)->delete();
        return redirect()->route('admin.manageCenters');
    }
    
    
    //This will show 'Manage Categories' Page
    public function showCategories()
    {
        
        return view('admin.manageCategories',[
            'categories' => Category::Paginate(10)
        ]);
    }
    
    //This function will show 'Add Category' page
    public function addCategory()
    {
        return view('admin.addCategory');
    }

    //This function will Add OR Save Category in DB
    public function addCategoryProcess(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_name' => 'required',
        ]);

        if ($validator->passes())
        {
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->save();

            session()->flash('success', 'New Category Added Successfully..!');

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

    //This will destroy Categories
    public function destroyCategories($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.manageCategories');
    }


    //This function will show admin 'All Books' page
    public function showBooks()
    {
        $books = Book::paginate(10); // Fetch 10 books per page
        return view('admin.manageBooks', compact('books'));
    }

    //This function will show 'Add Book' page
    public function addBook()
    {
        //Using Category model to fetch categories from the DB & show on home screen
        $categories = Category::where('status',1)->orderBy('category_name','ASC')->take(8)->get();

        //Using Center model to fetch centers from the DB & show on home screen
        $centers = Center::where('status',1)->orderBy('center_name','ASC')->take(8)->get();

        return view('admin.addBook',[
            'categories' => $categories,
            'centers' => $centers,
        ]);
    }

    //This function will Add OR Save Book in DB
    public function addBookProcess(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'book_name' => 'required',
            'book_author' => 'required',
            'center' => 'required',
            'category' => 'required',
        ]);
    
        if ($validator->passes())
        {
            $book = new Book();
            $book->book_name = $request->book_name;
            $book->book_author = $request->book_author;
            $book->center_id = $request->center;
            $book->category_id = $request->category;
            $book->save();
    
            session()->flash('success', 'New Book Added Successfully..!');
    
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
    
    //This will destroy Books
    public function destroyBooks($id)
    {
        Book::find($id)->delete();
        return redirect()->route('admin.manageBooks');
    }

    //This will show 'Donated Books' page & all donations done by the users
    public function donatedBooks()
    {
        return view('admin.donatedBooks',[
            'donations' => Donation::Paginate(5)
        ]);
    }

    //This will destroy Donated Books
    public function destroyDonatedBook($id)
    {
        Donation::find($id)->delete();
        return redirect()->route('admin.donatedBooks');
    }
    
    //It will show 'Manage Issue Request' page to admin
    public function issue_request()
    {
        $data = IssueBook::all()->whereIn('status', ['Issue Request', 'Issue Approved', 'Issue Rejected']);
        return view('admin.manageIssue_Request', compact('data'));
    }
    
    // To approve the "Issue Request"
    public function approve_book($id)
    {
        $data = IssueBook::find($id);
        $status = $data->status;
        if($status == 'Issue Approved')
        {
            return redirect()->back();
        }
        else{
            $data->status = 'Issue Approved';
            $data->save();

            $bookid = $data->book_id;
            // dd($bookid);
            $book = Book::find($bookid);

            if ($book) {
                $book->status = 0;
                $book->save();
                return redirect()->back();

            } 
        }
    }

    //It will show 'Manage Return Request' page to admin
    public function return_request()
    {
        $data = IssueBook::all()->whereIn('status', ['Return Request', 'Returned', 'Returned Rejected']);
        return view('admin.manageReturn_Request', compact('data'));

        // $books = IssueBook::where('status', 'Issue Approved')->paginate(10);
        // return view('front.returnbooks', compact('books'));
    }
        
    // To approve the "Return Book" request
    public function return_book($id)
    {
        $data = IssueBook::find($id);
        $status = $data->status;
        if($status == 'Returned')
        {
            return redirect()->back();
        }
        else{
            $data->status = 'Returned';
            $data->save();
    
            $bookid = $data->book_id;
            // dd($bookid);
            $book = Book::find($bookid);
    
            if ($book) {
                $book->status = 1;
                $book->save();
                return redirect()->back();
            } 
        }
    }

    //To "Reject Issue Request"
    public function rejectIssueBook($id)
    {
        $data = IssueBook::find($id);
        $data->status = "Issue Rejected";
        $data->save();
        return redirect()->back();
    }

    //To Reject Return Request
    public function rejectReturnBook($id)
    {
        $data = IssueBook::find($id);
        $data->status = "Return Rejected";
        $data->save();
        return redirect()->back();
    }

    //this will show referral details to the admin
    public function referral_details()
    {
        return view('admin.referraldetails',[
            'referral' => Referral::Paginate(5)
        ]);

    }

    //this will show damage details to the admin
    public function damage_details()
    {
        return view('admin.damagedetails',[
            'damage' => Damage::Paginate(5)
        ]);
    }

    //this will show lost details to the admin
    public function lost_details()
    {
        return view('admin.lostdetails',[
            'lost' => Lost::Paginate(5)
        ]);

    }

    //It will show 'Manage Giveaway' page to admin
    public function giveaway_requests()
    {
        $data = Giveaway::all();
        return view('admin.giveawayRequest', compact('data'));
    }

    // To approve the "Issue Request"
    public function approve_giveawayReq($id)
    {
        $data = Giveaway::find($id);
        $status = $data->status;
        if($status == 'Issue Approved')
        {
            return redirect()->back();
        }
        else
        {
            $data->status = 'Issue Approved';
            $data->save();


            //THE BELOW CODE IS FOR CHANGING THE AVAILABILITY STATUS OF BOOK AFTER ISSUING THE STATUS IS NOT MENTIONED IN BOOK DONATION
            $donatedBookid = $data->donation_id;
            // dd($bookid);
            $donatedBook = Donation::find($donatedBookid);

            if ($donatedBook) {
                // $donatedBook->status = 0;
                $donatedBook->save();
                return redirect()->back();
            }
            return redirect()->back();
        }    
        
    }

    //To "Reject Issue Request"
    public function rejectGiveawayReq($id)
    {
        $data = Giveaway::find($id);
        $data->status = "Issue Rejected";
        $data->save();
        return redirect()->back();
    }

    //It will show 'Manage Renew Request' page to admin
    public function renew_request()
    {
        // $data = IssueBook::all();
        // return view('admin.manageIssue_Request', compact('data'));
        $data = IssueBook::whereIn('status', ['Renew Request', 'Renew Approved', 'Renew Rejected'])->paginate(10);
        return view('admin.manageRenew_Request', compact('data'));
    }

    // To approve the "Renew Request"
    public function approve_renew($id)
    {
        $data = IssueBook::find($id);
        $status = $data->status;
        if($status == 'Issue Approved')
        {
            return redirect()->back();
        }
        else{
            $data->status = 'Renew Approved';
            $data->save();

            $bookid = $data->book_id;
            // dd($bookid);
            $book = Book::find($bookid);

            if ($book) {
                $book->status = 0;
                $book->save();
                return redirect()->back();
            } 
        }
    }

    //To Reject Renew Requests
    public function rejectRenewBook($id)
    {
        $data = IssueBook::find($id);
        $data->status = "Renew Rejected";
        $data->save();
        return redirect()->back();
    }

    //This will destroy Issue Requests
    public function destroyIssueReq($issue_id)
    {
        IssueBook::find($issue_id)->delete();
        return redirect()->route('admin.issueRequests');
    }

    //This will destroy Renew Requests
    public function destroyRenewReq($renew_id)
    {
        IssueBook::find($renew_id)->delete();
        return redirect()->route('admin.renewRequests');
    }

    
}
