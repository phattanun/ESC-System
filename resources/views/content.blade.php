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
    <div role="alert" aria-live="polite" class="toast-top-right" id="toast-container"></div>
    <div class="news-container">
        <div class="news-all">
            <form action="{{url().'/update_news/'.$news[0]->id}}" method="post" name="" class="">
                {{csrf_field()}}
            <div class="news-box" id="{{$news[0]->id}}">
                <div class="news-image" id="news-image-{{$news[0]->id}}" style="background-image:url({{asset('assets/images/news/'.$news[0]->image)}}); ">
                    <div class="browse-bar container-fluid hide" id="browse-bar-{{$news[0]->id}}">
                        <div class="row"><input name="image" type="file" class="col-xs-12 tab-button browse-button" id="browse-button-{{$news[0]->id}}"></div>
                    </div>
                </div>
                <div class="news-box-card">
                    <div class="tab-button-bar row">
                        <div class="col-xs-1 tab-button tab-button-first tab-button-trash col-xs-offset-9" id="trash-{{$news[0]->id}}"><i class="fa fa-lg fa-trash"></i></div>
                        <div class="col-xs-1 tab-button tab-button-edit" id="edit-{{$news[0]->id}}"><i class="fa fa-lg fa-cog"></i></div>
                        <div class="col-xs-1 tab-button tab-button-home" id="home-{{$news[0]->id}}"><i class="fa fa-lg fa-home"></i></div>
                    </div>
                    <div class="row news-box-head">
                        <h2 class="news-box-head-text" id="activity-name-{{$news[0]->id}}">{{$news[0]->title}}</h2>
                        <textarea name="title" class="news-box-head-text activity-name-input hide" rows="1" placeholder="ชื่อกิจกรรม" id="activity-name-input-{{$news[0]->id}}">{{$news[0]->title}}</textarea>
                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : {{$news[0]->created_at}}</span>|<span class="updated">Updated at : {{$news[0]->updated_at}}</span></div>
                    </div>
                    <div class="row news-box-content">
                        <div class="news-box-content-text" id="activity-content-{{$news[0]->id}}">{!!$news[0]->content!!}</div>
                        <textarea name="content" class="news-box-content-text activity-content-input hide" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input-{{$news[0]->id}}">{{$news[0]->content}}</textarea>
                    </div>
                    <div class="container-fluid save-button-bar">
                        <div class="col-xs-2 col-xs-offset-8 tab-button cancel-button hide" id="cancel-button-{{$news[0]->id}}">ยกเลิก</div>
                        <button type="submit" class="col-xs-2 tab-button save-button hide" id="save-button-{{$news[0]->id}}" onclick="save_news()">บันทึก</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/css/content.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/toastr.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{url('assets/js/content.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/toastr.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">

    </script>

    <script>
        $(".tab-button-edit").click(function(){
            CKEDITOR.replace( 'activity-content-input-{{$news[0]->id}}' );
        });
    </script>

    <!--script>
        function save_news(){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "preventDuplicates": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            var title = $(".activity-name-input").val();
            var content = $(".cke_editable").addClass('hide');
    alert(content);

            toastr.error('คุณไม่มีสิทธิในการดำเนินการ','ผิดพลาด');
        }

    </script-->
@endsection