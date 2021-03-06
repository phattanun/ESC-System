@extends('masterpage')

@section('title')
    เพิ่มกิจกรรม
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('bodyTitle')
    เพิ่มกิจกรรม
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                {{--<div class="panel-heading panel-heading-transparent">--}}
                {{--<h2 class="panel-title">เพิ่มกิจกรรม</h2>--}}
                {{--</div>--}}
                <div class = "panel-body">
                    <form novalidate="novalidate" action="{{url().'/activity/create/send_form'}}" class="validate" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เพิ่มกิจกรรมสำเร็จ<script>window.location='{{url('/activity/list')}}'</script>" data-toastr-position="top-right">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label>ชื่อกิจกรรม *</label>
                                <input name="activity_name" value="" class="form-control required" type="text">
                            </div>
                            {{--<div class="col-md-4 col-sm-4">--}}
                            {{--<label>สถานะ *</label>--}}
                            {{--<input name="activity_status" value="" class="form-control required"--}}
                            {{--type="text">--}}
                            {{--</div>--}}
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label>ประเภท *</label>
                                <select class="form-control select2" name="kind_of_activity">
                                    <option value="">--- ประเภทของกิจกรรม ---</option>
                                    <option value="sport">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>
                                    <option value="volunteer">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>
                                    <option value="academic">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>
                                    <option value="culture">กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>
                                    <option value="ethics">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <label>สอดคล้องกับกรอบมาตรฐาน TQF ใน  5 ด้าน  ได้แก่</label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label class="checkbox">
                                    <input type="checkbox" value=true name="tqf[ethics]">
                                    <i></i> ด้านคุณธรรม จริยธรรม (Ethics and Moral)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label class="checkbox">
                                    <input type="checkbox" value=true name="tqf[knowledge]">
                                    <i></i> ด้านความรู้ (Knowledge)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label class="checkbox">
                                    <input type="checkbox" value=true name="tqf[cognitive]">
                                    <i></i> ด้านทักษะทางปัญญา (Cognitive Skills)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label class="checkbox">
                                    <input type="checkbox" value=true name="tqf[interpersonal]">
                                    <i></i> ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label class="checkbox">
                                    <input type="checkbox" value=true name="tqf[communication]">
                                    <i></i> ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ <br>
                                    (Numerical Analysis, Communication and Information Technology Skills)
                                </label>
                            </div>
                        </div>
                        <div id="upload-file-section" class="margin-bottom-20">
                            <div class="row">
                                <label class="col-md-8">ไฟล์ *</label>
                            </div>
                            <div class="row">
                                <div class="col-xs-9 col-md-8">
                                    <div class="fancy-file-upload fancy-file-primary">
                                        <i class="fa fa-upload"></i>
                                        <input type="file"  class="form-control" name="file[]" onchange="jQuery(this).next('input').val(this.value);" />
                                        <input type="text" required class="form-control" placeholder="ยังไม่ได้เลือกไฟล์" readonly="" />
                                        <span class="button">เลือกไฟล์</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($user['activities']))

                        <div class = "row">
                            <div class="col-md-offset-6 col-md-1">
                                <a id="add-file" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่มไฟล์</span>
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label>หน่วยงานที่เกี่ยวข้อง *</label>
                                <select class="form-control select2" name="division">
                                    <option value="">--- หน่วยงานที่เกี่ยวข้อง ---</option>
                                    @foreach($division as $d)
                                        <option value = "{{$d['div_id']}}">{{$d['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20 ">เพิ่มผู้จัดการกิจกรรม</label>
                                        <div class="input-group autosuggest" data-minLength="1" data-queryURL="{!! url('setting/auto_suggest?limit=10&search=') !!}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                            <span class="input-group-btn" id="add-new-editor-btn">
                                                <a class="btn btn-success">เพิ่ม</a>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="table-responsive margin-bottom-30 hidden" style="width:50%" id="table-div">
                            <table class="table nomargin" id="permission-table" width="100%">
                                <tr>
                                    <th style="vertical-align:middle"></th>
                                    <th style="vertical-align:middle;" >รหัสนิสิต</th>
                                    <th style="vertical-align:middle;" >ชื่อ</th>
                                    <th style="vertical-align:middle;" >นามสกุล</th>
                                </tr>
                            </table>
                        </div>
                        <div class = "row">
                            <div class="col-md-2 col-sm-2">
                                <label>ชั้นปีสุดท้ายที่เห็น *</label>
                                <input name="last_year_seen" value="" class="form-control required"
                                       type="text">
                            </div>
                        </div>
                        <div class="row text-center">
                            <button type="submit" id="registerBtn" class="btn  btn-lg btn-success"><i
                                        class="fa fa-check"></i>ยืนยัน
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        var editor = 0;
        function main() {
            $(document).on('click','.delete-file-btn',function (){
                $(this).closest('.row').remove();
            });
            $('#add-file').click(function(){
                $(
                        '<div class="row">'+
                        '<div class="col-xs-9 col-md-8">'+
                        '<div class="fancy-file-upload fancy-file-primary">'+
                        '<i class="fa fa-upload"></i>'+
                        '<input type="file" class="form-control" name="file[]" onchange="jQuery(this).next('+"'input'"+').val(this.value);" />'+
                        '<input type="text" class="form-control file-upload" placeholder="ยังไม่ได้เลือกไฟล์" readonly="" />'+
                        '<span class="button">เลือกไฟล์</span>'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-xs-1 col-md-1 delete-file-btn">'+
                        '<td class="text-center"><a class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบไฟล์นี้">'+
                        '<i class="fa fa-minus"></i>'+
                        '<i class="fa fa-trash"></i>'+
                        '</a>'+
                       '</td>'+
                        '</div>'
                ).appendTo('#upload-file-section');
            });
            $(document).on('click','.delete-a-tuple',function(){
                var id =  this.id;
                $('#tuple-'+id).addClass('hidden');
                $('#delete-'+id).val(true);
                editor--;
                if(editor == 0) $('#table-div').addClass('hidden');
            });
            $(document).on('click','#add-new-editor-btn',function(){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/activity/create/addEditor',
                        {data:  $('#studentInfo').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='fail'){
                        _toastr("ไม่พบนิสิตในระบบ","top-right","error",false);
                        return false;
                    }
                    else {
                        if($('#table-div').hasClass('hidden')) $('#table-div').removeClass('hidden');
                        if(document.getElementById(input["student_id"])){
                            if(!$('#tuple-'+input["student_id"]).hasClass('hidden')){
                                _toastr("ข้อมูลซ้ำ","top-right","warning",false);
                                editor--;
                            }
                            $('#tuple-'+input["student_id"]).removeClass('hidden');
                            $('#delete-'+input["student_id"]).val("");
                            editor++;
                        }
                        else {
                            editor++;
                            $('#permission-table').append(
                                    '<tr id="tuple-'+input["student_id"]+'"><input type="hidden" id="delete-'+input["student_id"]+'" name="deleted['+input["student_id"]+']" value="" />'
                                    +'<td class="text-center"><a id="'+input["student_id"]+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบออกจากผู้มีสิทธิ์แก้ไขกิจกรรม">'
                                    +' <i class="fa fa-minus"></i>'
                                    +' <i class="fa fa-trash"></i>'
                                    +' </a></td>'
                                    +' <td><input type="hidden" name="student_id[]" value="'+input["student_id"]+'"/>'+input["student_id"]+'</td>'
                                    +' <td>'+input["name"]+'</td>'
                                    +' <td>'+input["surname"]+'</td>'
                                    +'  </tr>');
                        }
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                    return false;
                });
            });
        }
        $( document ).ready(main);
    </script>
@endsection