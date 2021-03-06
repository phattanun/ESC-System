@extends('masterpage')

@section('title')
    จัดการกิจกรรม
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
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
    <div class="modal fade act_detail" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                </div>

                <!-- body modal -->
                <form novalidate="novalidate" action="{{url().'/activity/list/edit_form'}}" class="validate" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เพิ่มกิจกรรมสำเร็จ<script>window.location='{{url().'/activity/list'}}';</script>" data-toastr-position="top-right">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="act_id" id = 'act_id' value="">
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label>ชื่อกิจกรรม *</label>
                                <input name="activity_name" value="" id="act_name" class="form-control required"
                                       type="text">
                            </div>
                            <div class="col-md-1 col-sm-1">
                            </div>
                            @if(isset($user['activities']))
                                <div class="col-md-4 col-sm-4">
                                    <label>สถานะของกิจกรรม *</label>
                                    <select class="form-control select2" name="act_status" id="act_status" style="width: 100%">
                                        <option value="0">รอเปิดโครงการ</option>
                                        <option value="1">กวศ อนุมัติ</option>
                                        <option value="2">คณบดี อนุมัติ</option>
                                        <option value="3">รอปิดโครงการ</option>
                                        <option value="4">ปิดโครงการ</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label>ประเภท *</label>
                                <select class="form-control select2" name="kind_of_activity" id="kind_of_activity" style="width: 100%">
                                    <option value="sport">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>
                                    <option value="volunteer">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>
                                    <option value="academic">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>
                                    <option value="culture">กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>
                                    <option value="ethics">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label>สอดคล้องกับกรอบมาตรฐาน TQF ใน  5 ด้าน  ได้แก่</label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label class="checkbox">
                                    <input type="checkbox" value=true id="ethics" name="tqf[ethics]">
                                    <i></i> ด้านคุณธรรม จริยธรรม (Ethics and Moral)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label class="checkbox">
                                    <input type="checkbox" value=true id="knowledge" name="tqf[knowledge]">
                                    <i></i> ด้านความรู้ (Knowledge)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label class="checkbox">
                                    <input type="checkbox" value=true id="cognitive" name="tqf[cognitive]">
                                    <i></i> ด้านทักษะทางปัญญา (Cognitive Skills)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label class="checkbox">
                                    <input type="checkbox" value=true id="interpersonal" name="tqf[interpersonal]">
                                    <i></i> ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-6 col-sm-6">
                                <label class="checkbox">
                                    <input type="checkbox" value=true id="communication" name="tqf[communication]">
                                    <i></i> ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ <br>
                                    (Numerical Analysis, Communication and Information Technology Skills)
                                </label>
                            </div>
                        </div>
                        <div id="upload-file-section" class="margin-bottom-20">
                            <div class="row">
                                <label class="col-md-4">ไฟล์ *</label>
                            </div>
                            <div class="row">
                                <ul class="list-group col-md-6 col-sm-6" id="exist-file-section">
                                </ul>
                            </div>

                        </div>
                        <div class = "row">
                            <div class="col-md-1">
                                <a id="add-file" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่มไฟล์</span>
                                </a>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label>หน่วยงานที่เกี่ยวข้อง *</label>
                                <select class="form-control select2" name="division" id="division" style="width: 100%">
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
                                <tr id="table-header">
                                    <th style="vertical-align:middle"></th>
                                    <th style="vertical-align:middle" >รหัสนิสิต</th>
                                    <th style="vertical-align:middle" >ชื่อ</th>
                                    <th style="vertical-align:middle" >นามสกุล</th>
                                </tr>
                            </table>
                        </div>
                        <div class = "row">
                            <div class="col-md-3 col-sm-3">
                                <label>ชั้นปีสุดท้ายที่เห็น *</label>
                                <input name="last_year_seen" value="" class="form-control required"
                                       type="text" id="last_year_seen">
                            </div>
                        </div>
                        <div class="row text-center">
                            <button type="submit" id="submitBtn" class="btn  btn-lg btn-success"><i
                                        class="fa fa-check"></i>ยืนยัน
                            </button>
                        </div>
                    </div>
                </form>
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
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">ค้นหากิจกรรม</label>
                                    <div class="input-group autosuggest" data-minLength="1" >
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="activityInfo" name="activityInfo" class="form-control typeahead" placeholder="กรอกชื่อกิจกรรม" type="text">
                                            <span class="input-group-btn" id="search-activity-btn">
                                                <a class="btn btn-success">ค้นหา</a>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" id="activity-table" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center;width:5%"></th>
                                <th style="vertical-align:middle;text-align: center;width:30%">ชื่อกิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:10%">ปีการศึกษา</th>
                                <th style="vertical-align:middle;text-align: center;width:30%">ไฟล์</th>
                                <th style="vertical-align:middle;text-align: center;width:15%">สถานะกิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:10%"></th>
                            </tr>
                                @foreach($act_list as $act)
                                    <tr class="actlist" id='activity-{{$act['act_id']}}'>
                                        <td class="text-center" style="vertical-align: middle;text-align: center">
                                            @if($act['status']<=1)
                                            <a id="delete-button-{{$act['act_id']}}"class="delete-activity-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" onclick="deleteActivity({{$act['act_id']}})" data-placement="top" title="ลบกิจกรรม">
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;text-align: center">{{$act['name']}}</td>
                                        <td style="vertical-align: middle;text-align: center">{{$act['year']}}</td>
                                    @if(isset($actFiles[$act['act_id']])&&!empty($actFiles[$act['act_id']])&&sizeof($actFiles[$act['act_id']])>0)    <td style="vertical-align: middle;text-align: center">@foreach($actFiles[$act['act_id']] as $actFile) <a class="file" href="{{url('/activity/attachments')}}/{{$actFile['file_id']}}">{{$actFile['file_name']}}</a></br> @endforeach</td>
                                    @else   <td style="vertical-align: middle;text-align: center">ไม่มีไฟล์</td>
                                    @endif
                                            @if($act['status']==0)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-orange">รอเปิดโครงการ</span></td>
                                            @elseif($act['status']==1)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-olive">กวศ อนุมัติ</span></td>
                                            @elseif($act['status']==2)
                                            <td style="vertical-align: middle;text-align: center"><span class="text-green">คณบดี อนุมัติ</span></td>
                                            @elseif($act['status']==3)
                                            <td style="vertical-align: middle;text-align: center"><span class="text-red">รอปิดโครงการ</span></td>
                                            @elseif($act['status']==4)
                                            <td style="vertical-align: middle;text-align: center"><span class="text-black">ปิดโครงการ</span></td>
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
@section('css')
   <style>
       .list-group {
           padding-left: 15px;
       }
       #exist-file-section .delete-file-tuple {
           margin-top: -2px ;
       }
       #exist-file-section {
           word-break: break-all;
       }
       a.file {
          color:#780000;
       }
       a.file:hover {
           color: #212121;
           text-decoration: underline;
       }
   </style>
