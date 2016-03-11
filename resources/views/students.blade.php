@extends('masterpage')

@section('title')
    ข้อมูลนิสิต
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('studentsNavToggle')
    active
@endsection

@section('bodyTitle')
    ข้อมูลนิสิต
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-2">
                                    <label class="margin-bottom-20 ">ค้นหาข้อมูลนิสิต</label>
                                    <div class="input-group" data-minLength="1" >
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="รหัสนิสิต" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="ชื่อ" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="นามสกุล" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="ชื่อเล่น" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="ชั้นปี" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรุ๊ป" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="ภาควิชา" type="text">
                                            </span>
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <a class="btn btn-success">เพิ่ม</a>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).on('click','#add-new-permission-btn',function(){
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/students/search',
                    {data:  'htfrht', _token: '{{csrf_token()}}'}).done(function (input) {
                if(input=='fail'){
                    _toastr("ไม่พบนิสิตในระบบ","top-right","error",false);
                    return false;
                }
                else {
                    alert(input);
                    }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                return false;
            });
        });
    </script>
@endsection