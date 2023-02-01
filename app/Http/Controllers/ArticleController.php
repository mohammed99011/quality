<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function indexArticle($id)
     {
         //
         $articles = Article::where('author_id', $id)->orderBy('created_at', 'desc')->paginate(5);
         return response()->view('cms.article.index', compact('articles','id'));
     }

     public function createArticle($id)
     {
         $authors = Author::all();
         $categories = Category::where('status' , 'active')->get();
 
         return response()->view('cms.article.create' , compact('authors' , 'categories' , 'id'));
     }

    public function index()
    {
        $articles = Article::orderBy('id' , 'desc')->paginate(5);

        return response()->view('cms.article.indexAll' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::where('status' , 'active')->get();

        return response()->view('cms.article.create' , compact('authors' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() , [

        ]);

        if(! $validator->fails()){

            $articles = new Article();

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
                }

            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->author_id = $request->get('author_id');
            $articles->category_id = $request->get('category_id');

            $isSaved = $articles->save();

            return response()->json([
                'icon' => $isSaved ? 'success' : 'error',
                'title' => $isSaved ? 'Created is Successfully' : 'Created is Failed',
            ] , $isSaved ? 200 : 400);
        }

        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
