<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutingController extends Controller
{
    public function index(){
        $categories = Category::all();
        $datas = DB::table('articles')
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.name')
            ->get();
            
        return view('homepage', ['categories' => $categories, 'datas' => $datas, 'title' => '']);
    }

    public function category(Request $request, $text){
        $categories = Category::all();
        $datas = DB::table('articles')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->where('name', $text)
            ->select('articles.*', 'categories.name')
            ->get();

        return view('homepage', ['categories' => $categories, 'datas' => $datas, 'title' => $text]);
    }

    public function about_us(){
        $categories = Category::all();

        return view('about_us', ['categories' => $categories]);
    }

    public function Login(){
        $categories = Category::all();

        return view('login', ['categories' => $categories]);
    }

    public function manage_user(){
        $categories = Category::all();

        $users = User::where('role','User')->get();

        return view('manage_user', ['categories' => $categories, 'users' => $users]);
    }

    public function signup(){
        $categories = Category::all();

        return view('signup', ['categories' => $categories]);
    }

    public function profile(){
        $categories = Category::all();

        return view('profile', ['categories' => $categories]);
    }

    public function create_blog(){
        $categories = Category::all();

        return view('create_blog', ['categories' => $categories]);
    }
}
