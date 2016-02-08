<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
//use Request;



use App\Picture;
use App\Permission;


class NewsController extends Controller
{

    public function index()
    {
        return $this->all_news(1);
    }

    public function all_news($page)
    {
        $user = $this->getUser();

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

    public function remove_news(Request $request)
    {
        /*$new = News::find($request->id);
        $new->deleted = true;
        $new->save();
        return "success";*/
        $new = News::find($request->id)->delete();
        return "success";
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

    public function create_news()
    {
        return view('/create_news');
    }

    public function create_news_content()
    {
        $title = Input::get('title');
        $content = Input::get('content');
        $at_home = Input::get('at_home');

        $new = News::create();
        $new->title = $title;
        $new->content = $content;
        $new->at_home = $at_home;
        $new->created_at = Carbon::now();
        $new->updated_at = Carbon::now();
        $new->save();


        return $this->show_content($new->id);
    }

    public function update_news($id)
    {
        $user = Auth::user();

        $title = Input::get('title');
        $content = Input::get('content');
        $at_home = Input::get('at_home');
        /*$image = Input::get('image');

        $temp = Input::file('image');
        if (isset($temp)) {
            return "1";
            $path = 'assets/images/news';
            Request::file('image')->move($path, $image);
        }
        return "2";
*/

        $new = News::where('id',$id)->first();
        //return $new;
        $new->title = $title;
        $new->content = $content;
        $new->at_home = $at_home;
        $new->updated_at = Carbon::now();
        $new->save();
        return $this->show_content($id);
/*
        $password = Input::get('password');
        $remember = Input::get('checkbox-inline');

        return Redirect::back();
        $user = Auth::user();
        $new = News::where('id',$request->id)->first();
        $tmp =[];
        array_push($tmp, [
            'title' => $new->title,
            'content' => $new->content,
            'image' => $new->image,
            'created_at' => $new->created_at,
            'updated_at'=> $new->updated_at
        ]);
        return $tmp;*/
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
        $user = $this->getUser();

        $news = DB::table('news')->where('id',$id)->get();
        //return $news;
        return view('/content',compact('$user','news'));
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
