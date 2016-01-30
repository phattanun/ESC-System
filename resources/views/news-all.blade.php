@extends('masterpage')

@section('title')
    ประกาศข่าวสาร
@endsection
@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection
@section('newsNavToggle')
    active
@endsection
@section('bodyTitle')
    ข่าวสาร
@endsection
@section('content')
    <div id="myModal" class="content-modal fade">
        <div class="modal-news-container">
            <div class="modal-news-box">
                <div class="modal-news-image news-image" style="background-image:url({{asset('assets/images/news/test1.jpg')}}); "></div>
                <div class="modal-news-box-card news-box-card">
                    <div class="row news-box-head">
                        <h2>ชื่อกิจกรรม2</h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : 22/1/59</span>|<span class="updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        <p>เนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหา</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


       <div class="news-container">
        <div class="news-all">
            @foreach($news as $new)
            <div class="news-box" id="{{$new->id}}" content="{{$new->id}}" data-toggle="modal" data-target="#myModal">
                <div class="news-image" id="news-image-{{$new->id}}" style="background-image:url({{asset('assets/images/news/'.$new->image)}}); "></div>
                <div class="news-box-card">
                    <div class="tab-button-bar row">
                        <button class="col-xs-2 col-xs-offset-10 tab-button tab-button-first tab-button-edit" id="edit-{{$new->id}}" content="3"><i class="fa fa-lg fa-cogs"></i></button>
                    </div>
                    <div class="row news-box-head">
                        <h2>{{$new->title}}</h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : 22/1/59</span>|<span class="updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        <p>{{$new->content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="pagination-nav mtb-30 margin-bottom-60">
        <ul>
            <li><a href=""><i class="fa fa-angle-double-left"></i></a></li>
            <li><a href=""><i class="fa fa-angle-left"></i></a></li>

                <li id="p1"><a href="">1</a></li>

            <li><a href=""><i class="fa fa-angle-right"></i></a></li>
            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/css/news-all.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{url('assets/js/news-all.js')}}" type="text/javascript"></script>
@endsection