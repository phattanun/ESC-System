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

    public function view()
    {
        return $this->view_page(1);
    }

    public function view_page($page)
    {
        $news = News::orderBy('updated_at', 'desc')->skip(($page - 1) * 10)->take(10)->get();
        $count = sizeof(News::get());

        foreach ($news as &$x) {
            $x->content = str_limit($x->content, $limit = 300, $end = '...');
        }

        if (count($news) == 0 || $page <=0) {
            abort(404);
        }

        return view('/news-all' , compact('news','count','page'));
        return view('/news-all');
        return compact('news-all','count','page');
        return view('/news-all' , compact('news','count','page'));
    }

    public function view_home()
    {
        $news = News::orderBy('updated_at', 'desc')->where('at_home',true)->get();

        foreach ($news as &$x) {
            $x->content = str_limit($x->content, $limit = 300, $end = '...');
        }

        if (count($news) == 0) {
            abort(404);
        }

        return view('/news-home' , compact('news'));
        return view('/news-all');
        return compact('news-all','count','page');
        return view('/news-all' , compact('news','count','page'));
    }


    public function view_content($id)
    {
        $news = DB::table('news')->where('id',$id)->get();
        //return $news;
        return view('/news-content',compact('news'));
    }

    public function view_modal(Request $request)
    {
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

    public function create()
    {
        if(is_null(Auth::user()))
            return abort('404');

        return view('/news-create');
    }

    public function create_content(Request $request)
    {
        if(is_null(Auth::user()))
            return abort('404');

        $title = Input::get('title');
        $content = Input::get('content');
        $at_home = Input::get('at_home');

        if($request->hasFile('image')) {
          if($request->file('image')->getClientSize() > 200000)
            die;
          $imageData = 'data:'.$request->file('image')->getClientMimeType().';base64,'.base64_encode(file_get_contents($request->image));
        }
        else $imageData = false;

        $new = News::create();
        $new->title = $title;
        $new->content = $content;
        $new->at_home = $at_home;
        if($imageData)
          $new->image = $imageData;
        $new->created_at = Carbon::now();
        $new->updated_at = Carbon::now();
        $new->save();


        return $this->view_content($new->id);
    }

    public function save_news(Request $request)
    {
        if(is_null(Auth::user()))
            return abort('404');

        $new = News::where('id',$request->id)->first();
        //return $new;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->updated_at = Carbon::now();
        $new->save();
        return "success";
    }

    public function update($id, Request $request)
    {
        if(is_null(Auth::user()))
            return abort('404');

        $title = Input::get('title');
        $content = Input::get('content');
        $at_home = Input::get('at_home');

        if($request->hasFile('image')) {
          if($request->file('image')->getClientSize() > 200000)
            die;
          $imageData = 'data:'.$request->file('image')->getClientMimeType().';base64,'.base64_encode(file_get_contents($request->image));
        }
        else $imageData = false;


        $new = News::where('id',$id)->first();

        $new->title = $title;
        if($imageData)
          $new->image = $imageData;
        $new->content = $content;
        $new->at_home = $at_home;
        $new->updated_at = Carbon::now();
        $new->save();
        return $this->view_content($id);
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
        return $tmp;
*/
    }

    public function upload_image(Request $request) {
        $updateData = array('post' => $request->all() );
        if($request->hasFile('image')) {
          if($request->file('image')->getClientSize() > 200000)
            die;
          $imageData = 'data:'.$request->file('image')->getClientMimeType().';base64,'.base64_encode(file_get_contents($request->image));
          $updateData['image'] = $imageData;
        }
        return $updateData;
    }

    public function remove(Request $request)
    {
        if(is_null(Auth::user()))
            return abort('404');
        $new = News::find($request->id)->delete();
        return "success";
    }

}
