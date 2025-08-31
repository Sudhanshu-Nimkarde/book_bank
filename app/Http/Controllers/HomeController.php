<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Center;
use App\Models\Book;

class HomeController extends Controller
{
    //To show home page
    public function index(){
        
        $newCategories = Category::orderBy('category_name', 'ASC')->get();
        $newCenters = Center::orderBy('center_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'ASC')->take(6)->get();
        $centers = Center::orderBy('center_name', 'ASC')->take(6)->get();
        $books = Book::orderBy('book_name', 'ASC')->take(6)->get();

        return view('front.home',[
            'categories' => $categories,
            'centers' => $centers,
            'books' => $books,
            'newCategories' => $newCategories,
            'newCenters' => $newCenters,
        ]);
    }

    //This function will show users 'Find Books' page
    public function findBooks()
    {
        $books = Book::paginate(10); // Fetch 10 books per page
        return view('front.findBooks', compact('books'));
    }

    //To show 'About Us' page
    public function aboutUs(){
        return view('front.aboutUs');
    }

    //To show 'Services' page
    public function services(){
        return view('front.services');
    }

}
