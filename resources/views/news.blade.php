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
@section('content')

    <div class="news-head">
        <h1>ข่าวสาร</h1>
    </div>

    <div class="news-container">
        <div class="news-all">
            <div class="news-box" id="1">
                <div class="news-image" style="background-image:url({{asset('assets/images/news/cover.jpg')}}); "></div>
                <div class="news-box-card">
                    <div class="row news-box-head">
                        <h2>ชื่อกิจกรรม1</h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : 22/1/59</span>|<span class="updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        เนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหา
                    </div>
                </div>
            </div>

            <div class="news-box" id="1">
                <div class="news-image" style="background-image:url({{asset('assets/images/news/test1.jpg')}}); "></div>
                <div class="news-box-card">
                    <div class="tab-button-bar row">
                        <button class="col-xs-1 tab-button tab-button-first col-xs-offset-9"><i class="fa fa-lg fa-trash"></i></button>
                        <button class="col-xs-1 tab-button"><i class="fa fa-lg fa-cogs"></i></button>
                        <button class="col-xs-1 tab-button"><i class="fa fa-lg fa-home"></i></button>
                    </div>
                    <div class="row news-box-head">
                        <h2>ชื่อกิจกรรม2</h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : 22/1/59</span>|<span class="updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        เนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหา
                    </div>
                </div>
            </div>

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
    <link href="assets/css/news.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="assets/js/news.js" type="text/javascript"></script>
@endsection