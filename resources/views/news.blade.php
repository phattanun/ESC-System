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
       <div class="news-container">
        <div class="news-all">

            <div class="news-box" id="3">
                <div class="news-image" id="news-image-3" style="background-image:url({{asset('assets/images/news/test1.jpg')}}); ">
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
                        <h2 id="activity-name-3">ชื่อกิจกรรม2</h2>
                        <input class="activity-name-input hide" type="text" placeholder="ชื่อกิจกรรม" id="activity-name-input-3" value="">
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : 22/1/59</span>|<span class="updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        <p id="activity-content-3">เนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหา</p>
                        <textarea class="activity-content-input hide" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input-3"></textarea>
                    </div>
                    <div class="container-fluid save-button-bar">
                        <button class="col-xs-2 col-xs-offset-8 tab-button cancel-button hide" id="cancel-button-3">ยกเลิก</button>
                        <button class="col-xs-2 tab-button save-button hide" id="save-button-3">บันทึก</button>
                    </div>
                </div>
            </div>


            <!--div class="news-box" id="1">
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

            <div class="news-box" id="2">
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
            </div-->

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
    <link href="{{url('assets/css/news.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{url('assets/js/news.js')}}" type="text/javascript"></script>
@endsection