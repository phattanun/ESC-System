@extends('masterpage')

@section('title')
    ประกาศข่าวสาร
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
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
                        <h2 class="modal-news-box-head"></h2>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created modal-created"></span><span class="updated modal-updated"></span></div>
                    </div>
                    <div class="row news-box-content">
                        <p class="modal-news-box-content"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="news-container">
        @if(isset($user['news']))
        <div class="row">
            <div class="col-xs-2 col-xs-offset-10 margin-top-40 tab-create-news-button">
                <div class="tab-button create-news-button" style="background-color: rgba(6,6,6,0.05); text-align: center; cursor: pointer;">
                    <i class="fa fa-lg fa-plus"></i>
                </div>
            </div>
        </div>
        @endif
        <div class="news-all margin-top-40">
            @foreach($news as $new)
                <div class="news-box" id="{{$new->news_id}}">
                    @if($new->image)
                    <div class="news-image can-click" id="news-image-{{$new->news_id}}"
                         style="background-image:url({{$new->image}});"
                         content="{{$new->news_id}}" data-toggle="modal" data-target="#myModal"></div>
                    @endif
                    <div class="news-box-card">
                        @if(isset($user['news']))
                        <div class="tab-button-bar row">
                            <button class="col-xs-2 col-xs-offset-10 tab-button tab-button-first tab-button-edit"
                                    id="edit-{{$new->news_id}}" content="{{$new->news_id}}"><i class="fa fa-lg fa-cogs"></i></button>
                        </div>
                        @endif
                        <div class="can-click" content="{{$new->news_id}}" data-toggle="modal" data-target="#myModal">
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

    <div class="pagination-nav mtb-30 margin-bottom-60">
        <ul>
            <li><a href="{{ asset('/news/all/1')}}"><i class="fa fa-angle-double-left"></i></a></li>
            @if($page > 1)<li><a href="{{ asset('/news/all/'.($page-1))}}"><i class="fa fa-angle-left"></i></a></li>@endif
            @for ($i = 1; $i <= ceil($count/10); $i++)
                <li id="p{{$i}}"><a href="{{ asset('/news/all/'.$i) }}">{{$i}}</a></li>
            @endfor
            @if($page < ceil($count/10))<li><a href="{{ asset('/news/all/'.($page+1))}}"><i class="fa fa-angle-right"></i></a></li>@endif
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
        window.history.replaceState("object or string", "Title", "{{url('/news/view/')}}/"+content_id);
        open_modal(content_id);
    });

    $(".content-modal").click(function(e){
        if($(e.target).is('.content-modal') ){
            window.history.replaceState("object or string", "Title", prev_url);
        }
    });

    function open_modal(content_id){
        $.post("{{url('news/view/modal')}}",
        { news_id: content_id , page: '{{$page}}}',_token:'{{csrf_token()}}'  } ).done(function( input ) {

            $(".modal-news-box-head").text(input[0]['title']);
            $(".modal-news-box-content").html(input[0]['content']);
            $(".modal-created").text("Created at : "+input[0]['created_at']['date']);
            $(".modal-updated").text("Updated at : "+input[0]['updated_at']['date']);
            $(".modal-news-image").remove();
            if(input[0]['image']) {
               var txt = '<div class="modal-news-image news-image" style="background-image:url('+input[0]['image']+');">'+'</div>';
               $(".modal-news-box").prepend(txt);
            }

        });
    }

    @if(isset($user['news']))
    // News-Manager ONLY

    $(".tab-button-edit").click(function(e){
        var content_id=$(this).attr("content");
        window.location.href = "{{url('/news/view/')}}/"+content_id;

    });

    $(".create-news-button").click(function(){
        window.location.href = "{{url('news/create')}}";
    });

    @endif

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
            $(".tab-create-news-button").removeClass("col-xs-2");
            $(".tab-create-news-button").addClass("col-xs-3");
            $(".tab-create-news-button").removeClass("col-xs-offset-10");
            $(".tab-create-news-button").addClass("col-xs-offset-9");
        }
        else{
            $(".tab-button-edit").removeClass("col-xs-offset-9");
            $(".tab-button-edit").addClass("col-xs-offset-10");
            $(".tab-button-edit").removeClass("col-xs-3");
            $(".tab-button-edit").addClass("col-xs-2");
            $(".tab-create-news-button").addClass("col-xs-2");
            $(".tab-create-news-button").removeClass("col-xs-3");
            $(".tab-create-news-button").addClass("col-xs-offset-10");
            $(".tab-create-news-button").removeClass("col-xs-offset-9");
        }
    }
    </script>
@endsection
