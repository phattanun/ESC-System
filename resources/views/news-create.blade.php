@extends('masterpage')

@section('title')
   เพิ่มข่าวสาร
@endsection
@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection
@section('newsNavToggle')
    active
@endsection
@section('bodyTitle')
   เพิ่มข่าวสาร
@endsection
@section('content')
    <div role="alert" aria-live="polite" class="toast-top-right" id="toast-container"></div>
    <div class="news-container">
        <div class="news-all">
            <form id="upload_form" action="{{url().'/news/create/content'}}" method="post" enctype="multipart/form-data" name="" class="">
                {{csrf_field()}}
                <div class="news-box">
                    <div class="news-image" id="news-image">
                        <div class="browse-bar container-fluid" id="browse-bar">
                            <div class="row"><input name="image" type="file" class="col-xs-12 tab-button browse-button" id="browse-button"></div>
                        </div>
                    </div>
                    <div class="news-box-card">
                        <div class="tab-button-bar row">
                            <div class="col-xs-1 col-xs-offset-11 tab-button tab-button-first tab-button-home" id="home"><i class="fa fa-lg fa-home"></i></div>
                            <input type="hidden" name="at_home" value="0" class="at_home">
                        </div>
                        <div class="row news-box-head">
                            <textarea name="title" class="news-box-head-text activity-name-input" rows="1" placeholder="ชื่อกิจกรรม" id="activity-name-input"></textarea>
                        </div>
                        <div class="row news-box-content">
                            <div class="news-box-content-text" id="activity-content"></div>
                            <textarea name="content" class="news-box-content-text activity-content-input" rows="5" placeholder="รายละเอียดกิจกรรม" id="activity-content-input"></textarea>
                        </div>
                        <div class="container-fluid save-button-bar">
                            <button type="submit" class="col-xs-2 col-xs-offset-10 tab-button tab-button-first save-button" id="save-button">บันทึก</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/css/content.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{url('assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(".tab-button-home").click(function(){
            $(this).toggleClass("action");
            if($(".at_home").attr("value") == 1)
                $(".at_home").attr("value",0);
            else
                $(".at_home").attr("value",1);

        });

        $( document ).ready(function() {
            if($(".at_home").attr("value") == 1)
                $(".tab-button-home").addClass("action");
            checkRespond();
        });

        $(window).resize(function() {
            checkRespond();
        });

        function checkRespond(){
            var $windowSize = $(window).width();

            if ($windowSize < 768 ){
                $(".save-button").removeClass("col-xs-2");
                $(".save-button").addClass("col-xs-4");
                $(".save-button").removeClass("col-xs-offset-10");
                $(".save-button").addClass("col-xs-offset-8");
                $(".tab-button-home").removeClass("col-xs-1");
                $(".tab-button-home").addClass("col-xs-2");
                $(".tab-button-home").removeClass("col-xs-offset-11");
                $(".tab-button-home").addClass("col-xs-offset-10");
            }
            else{
                $(".save-button").removeClass("col-xs-4");
                $(".save-button").addClass("col-xs-2");
                $(".save-button").removeClass("col-xs-offset-8");
                $(".save-button").addClass("col-xs-offset-10");
                $(".tab-button-home").removeClass("col-xs-2");
                $(".tab-button-home").addClass("col-xs-1");
                $(".tab-button-home").removeClass("col-xs-offset-10");
                $(".tab-button-home").addClass("col-xs-offset-11");
            }

            if($windowSize < 512){
                $(".save-button").removeClass("col-xs-4");
                $(".save-button").addClass("col-xs-6");
                $(".save-button").removeClass("col-xs-offset-8");
                $(".save-button").addClass("col-xs-offset-6");
                $(".tab-button-home").removeClass("col-xs-2");
                $(".tab-button-home").addClass("col-xs-3");
                $(".tab-button-home").removeClass("col-xs-offset-10");
                $(".tab-button-home").addClass("col-xs-offset-9");
            }else if ($windowSize < 768 ){
                $(".save-button").removeClass("col-xs-6");
                $(".save-button").addClass("col-xs-4");
                $(".save-button").removeClass("col-xs-offset-6");
                $(".save-button").addClass("col-xs-offset-8");
                $(".tab-button-home").removeClass("col-xs-3");
                $(".tab-button-home").addClass("col-xs-2");
                $(".tab-button-home").removeClass("col-xs-offset-9");
                $(".tab-button-home").addClass("col-xs-offset-10");
            }
        }

        var oldImage = $('#news-image').css('background-image');
        $("#upload_form").change(function() {
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
                $('#news-image').css( 'background-image', 'url("' + data.image + '")' );
              }
              else {
                alert("รูปไม่ผ่านนะจ๊ะ..!!");
                $('#news-image').css( 'background-image', oldImage );
              }
          });
        });


    </script>

    <script>
        CKEDITOR.replace( 'activity-content-input' );


    </script>
@endsection
