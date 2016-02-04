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
                <div class="modal-news-image news-image"
                     style="background-image:url({{asset('assets/images/news/test1.jpg')}}); "></div>
                <div class="modal-news-box-card news-box-card">
                    <div class="row news-box-head">
                        <h2 class="modal-news-box-head">ชื่อกิจกรรม2</h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created modal-created">Created at : 22/1/59</span>|<span class="updated modal-updated">Updated at : 27/1/59</span></div>
                    </div>
                    <div class="row news-box-content">
                        <p class="modal-news-box-content">เนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหาเนื้อหา</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="news-container">
        <div class="news-all">
            @foreach($news as $new)
                <div class="news-box" id="{{$new->id}}">
                    <div class="news-image can-click" id="news-image-{{$new->id}}"
                         style="background-image:url({{asset('assets/images/news/'.$new->image)}});"
                         content="{{$new->id}}" data-toggle="modal" data-target="#myModal"></div>
                    <div class="news-box-card">
                        <div class="tab-button-bar row">
                            <button class="col-xs-2 col-xs-offset-10 tab-button tab-button-first tab-button-edit"
                                    id="edit-{{$new->id}}" content="{{$new->id}}"><i class="fa fa-lg fa-cogs"></i></button>
                        </div>
                        <div class="can-click" content="{{$new->id}}" data-toggle="modal" data-target="#myModal">
                            <div class="row news-box-head">
                                <h2>{{$new->title}}</h2>
                            </div>
                            <div class="row news-box-date">
                                <div><span class="created">Created at : {{$new->created_at}}</span>|<span class="updated">Updated at : {{$new->updated_at}}</span>
                                </div>
                            </div>
                            <div class="row news-box-content">
                                <p>{!!$new->content!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!--div class="pagination-nav mtb-30 margin-bottom-60">
        <ul>
            <li><a href=""><i class="fa fa-angle-double-left"></i></a></li>
            <li><a href=""><i class="fa fa-angle-left"></i></a></li>

            <li id="p1"><a href="">1</a></li>

            <li><a href=""><i class="fa fa-angle-right"></i></a></li>
            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div-->

    <div class="pagination-nav mtb-30 margin-bottom-60">
        <ul>
            <li><a href="{{ asset('/news/all/1')}}"><i class="fa fa-angle-double-left"></i></a></li>
            @if($page>1)<li><a href="{{ asset('/news/all/'.($page-1))}}"><i class="fa fa-angle-left"></i></a></li>@endif
            @for ($i = 1; $i <= ($count/10)+1; $i++)
                <li id="p{{$i}}"><a href="{{ asset('/news/all/'.$i) }}">{{$i}}</a></li>
            @endfor
            @if($page<floor(($count/10)+1))<li><a href="{{ asset('/news/all/'.($page+1))}}"><i class="fa fa-angle-right"></i></a></li>@endif
            <li><a href="{{ asset('/news/all/'.floor(($count/10)+1))}}"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/css/news-all.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('js')
    <script>
    /* ----------------------------------------------------------------------*/
    /* Modal   ------------------------------------------------------------- */
    /* ----------------------------------------------------------------------*/
    var prev_url;

    $(".can-click").click(function(e){
        var content_id=$(this).attr("content");
        prev_url=document.URL;
        window.history.replaceState("object or string", "Title", "/news/content/"+content_id);
        open_modal(content_id);
    });

    $(".tab-button-edit").click(function(e){
        var content_id=$(this).attr("content");
        window.location.href = "/news/content/"+content_id;

    });

    $(".content-modal").click(function(e){
        if($(e.target).is('.content-modal') ){
            window.history.replaceState("object or string", "Title", prev_url);
        }
    });

    function open_modal(content_id){
        var URL_ROOT = '{{Request::root()}}';
        $.post(URL_ROOT + '/open_modal',
        { id: content_id , page: '{{$page}}}',_token:'{{csrf_token()}}'  } ).done(function( input ) {

            $(".modal-news-box-head").text(input[0]['title']);
            $(".modal-news-box-content").html(input[0]['content']);
            $(".modal-created").text("Created at : "+input[0]['created_at']['date']);
            $(".modal-updated").text("Updated at : "+input[0]['updated_at']['date']);
            $(".modal-news-image").remove();
            var txt = '<div class="modal-news-image news-image" style="background-image:url({{asset('assets/images/news/')}}/'+input[0]['image']+');">'+'</div>';
            $(".modal-news-box").prepend(txt);

        });
    }

    /* ----------------------------------------------------------------------*/
    /* respondsive  -------------------------------------------------------- */
    /* ----------------------------------------------------------------------*/

    $( document ).ready(function() {
        checkRespond();
    });

    $(window).resize(function() {
        checkRespond();
    });

    function checkRespond(){
        var $windowSize = $(window).width();
        if ($windowSize < 768 ){
            $(".tab-button-edit").removeClass("col-xs-offset-10");
            $(".tab-button-edit").addClass("col-xs-offset-9");
            $(".tab-button-edit").removeClass("col-xs-2");
            $(".tab-button-edit").addClass("col-xs-3");
        }
        else{
            $(".tab-button-edit").removeClass("col-xs-offset-9");
            $(".tab-button-edit").addClass("col-xs-offset-10");
            $(".tab-button-edit").removeClass("col-xs-3");
            $(".tab-button-edit").addClass("col-xs-2");
        }
    }
    </script>
@endsection