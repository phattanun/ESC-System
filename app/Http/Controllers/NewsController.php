<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;



class NewsController extends Controller
{

    public function index($category,$page)
    {
        //return compact('category','page');
        if($category=='all') {
            $articles = DB::table('articles')->orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
            $count = sizeof(DB::table('articles')->get());
        }
        else if($category=='study') {
            $articles = DB::table('articles')->where('category', 'การเรียน')->orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
            $count = sizeof(DB::table('articles')->where('category', 'การเรียน')->get());
        }
        else if($category=='etc') {
            $articles = DB::table('articles')->where('category', 'อ่านเล่น')->orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
            $count = sizeof(DB::table('articles')->where('category', 'อ่านเล่น')->get());
        }
        else{
            $articles = '';
            $count = 0;
        }
        //return compact('articles','count');
        //dd($article);
        foreach ($articles as &$x) {
            $x->content = str_limit($x->content, $limit = 300, $end = '...');
        }

        //return $article;
        /*return view('/blog',[
            'article'=>$article,
            'count' => $count
        ]);*/

        if (count($articles) == 0 || $page <=0) {
            abort(404);
        }

        return view('/blog' , compact('articles','count','category','page'));

    }

    public function all_news($page)
    {
        //return $page;
        $news = DB::table('news')->orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
        $count = sizeof(DB::table('news')->get());
        return view('/news');
        return compact('news','count','page');
        return view('/news' , compact('news','count','page'));

    }

    public function all_news_no_page()
    {
        return $this->all_news(1);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = DB::table('articles')->where('id',$id)->first();
        //var_dump($article); die();
        return view('/article',[
            'article'=>$article,
        ]);
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
