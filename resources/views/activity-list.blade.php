@extends('masterpage')

@section('title')
    จัดการกิจกรรม
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    @if(isset($user['activities']))
        รายการกิจกรรมทั้งหมด
    @else
        รายการกิจกรรม
    @endif
@endsection

@section('content')
    {{----------------------------------------Modal Section--------------------------------------------}}
    <div class="modal fade act_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label>ชื่อกิจกรรม *</label>
                            <input name="activity_name" value="" id="act_name" class="form-control required"
                                   type="text">
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label>ประเภท *</label>
                            <div class="fancy-form fancy-form-select">
                                <select class="form-control" name="kind_of_activity" id="kind_of_activity">
                                    <option value="sport">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>
                                    <option value="volunteer">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>
                                    <option value="academic">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>
                                    <option value="culture">กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>
                                    <option value="ethics">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>
                                </select>
                                <i class="fancy-arrow"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <label>สอดคล้องกับกรอบมาตรฐาน TQF ใน  5 ด้าน  ได้แก่</label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label class="checkbox">
                                <input type="checkbox" value=true id="ethics" name="tqf[ethics]">
                                <i></i> ด้านคุณธรรม จริยธรรม (Ethics and Moral)
                            </label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label class="checkbox">
                                <input type="checkbox" value=true id="knowledge" name="tqf[knowledge]">
                                <i></i> ด้านความรู้ (Knowledge)
                            </label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label class="checkbox">
                                <input type="checkbox" value=true id="cognitive" name="tqf[cognitive]">
                                <i></i> ด้านทักษะทางปัญญา (Cognitive Skills)
                            </label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label class="checkbox">
                                <input type="checkbox" value=true id="interpersonal" name="tqf[interpersonal]">
                                <i></i> ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)
                            </label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label class="checkbox">
                                <input type="checkbox" value=true id="communication" name="tqf[communication]">
                                <i></i> ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ <br>
                                (Numerical Analysis, Communication and Information Technology Skills)
                            </label>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-md-8 col-sm-8">
                            <label>หน่วยงานที่เกี่ยวข้อง *</label>
                            <div class="fancy-form fancy-form-select">
                                <select class="form-control" name="division" id="division">
                                    <option value="">--- หน่วยงานที่เกี่ยวข้อง ---</option>
                                    @foreach($division as $d)
                                        <option value = "{{$d['div_id']}}">{{$d['name']}}</option>
                                    @endforeach
                                </select>
                                <i class="fancy-arrow"></i>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">เพิ่มผู้จัดการกิจกรรม</label>
                                    <div class="input-group autosuggest" data-minLength="1" >
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
                    <div class="table-responsive margin-bottom-30" style="width:50%" id="table-div">
                        <table class="table nomargin" id="permission-table" width="100%">

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
                </div>
            </div>
        </div>
    </div>
{{----------------------------------------Body Section--------------------------------------------}}
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                {{--<div class="panel-heading panel-heading-transparent">--}}
                {{--<h2 class="panel-title">เพิ่มกิจกรรม</h2>--}}
                {{--</div>--}}
                <div class = "panel-body">
                    {{--<fieldset>--}}
                        {{--<div class="row">--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    {{--<label class="margin-bottom-20 ">เพิ่มผู้จัดการกิจกรรม</label>--}}
                                    {{--<div class="input-group autosuggest" data-minLength="1" >--}}
                                        {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                                        {{--<input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">--}}
                                            {{--<span class="input-group-btn" id="add-new-editor-btn">--}}
                                                {{--<a class="btn btn-success">เพิ่ม</a>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</fieldset>--}}
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" id="permission-table" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center" >ชื่อกิจกรรม</th>
                                <th style="vertical-align: middle;text-align: center">สถานะกิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center" ></th>
                            </tr>
                            @foreach($act_list as $act)
                                <tr>
                                    <td style="vertical-align: middle;text-align: center">{{$act['name']}}</td>
                                        @if($act['status']==0)
                                            <td style="vertical-align: middle;text-align: center"><span class="text-orange">รอเปิดโครงการ</span></td>
                                        @elseif($act['status']==1)
                                            <td style="vertical-align: middle;text-align: center"><span class="text-green">กวศ อนุมัติ</span></td>
                                        @elseif($act['status']==2)
                                        <td style="vertical-align: middle;text-align: center"><span class="text-green">คณบดี อนุมัติ</span></td>
                                        @elseif($act['status']==3)
                                        <td style="vertical-align: middle;text-align: center"><span class="text-green">รอปิดโครงการ</span></td>
                                        @elseif($act['status']==4)
                                        <td style="vertical-align: middle;text-align: center"><span class="text-black">ปิดโตรงการ</span></td>
                                        @endif
                                    <td style="vertical-align: middle;text-align: center">
                                        <button type="button" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target=".act_detail" onclick="loaddetail({{$act['act_id']}})">
                                            <i class="fa fa-edit"></i>
                                            <span>แก้ไข</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-top')
    <script>
        var editor = 0;
        function loaddetail(act_id) {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT + '/activity/list/getdetail',
                    {act_id: act_id, _token: '{{csrf_token()}}'}).done(function (input) {
                if (input == 'fail') {
                    _toastr("ไม่พบกิจกรรมในระบบ", "top-right", "error", false);
                    return false;
                }
                else {
                    var act_data = JSON.parse(input);
                    editor = act_data.can_edit.length;
                    $('#myLargeModalLabel').empty();
                    $('#myLargeModalLabel').append(act_data.act.name);

                    $('#act_name').val(act_data.act.name);

                    $('#kind_of_activity').val(act_data.act.category);

                    act_data.act.tqf_ethics=='1'? $('#ethics').prop('checked',true):$('#ethics').prop('checked',false);
                    act_data.act.tqf_knowledge=='1'? $('#knowledge').prop('checked',true):$('#knowledge').prop('checked',false);
                    act_data.act.tqf_cognitive=='1'? $('#cognitive').prop('checked',true): $('#cognitive').prop('checked',false);
                    act_data.act.tqf_interpersonal=='1'? $('#interpersonal').prop('checked',true):$('#interpersonal').prop('checked',false);
                    act_data.act.tqf_communication=='1'? $('#communication').prop('checked',true):$('#communication').prop('checked',false);

                    $('#division').val(act_data.act.div_id);

                    if(act_data.can_edit.length == 0)
                        $('#table-div').addClass('hidden');
                    else if($('#table-div').hasClass('hidden')) $('#table-div').removeClass('hidden');

                    $('#permission-table').empty();
                    for(i=0;i<act_data.can_edit.length;i++){
                        $('#permission-table').append(
                                '<tr id="tuple-'+act_data.can_edit[i].student_id+'"><input type="hidden" id="delete-'+act_data.can_edit[i].student_id+'" name="deleted['+act_data.can_edit[i].student_id+']" value="" />'
                                +'<td class="text-center"><a id="'+act_data.can_edit[i].student_id+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
                                +' <i class="fa fa-minus"></i>'
                                +' <i class="fa fa-trash"></i>'
                                +' </a></td>'
                                +' <td><input type="hidden" name="student_id[]" value="'+act_data.can_edit[i].student_id+'"/>'+act_data.can_edit[i].student_id+'</td>'
                                +' <td>'+act_data.can_edit[i].name+'</td>'
                                +' <td>'+act_data.can_edit[i].surname+'</td>'
                                +' </tr>'
                        );
                    }
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                return false;
            });
        }
        function main(){
            $(document).on('click','.delete-a-tuple',function(){
                var id =  this.id;
                $('#tuple-'+id).addClass('hidden');
                $('#delete-'+id).val(true);
                editor--;
                if(editor == 0) $('#table-div').addClass('hidden');
            });
            $('#studentInfo').keyup(function(){
                $('.typeahead').typeahead('destroy');
                $('.autosuggest').attr('data-queryURL','{!! url('activity/auto_suggest?limit=10&search=') !!}'+$(this).val());
                _autosuggest();
                $(this).trigger( "focus" );
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
                                    +'<td class="text-center"><a id="'+input["student_id"]+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
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