@extends('masterpage')

@section('title')
    กิจกรรม....
@endsection
@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection
@section('newsNavToggle')
    active
@endsection
@section('bodyTitle')
    {{$news[0]->title}}
@endsection
@section('content')
    <div class="news-container">
        <div class="news-all">

            <div class="news-box" id="3">
                <div class="news-image" id="news-image-3" style="background-image:url({{asset('assets/images/news/'.$news[0]->image)}}); ">
                    <div class="browse-bar container-fluid hide" id="browse-bar-3">
                        <div class="row"><input type="file" class="col-xs-12 tab-button browse-button" id="browse-button-3"></div>
                        <div class="row"><input type="submit" class="col-xs-2 col-xs-offset-10 browse-save-button" value="บันทึก" id="browse-save-button-3"></div>
                    </div>
                </div>
                <div class="news-box-card">
                    <div class="tab-button-bar row">
                        <button class="col-xs-1 tab-button tab-button-first tab-button-trash col-xs-offset-9" id="trash-3"><i class="fa fa-lg fa-trash"></i></button>
                        <button class="col-xs-1 tab-button tab-button-edit" id="edit-3"><i class="fa fa-lg fa-cogs"></i></button>
                        <button class="col-xs-1 tab-button tab-button-home" id="home-3"><i class="fa fa-lg fa-home"></i></button>
                    </div>
                    <div class="row news-box-head">
                        <h2 id="activity-name-3">{{$news[0]->title}}</h2>
                        <input class="activity-name-input hide" type="text" placeholder="ชื่อกิจกรรม" id="activity-name-input-3" value="{{$news[0]->title}}">
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : {{$news[0]->created_at}}</span>|<span class="updated">Updated at : {{$news[0]->updated_at}}</span></div>
                    </div>
                    <div class="row news-box-content">
                        <p id="activity-content-3">{{$news[0]->content}}</p>
                        <textarea class="activity-content-input hide" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input-3">{{$news[0]->content}}</textarea>
                    </div>
                    <div class="container-fluid save-button-bar">
                        <button class="col-xs-2 col-xs-offset-8 tab-button cancel-button hide" id="cancel-button-3">ยกเลิก</button>
                        <button class="col-xs-2 tab-button save-button hide" id="save-button-3">บันทึก</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/css/content.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{url('assets/js/content.js')}}" type="text/javascript"></script>
@endsection