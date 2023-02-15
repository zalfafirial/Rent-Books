<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('admin.dashboard', ['book_count' =>
         $bookCount, 'category_count' => $categoryCount, 'user_count'=> $userCount]);
        
    }

    public function user()
    {
        $users = User::where('roles_id', 2)->where('status', 'active')->get();
        return view('admin.user', ['users' => $users]);
    }

    public function usersRegistered()
    {
        $usersRegistered = User::where('roles_id', 2)->where('status', 'inactive')->get();
        return view('admin.users-registered', ['usersRegistered'=> $usersRegistered]);
    }

    public function userDetail($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('admin.user-detail',['user' => $user]);
    }

    public function userApprove($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User Approved Successfuly');
    }

    public function userBan($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('user')->with('status', 'User Deleted Successfuly');
    }


    public function userBanned()
    {
        $usersBanned = User::onlyTrashed()->get();
        return view('admin.user-banned', ['usersBanned' => $usersBanned]);
    }

    public function userRestore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('user')->with('status', 'User Restore Successfuly');
    }

    public function category()
    {
        $categories = category::all();
        return view('admin.category', ['categories'=> $categories]);
    }

    public function books()
    {
        $book = Book::all();
         return view('admin.books', ['book'=> $book]);
    }

    public function booksAdd()
    {
        $categories = Category::all();
        return view('admin.add-book', ['categories'=> $categories]);
    }

    public function booksEdit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin.edit-book', ['books'=> $books, 'categories'=> $categories]);
    }

    public function booksUpdate(Request $request, $slug)
    {
        if($request->file('image')){
            $extension = $request->file('image')
            ->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());
    if($request->categories){
        $books->categories()->sync($request->categories);
    }
        return redirect('books')->with('status', 'Book Update Successfuly');
    }

    public function booksDestroy($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $books->delete();
        return redirect('books')->with('status', 'Book Deleted Succsessfully');
    }

    public function booksStore(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books',
            'title'=> 'required',
        ]); 

        $newName = '';

        if($request->file('image')){
            $extension = $request->file('image')
            ->getClientOriginalExtension();
            $newName = $request->title.'_'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;

        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book Added Successfuly');
        
    }
    public function rentlogs()
    {
        return view('admin.rentlogs');
    }

    public function categoryAdd()
    {
        return  view('admin.add-category');
    }

    public function categoryStore(Request $request)
    {
        //validate sebuah data masuk atau tidak
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        //memasukan data ke database
        $category = Category::create($request->all ());
        return redirect('category')->with('status', 'Category Added Succsessfully');
    }

    public function categoryEdit($slug)
    {
        return view('admin.edit-category', ['category'=> $category]);
    }

    public function categoryUpdate(Request $request,$slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::where('slug', $slug)->first();
        $category->slug=null;
        $category->update($request->all());
        return redirect('category')->with('status', 'Category Added Succsessfully');
    }

    public function categoryDestroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('status', 'Category Deleted Succsessfully');
    }

    
}
