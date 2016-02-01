<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        //return $page;
        $news = News::orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
        $count = sizeof(News::get());

        foreach ($news as &$x) {
            $x->content = str_limit($x->content, $limit = 300, $end = '...');
        }

        if (count($news) == 0 || $page <=0) {
            abort(404);
        }

        return view('/news-all' , compact('$user','news','count','page','user'));
        return view('/news-all')->with('user',$user);
        return compact('news-all','count','page');
        return view('/news-all' , compact('news','count','page'));

    }

    public function all_news_no_page()
    {
        return $this->all_news(1);
    }

    public function open_modal(Request $request)
    {
        $user = Auth::user();
        $tmp=[];
        $news = News::where('id',$request->id)->get();

        foreach ($news as &$x)
            array_push($tmp, [
                'title' => $x->title,
                'content' => $x->content,
                'image' => $x->image,
                'created_at' => $x->created_at,
                'updated_at'=> $x->updated_at
            ]);

        return $tmp;
    }

    public function save_news(Request $request)
    {
        $user = Auth::user();
        $new = News::where('id',$request->id)->first();
        //return $new;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->updated_at = Carbon::now();
        $new->save();
        return "success";
    }

    public function update_news(Request $request)
    {
        return "OK";
        $user = Auth::user();
        $new = News::where('id',$request->id)->first();
        //return $new;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->updated_at = Carbon::now();
        $new->save();
        return "success";
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
    public function show_content($id)
    {
        $user = Auth::user();

        $news = DB::table('news')->where('id',$id)->get();
        //return $news;
        return view('/content',compact('$user','news','count','page','user'));
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
