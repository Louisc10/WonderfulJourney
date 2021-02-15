<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function view($id){
        $categories = Category::all();
        $article = Article::find($id);

        return view('full_story', ['categories' => $categories, 'article' => $article]);
    }

    public function view_by_user(){
        $categories = Category::all();
        $articles = Article::where('user_id',Auth::user()->id)->get();
        
        return view('list_blog', ['categories' => $categories, 'articles' => $articles]);
    }
    
    public function delete_article($id){
        Article::destroy($id);
        
        return back()->withInput();
    }

    public function create_blog(CreateBlogRequest $request){
        
        $image_path = $request->file('image')->store('','public');

        DB::table('articles')->insert([
            'user_id' => Auth::user()->id,
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'created_at' => now(),
            'updated_at' => now(),
            'image' => $image_path,
        ]);
        
        return back()->withInput();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
