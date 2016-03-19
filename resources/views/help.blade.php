@extends('masterpage')

@section('title')
    ช่วยเหลือ
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('helpNavToggle')
    active
@endsection

@section('bodyTitle')
    ช่วยเหลือ
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">

                    {{--start panel part--}}

                    @if(isset($user['admin']))
                    <div class="row" style="margin-bottom: 10px; margin-right: 0px;">
                        <div class="col-xs-2 tab-button tab-button-first tab-button-edit col-xs-offset-10" id="edit-help-button"><i class="fa fa-lg fa-cog"></i></div>
                    </div>
                    @endif

                    <div id="help-content">
                        {!!$help_content!!}
                    </div>

                    <div id="edit-box" class="hidden">
                        <textarea id="text" class="summernote form-control" data-height="200" data-lang="en-US">{{$help_content}}</textarea>
                        </br>
                        <div class="pull-right">
                            <a id="confirm-edit-button" class="btn btn-success">บันทึก</a>
                            <a id="cancel-edit-button" class="btn btn-danger">ยกเลิก</a>
                        </div>
                    </div>
                    {{--end panel part--}}

                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link href="{{url('assets/css/content.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/toastr.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script>

        $('#edit-help-button').click(function () {
            $('#edit-help-button').addClass("hidden");
            $('#help-content').addClass("hidden");
            $('#edit-box').removeClass("hidden");
        });

        $('#confirm-edit-button').click(function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT + '/help',
                    {
                        new_help_content: $('.note-editable').html(),
                        _token: '{{csrf_token()}}'
                    }).done(function (input) {
                //alert(input);
                window.location="{{url('/help')}}";
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                return false;
            });
        });

        $('#cancel-edit-button').click(function () {
            window.location="{{url('/help')}}";
        });

    </script>
@endsection