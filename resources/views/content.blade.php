@extends('masterpage')

@section('title')
    แก้ไขข่าวสาร
@endsection
@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection
@section('newsNavToggle')
    active
@endsection
@section('bodyTitle')
    แก้ไขข่าวสาร
@endsection
@section('content')
    <div role="alert" aria-live="polite" class="toast-top-right" id="toast-container"></div>
    <div class="news-container">
        <div class="news-all">
            <form id="upload_form" action="{{url().'/update_news/'.$news[0]->id}}"  enctype="multipart/form-data" method="post" name="" class="">
                {{csrf_field()}}
            <div class="news-box" id="{{$news[0]->id}}">
                <div class="news-image" id="news-image-{{$news[0]->id}}" style="background-image:url({{$news[0]->image}}); ">
                    <div class="browse-bar container-fluid hide" id="browse-bar-{{$news[0]->id}}">
                        <div class="row"><input name="image" type="file" class="col-xs-12 tab-button browse-button" id="browse-button-{{$news[0]->id}}"></div>
                    </div>
                </div>
                <div class="news-box-card">
                    <div class="tab-button-bar row" style="margin-bottom: 0px;">
                        <div class="col-xs-2 tab-button tab-button-first tab-button-edit col-xs-offset-10" id="edit-{{$news[0]->id}}"><i class="fa fa-lg fa-cog"></i></div>
                    </div>
                    <div class="tab-button-bar tab-button-trash-home-bar row hide" style="margin-top: 5px;">
                        <div class="col-xs-1 tab-button tab-button-first tab-button-trash col-xs-offset-10" id="trash-{{$news[0]->id}}"><i class="fa fa-lg fa-trash"></i></div>
                        <div class="col-xs-1 tab-button tab-button-home" id="home-{{$news[0]->id}}"><i class="fa fa-lg fa-home"></i></div>
                        <input type="hidden" name="at_home" value="{{$news[0]->at_home}}" class="at_home">
                    </div>
                    <div class="row news-box-head">
                        <h2 class="news-box-head-text" id="activity-name-{{$news[0]->id}}">{{$news[0]->title}}</h2>
                        <textarea name="title" class="news-box-head-text activity-name-input hide" rows="1" placeholder="ชื่อกิจกรรม" id="activity-name-input-{{$news[0]->id}}">{{$news[0]->title}}</textarea>

                        <!--div id="editor1" contenteditable="true">
                            <h1>Inline Editing in Action!</h1>
                            <p>The "div" element that contains this text is now editable.
                        </div>
                        <div class="tab-button testt">
                        </div-->

                    </div>
                    <div class="row news-box-date">
                        <div><span class="created">Created at : {{$news[0]->created_at}}</span>|<span class="updated">Updated at : {{$news[0]->updated_at}}</span></div>
                    </div>
                    <div class="row news-box-content">
                        <div class="news-box-content-text" id="activity-content-{{$news[0]->id}}">{!!$news[0]->content!!}</div>
                        <textarea name="content" class="news-box-content-text activity-content-input hide" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input-{{$news[0]->id}}">{{$news[0]->content}}</textarea>
                    </div>
                    <div class="container-fluid save-button-bar">
                        <div class="col-xs-2 col-xs-offset-8 tab-button tab-button-first cancel-button hide" id="cancel-button-{{$news[0]->id}}">ยกเลิก</div>
                        <button type="submit" class="col-xs-2 tab-button tab-button-first save-button hide" id="save-button-{{$news[0]->id}}" onclick="save_news()">บันทึก</button>
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
        $( document ).ready(function() {
            if($(".at_home").attr("value") == 1)
                $(".tab-button-home").addClass("action");
            window.history.replaceState("object or string", "Title", "{{url('/news/content/')}}/"+'{{$news[0]->id}}');
        });

        $(".tab-button-edit").click(function(){
            CKEDITOR.replace( 'activity-content-input-{{$news[0]->id}}' );
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
                $.post('{{url('/remove_news')}}',
                        { id: '{{$news[0]->id}}' ,_token:'{{csrf_token()}}'  } ).done(function( input ) {
                });
                window.location.href = "{{url('/news/all')}}";
            }
        });

        /*$(".testt").click(function(){
            var temp = $("#editor1").html();
            alert(temp);
        });*/

        var ajaxDebugData;
        $("#upload_form").change(function() {
          console.log("Update!!");
          var formData = new FormData($("#upload_form")[0]);
          $.ajax({
              url:  '{{url("/news/upload_image")}}',
              type: 'POST',
              headers: { "X-CSRF-Token" : "{{ csrf_token() }}" },
              data: formData,
              processData: false,
              contentType: false
          }).done(function(data) {
              console.log(data);
              ajaxDebugData = data;
              if(data.hasOwnProperty('image')) {
                $('#news-image-{{$news[0]->id}}').css( 'background-image', 'url("' + data.image + '")' );
              }
              else {
                alert("รูปไม่ผ่านนะจ๊ะ..!!");
              }
          });
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
