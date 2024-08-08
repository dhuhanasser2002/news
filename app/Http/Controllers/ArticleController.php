<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Dailay;
use App\Models\Image;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailys = Dailay::paginate(20);
        $articles = Article::all();
        $sports = Article::whereHas('category', function ($query) {$query->where('name', 'رياضة');})->get();
        $arts = Article::whereHas('category', function ($query) {$query->where('name', 'فن');})->get();
        $webs = Article::whereHas('category', function ($query) {$query->where('name', 'ويب');})->get();
        $healthes = Article::whereHas('category', function ($query) {$query->where('name', 'صحة');})->get();
        return view('article.index', compact('articles','sports','arts','webs','healthes','dailys'));
    }

    public function searcharticle(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);
        $query = $request->input('query');

        $articles = Article::where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->get();
            $dailys = Dailay::paginate(20);
            $sports = '';
            $arts = '';
            $webs = '';
            $healthes = '';
            return view('article.index', compact('articles','sports','arts','webs','healthes','dailys'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->Authorize('create', Article::class);
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'content' => 'string',
            'feture_img'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category_id');
        $article->user_id = auth()->user()->id;
        $article->created_at;
        if($request->hasFile('feture_img')){
            $feture_img = $request->file('feture_img');
            $feture_imgname = time().".".$feture_img->getClientOriginalExtension();
            $feture_img->move(public_path('images'), $feture_imgname);
            $article->feture_img = $feture_imgname;
        }
        $article->save();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $image_name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);

                Image::create([
                    'article_id' => $article->id,
                    'image' => $image_name,
                ]);
            }
        }
        return redirect()->route('articles.index')->with('success', 'article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $this->authorize('view', $article);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required|string',
            'content' => 'text',
            'feture_img'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category_id');
        $article->user_id = auth()->user()->id;
        $article->created_at;
        if($request->hasFile('feture_img')){
            $feture_img = $request->file('feture_img');
            $feture_imgname = time().".".$feture_img->getClientOriginalExtension();
            $feture_img->move(public_path('images'), $feture_imgname);
            $article->feture_img = $feture_imgname;
        }
        $article->save();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $image_name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);

                Image::update([
                    'article_id' => $article->id,
                    'image' => $image_name,
                ]);
            }
        }
        return redirect()->route('atricles.index')->with('article updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->route('articles.index')->with('article deleted successfuly');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);
        $query = $request->input('query');

        $articles = Article::where('title', 'like', '%'.$query.'%')
                    ->orWhere('content', 'like', '%'.$query.'%')
                    ->get();

            return view('article.index', compact('articles'));
    }
}