@endsection
@section('js')
    <script>
            var editor = 0;
            $(document).on('click','.delete-file-tuple',function (){
                $('#delete-'+this.id).val(this.id);
                $(this).closest('li').addClass('hidden');
            });
            $(document).on('click','.delete-file-btn',function (){
                $(this).closest('.row').remove();
            });
            $('.modal').on('hidden.bs.modal', function () {
                $('#exist-file-section').html('');
                $('.file-upload-class').remove();
            });
            $('#add-file').click(function(){
                $(
                        '<div class="row file-upload-class">'+
                        '<div class="col-xs-9 col-md-5">'+
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
            var user = JSON.parse("{{$user}}".replace(/&quot;/g,'"'));
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
                        $('#act_id').val(act_data.act.act_id);
                        $('#myLargeModalLabel').empty();
                        $('#myLargeModalLabel').append(act_data.act.name);
                        $('#act_name').val(act_data.act.name);
                        act_data.act.status =='0' || user['activities'] ? $('#act_name').prop('disabled',false):$('#act_name').prop('disabled',true);

                      @if(isset($user['activities']))  $('#act_status').select2('val',act_data.act.status); @endif
                        $('#kind_of_activity').select2('val',act_data.act.category);

                        act_data.act.status =='0' || user['activities'] ? $('#kind_of_activity').prop('disabled',false):$('#kind_of_activity').prop('disabled',true);

                        act_data.act.tqf_ethics=='1'? $('#ethics').prop('checked',true):$('#ethics').prop('checked',false);
                        act_data.act.status =='0' || user['activities'] ? $('#ethics').prop('disabled',false):$('#ethics').prop('disabled',true);

                        act_data.act.tqf_knowledge=='1'? $('#knowledge').prop('checked',true):$('#knowledge').prop('checked',false);
                        act_data.act.status =='0' || user['activities'] ? $('#knowledge').prop('disabled',false):$('#knowledge').prop('disabled',true);

                        act_data.act.tqf_cognitive=='1'? $('#cognitive').prop('checked',true): $('#cognitive').prop('checked',false);
                        act_data.act.status =='0' || user['activities'] ? $('#cognitive').prop('disabled',false):$('#cognitive').prop('disabled',true);

                        act_data.act.tqf_interpersonal=='1'? $('#interpersonal').prop('checked',true):$('#interpersonal').prop('checked',false);
                        act_data.act.status =='0' || user['activities'] ? $('#interpersonal').prop('disabled',false):$('#interpersonal').prop('disabled',true);

                        act_data.act.tqf_communication=='1'? $('#communication').prop('checked',true):$('#communication').prop('checked',false);
                        act_data.act.status =='0' || user['activities'] ? $('#communication').prop('disabled',false):$('#communication').prop('disabled',true);

                        $('#division').select2('val',act_data.act.div_id);

                        act_data.act.status =='0' || user['activities'] ? $('#division').prop('disabled',false):$('#division').prop('disabled',true);

                        /*if(act_data.can_edit.length == 0)
                            $('#table-div').addClass('hidden');
                        else if($('#table-div').hasClass('hidden')) $('#table-div').removeClass('hidden');*/

                        $('#permission-table').empty();
                        $('#permission-table').append(
                                '<tr id="table-header">'
                                + '<th style="vertical-align:middle"></th>'
                                + '<th style="vertical-align:middle;" >รหัสนิสิต</th>'
                                + '<th style="vertical-align:middle;" >ชื่อ</th>'
                                + '<th style="vertical-align:middle;" >นามสกุล</th>'
                                + '</tr>'
                                + '<tr id="tuple-'+act_data.owner.student_id+'">'
                                + '<td class="text-center"><b>'+'Creator'+'</b></td>'
                                + '<td>'+act_data.owner.student_id+'</td>'
                                + '<td>'+act_data.owner.name+'</td>'
                                + '<td>'+act_data.owner.surname+'</td>'
                                + '</tr>'
                        );
                        for(i=0;i<act_data.can_edit.length;i++){
                            $('#permission-table').append(
                                '<tr id="tuple-'+act_data.can_edit[i].student_id+'"><input type="hidden" id="delete-'+act_data.can_edit[i].student_id+'" name="deleted['+act_data.can_edit[i].student_id+']" value="" />'
                                +'<td class="text-center"><a id="'+act_data.can_edit[i].student_id+'" class="delete-user-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
                                +' <i class="fa fa-minus"></i>'
                                +' <i class="fa fa-trash"></i>'
                                +' </a></td>'
                                +' <td><input type="hidden" name="student_id[]" value="'+act_data.can_edit[i].student_id+'"/>'+act_data.can_edit[i].student_id+'</td>'
                                +' <td>'+act_data.can_edit[i].name+'</td>'
                                +' <td>'+act_data.can_edit[i].surname+'</td>'
                                +' </tr>'
                            );
                        }
                        for(i=0;i<act_data.file.length;i++){
                            $('#exist-file-section').append(
                                    '<li class="list-group-item"><input id="delete-'+act_data.file[i].file_id +'" type="hidden" name="delete[]" value="" /><a id="'+ act_data.file[i].file_id +'" class="pull-right delete-file-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
                                    +' <i class="fa fa-minus"></i>'
                                    +' <i class="fa fa-trash"></i>'
                                    +' </a><a href="{{url('/activity/attachments')}}/'+ act_data.file[i].file_id+'">'+ act_data.file[i].file_name +'</a></li>'
                            );
                        }
                        $('#last_year_seen').val(act_data.act.avail_year);
                        act_data.act.status =='0' || user['activities'] ? $('#last_year_seen').prop('disabled',false):$('#last_year_seen').prop('disabled',true);
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                    return false;
                });
            }
            function deleteActivity(act_id){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT + '/activity/list/delete_activity',
                        {act_id: act_id, _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='fail')
                        _toastr("ไม่สามารถลบกิจกรรมนี้ได้", "top-right", "error", false);
                    else
                        $('#activity-'+act_id).remove();
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                    return false;
                });
            }
            function main(){
                $(document).on('click','.delete-user-tuple',function(){
                    var id =  this.id;
                    $('#tuple-'+id).addClass('hidden');
                    $('#delete-'+id).val(true);
                    editor--;
                    if(editor == 0) {
                        $('#table-div').addClass('hidden');
                    }
                });
                $('#studentInfo').keyup(function(){
                    $('.typeahead').typeahead('destroy');
                    $('.autosuggest').attr('data-queryURL','{!! url('/setting/auto_suggest?limit=10&search=') !!}'+$(this).val());
                    _autosuggest();
                    $(this).trigger( "focus" );
                });
                $('#activityInfo').keyup(function(){
                    $('.typeahead').typeahead('destroy');
                    $('.autosuggest').attr('data-queryURL','{!! url('/activity/auto_suggest?limit=10&search=') !!}'+$(this).val());
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
                                $('#permission-table').append(
                                        '<tr id="tuple-'+input["student_id"]+'"><input type="hidden" id="delete-'+input["student_id"]+'" name="deleted['+input["student_id"]+']" value="" />'
                                        +'<td class="text-center">'
                                        +'<a id="'+input["student_id"]+'" class="delete-user-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบออกจากผู้มีสิทธิ์แก้ไขกิจกรรม">'
                                        +' <i class="fa fa-minus"></i>'
                                        +' <i class="fa fa-trash"></i>'
                                        +' </a></td>'
                                        +' <td><input type="hidden" name="student_id[]" value="'+input["student_id"]+'"/>'+input["student_id"]+'</td>'
                                        +' <td>'+input["name"]+'</td>'
                                        +' <td>'+input["surname"]+'</td>'
                                        +'  </tr>'
                                );
                                editor++;
                            }
                        }
                    }).fail(function () {
                        _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                        return false;
                    });
                });
                $(document).on('click','#search-activity-btn', function () {
                    var URL_ROOT = '{{Request::root()}}';
                    $.post(URL_ROOT + '/activity/list/search_activity',
                            {act_name: $('#activityInfo').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                        if (input == 'fail') {
                            _toastr("ไม่พบกิจกรรมในระบบ", "top-right", "error", false);
                            return false;
                        }
                        else {
                            var data = JSON.parse(input);
                            //var data = $.map(s, function(el) { return el });
                            console.log(data);
                            //console.log(s.actFiles[1][0].file_name);
                            $('.actlist').remove();
                            for(i=0;i<data.act_info.length;i++){
                                var status;
                                var color;
                                switch(data.act_info[i].status){
                                    case 0: status = 'รอเปิดโครงการ';color = 'text-orange';break;
                                    case 1: status = 'กวศ อนุมัติ';color = 'text-olive';break;
                                    case 2: status = 'คณบดี อนุมัติ';color = 'text-green';break;
                                    case 3: status = 'รอปิดโครงการ';color = 'text-red';break;
                                    case 4: status = 'ปิดโครงการ';color = 'text-black';break;
                                }
                                $('#activity-table').append(
                                    '<tr id="table-header" class="actlist">'
                                    +'<td class="text-center" style="vertical-align: middle;text-align: center">'
                                    +'<a id="delete-button-'+data.act_info[i].act_id+'" class="delete-activity-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบออกจากผู้มีสิทธิ์แก้ไขกิจกรรม">'
                                    +'<i class="fa fa-minus"></i>'
                                    +'<i class="fa fa-trash"></i>'
                                    +'</a>'
                                    +'</td>'
                                    +'<td style="vertical-align:middle;text-align: center">'+data.act_info[i].name+'</td>'
                                    +'<td style="vertical-align:middle;text-align: center">'+data.act_info[i].year+'</td>'
                                    +'<td id="files-column-'+data.act_info[i].act_id+'" style="vertical-align: middle;text-align:center"></td>'
                                    +'<td style="vertical-align:middle;text-align: center"><span class="'+color+'">'+status+'</span></td>'
                                    +'<td style="vertical-align:middle;text-align: center">'
                                    +'<button type="button" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target=".act_detail" onclick="loaddetail('+data.act_info[i].act_id+')">'
                                    +'<i class="fa fa-edit"></i>'
                                    +'<span>แก้ไข</span>'
                                    +'</button>'
                                    +'</td>'
                                    +'</tr>'
                                );
                                console.log(data.actFiles[data.act_info[i].act_id].length);
                                if(data.actFiles[data.act_info[i].act_id].length == 0 ) $('#files-column-' + data.act_info[i].act_id).append('ไม่มีไฟล์');
                                else {
                                    for (j = 0; j < data.actFiles[data.act_info[i].act_id].length; j++) {
                                        $('#files-column-' + data.act_info[i].act_id).append(
                                                '<a class="file" href="{{url("/activity/attachments")}}/' + data.actFiles[data.act_info[i].act_id][j].file_id + '">' + data.actFiles[data.act_info[i].act_id][j].file_name + '</a></br>'
                                        );
                                    }
                                }
                                if(input['status']>1)
                                {
                                    $('#delete-button-'+input[i]['act_id']).empty();
                                    $('#delete-button-'+input[i]['act_id']).remove();
                                }
                            }
                        }
                    }).fail(function () {
                        _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                        return false;
                    });
                });
            }
            $( document ).ready(main);
    </script>
@endsection