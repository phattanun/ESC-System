@extends('masterpage')

@section('title')
    {{$news[0]->title}}
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

            @if(isset($user['news']))
            <form id="upload_form" action="{{url().'/news/update/'.$news[0]->news_id}}"  enctype="multipart/form-data" method="post" name="" class="">
                {{csrf_field()}}
            @endif

            <div class="news-box" id="{{$news[0]->news_id}}">
                <div class="news-image" id="news-image-{{$news[0]->news_id}}" style="background-image:url({{$news[0]->image}}); ">
                    @if(isset($user['news']))
                    <div class="browse-bar container-fluid hide" id="browse-bar-{{$news[0]->news_id}}">
                        <div class="row"><input name="image" type="file" class="col-xs-12 tab-button browse-button" id="browse-button-{{$news[0]->news_id}}"></div>
                    </div>
                    @endif
                </div>

                <div class="news-box-card">

                    @if(isset($user['news']))
                    <div class="tab-button-bar row" style="margin-bottom: 0px;">
                        <div class="col-xs-2 tab-button tab-button-first tab-button-edit col-xs-offset-10" id="edit-{{$news[0]->news_id}}"><i class="fa fa-lg fa-cog"></i></div>
                    </div>
                    <div class="tab-button-bar tab-button-trash-home-bar row hide" style="margin-top: 5px;">
                        <div class="col-xs-1 tab-button tab-button-first tab-button-trash col-xs-offset-10" id="trash-{{$news[0]->news_id}}"><i class="fa fa-lg fa-trash"></i></div>
                        <div class="col-xs-1 tab-button tab-button-home" id="home-{{$news[0]->news_id}}"><i class="fa fa-lg fa-home"></i></div>
                        <input type="hidden" name="at_home" value="{{$news[0]->at_home}}" class="at_home">
                    </div>
                    @endif

                    <div class="row news-box-head">
                        <h2 class="news-box-head-text" id="activity-name-{{$news[0]->news_id}}">{{$news[0]->title}}</h2>
                        @if(isset($user['news']))
                        <textarea name="title" class="news-box-head-text activity-name-input hide" rows="1" placeholder="ชื่อกิจกรรม" id="activity-name-input-{{$news[0]->news_id}}">{{$news[0]->title}}</textarea>
                        @endif
                    </div>

                    <div class="row news-box-date">
                        <div><span class="created">Created at : {{$news[0]->created_at}}</span>|<span class="updated">Updated at : {{$news[0]->updated_at}}</span></div>
                    </div>

                    <div class="row news-box-content">
                        <div class="news-box-content-text" id="activity-content-{{$news[0]->news_id}}">{!!$news[0]->content!!}</div>
                        @if(isset($user['news']))
                        <textarea name="content" class="news-box-content-text activity-content-input hide" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input-{{$news[0]->news_id}}">{{$news[0]->content}}</textarea>
                        @endif
                    </div>

                    @if(isset($user['news']))
                    <div class="container-fluid save-button-bar">
                        <div class="col-xs-2 col-xs-offset-8 tab-button tab-button-first cancel-button hide" id="cancel-button-{{$news[0]->news_id}}">ยกเลิก</div>
                        <button type="submit" class="col-xs-2 tab-button tab-button-first save-button hide" id="save-button-{{$news[0]->news_id}}" onclick="save_news()">บันทึก</button>
                    </div>
                    @endif
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

    <script>
        $( document ).ready(function() {
            if($(".at_home").attr("value") == 1)
                $(".tab-button-home").addClass("action");
            window.history.replaceState("object or string", "Title", "{{url('/news/view/')}}/"+"{{$news[0]->news_id}}");
        });

        @if(isset($user['news']))
        // News-Manager ONLY

            const newsID = {{$news[0]->news_id}};
            const oldImage = $('#news-image-'+newsID).css('background-image');
            const oldTitle = $("#activity-name-"+newsID).html();
            const oldContent = $("#activity-content-"+newsID).html();
            var editor,editStatus = false, notDestroy = false;
            $(".tab-button-edit").click(function(){
                if(!editStatus) {
                    $(this).addClass("action");
                    editor = CKEDITOR.replace( 'activity-content-input-{{$news[0]->news_id}}' );
                    notDestroy = true;
                    $("#activity-name-"+newsID).addClass("hide");
                    $("#activity-content-"+newsID).addClass("hide");
                    $("#activity-name-input-"+newsID).removeClass("hide");
                    $("#activity-content-input-"+newsID).removeClass("hide");
                    $("#cancel-button-"+newsID).removeClass("hide");
                    $("#save-button-"+newsID).removeClass("hide");
                    $("#browse-bar-"+newsID).removeClass("hide");
                    $(".tab-button-trash-home-bar").removeClass("hide");
                    $(".cke").removeClass("hide");
                    editStatus = true;
                }
                else {
                    editor.destroy();
                    notDestroy = false;
                    // Preview Content
                    $("#activity-name-"+newsID).html($("#activity-name-input-"+newsID).val());
                    $("#activity-content-"+newsID).html($("#activity-content-input-"+newsID).val());

                    $("#edit-"+newsID).removeClass("action");
                    $("#activity-name-"+newsID).removeClass("hide");
                    $("#activity-content-"+newsID).removeClass("hide");
                    $("#activity-name-input-"+newsID).addClass("hide");
                    $("#activity-content-input-"+newsID).addClass("hide");
                    $("#browse-bar-"+newsID).addClass("hide");
                    $(".tab-button-trash-home-bar").addClass("hide");
                    $(".cke").addClass("hide");
                    editStatus = false;
                }
            });

            $(".cancel-button").click(function(){
                if(notDestroy) {
                    editor.destroy();
                    notDestroy = false;
                }
                // Reset content
                $('#browse-button-'+newsID).val("");
                $("#activity-name-"+newsID).html(oldTitle);
                $("#activity-name-input-"+newsID).val(oldTitle);
                $("#activity-content-"+newsID).html(oldContent);
                $("#activity-content-input-"+newsID).val(oldContent);
                $('#news-image-'+newsID).css( 'background-image', oldImage );

                $("#edit-"+newsID).removeClass("action");
                $("#activity-name-"+newsID).removeClass("hide");
                $("#activity-content-"+newsID).removeClass("hide");
                $("#activity-name-input-"+newsID).addClass("hide");
                $("#activity-content-input-"+newsID).addClass("hide");
                $("#cancel-button-"+newsID).addClass("hide");
                $("#save-button-"+newsID).addClass("hide");
                $("#browse-bar-"+newsID).addClass("hide");
                $(".tab-button-trash-home-bar").addClass("hide");
                $(".cke").addClass("hide");
                editStatus = false;
            });

            $(".tab-button-home").click(function(){
                $(this).toggleClass("action");
                if($(".at_home").attr("value") == 1)
                    $(".at_home").attr("value",0);
                else
                    $(".at_home").attr("value",1);
            });

            $(".tab-button-trash").click(function(){
                var r = confirm("Press a button!");
                if (r == true) {
                    $.post('{{url('/news/remove')}}',
                            { news_id: newsID ,_token:'{{csrf_token()}}'  } ).done(function( input ) {
                    });
                    window.location.href = "{{url('/news/all')}}";
                }
            });

            $("#browse-button-"+newsID).change(function() {
              var formData = new FormData($("#upload_form")[0]);
              $.ajax({
                  url:  '{{url("/news/upload/image")}}',
                  type: 'POST',
                  headers: { "X-CSRF-Token" : "{{ csrf_token() }}" },
                  data: formData,
                  processData: false,
                  contentType: false
              }).done(function(data) {
                  if(data.hasOwnProperty('image')) {
                    $('#news-image-'+newsID).css( 'background-image', 'url("' + data.image + '")' );
                  }
                  else {
                    alert("รูปไม่ผ่านนะจ๊ะ..!!");
                  $('#news-image-'+newsID).css( 'background-image', oldImage );
                  }
              });
            });

        @endif

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
