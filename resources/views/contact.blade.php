@extends('masterpage')

@section('title')
    ติดต่อ กวศ.
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('contactNavToggle')
    active
@endsection

@section('bodyTitle')
    กรรมการนิสิตคณะวิศวกรรมศาสตร์ ปีการศึกษา {{$year}}
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_permission'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="margin-bottom-20">เพิ่มกรรมการนิสิต</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group autosuggest" data-minLength="1" data-queryURL="{{url('setting/auto_suggest?limit=10&search=1')}}">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input id="position" name="position" class="form-control typeahead" placeholder="กรอกตำแหน่ง" type="text">
                                </div>
                                <span class="input-group-btn" id="add-new-permission-btn">
                                    <a class="btn btn-success">เพิ่ม</a>
                                </span>
                            </div>
                        </div>
                        <div class="table-responsive margin-bottom-30">
                            <table class="table nomargin" id="contact-table">
                                <tr >
                                    <th></th>
                                    <th style="text-align:center">ตำแหน่ง</th>
                                    <th style="text-align:center">ชื่อ</th>
                                    <th style="text-align:center">นามสกุล</th>
                                    <th style="text-align:center">ชื่อเล่น</th>
                                    <th style="text-align:center">หมายเลขโทรศัพท์</th>
                                    <th style="text-align:center">e-mail</th>
                                    <th style="text-align:center">line</th>
                                    <th style="text-align:center">Facebook</th>
                                </tr>
                                @foreach($all_contact as $contact)
                                    <tr id="tuple-{{$contact['position']}}-{{$contact['student_id']}}">
                                        <input type="hidden" id="delete-{{$contact['position']}}-{{$contact['student_id']}}}" name="privilege[{{$contact['position']}}-{{$contact['student_id']}}][]" value="" />
                                        <td class="text-center"><a id="{{$contact['position']}}-{{$contact['student_id']}}" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบ">
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{$contact['position']}}</td>
                                        <td>{{$contact['name']}}</td>
                                        <td>{{$contact['surname']}}</td>
                                        <td>{{$contact['nickname']}}</td>
                                        <td>{{$contact['phone_number']}}</td>
                                        <td>{{$contact['email']}}</td>
                                        <td>{{$contact['line_id']}}</td>
                                        <td>{{$contact['facebook_link']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </button>
                            </div>
                            <div class="col-md-1 text-center">
                                <span class="loading-icon"></span>
                            </div>
                            <div class="col-md-1">
                                <a id="cancelMemberEditButton" class="btn btn-3d btn-reveal btn-red">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                            <div class="col-md-1" style="margin-left: 5px">
                                <a id="deleteAllMemberButton" class="btn btn-3d btn-reveal btn-black">
                                    <i class="fa fa-trash-o"></i>
                                    <span>ลบทั้งหมด</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function main () {
            $("#cancelMemberEditButton").click(function () {
                window.location='{{url()}}/contact';
            });
            $("#deleteAllMemberButton").click(function () {
                window.location='{{url()}}/contact';
            });
            $('#studentInfo').keyup(function(){
                $('.typeahead').typeahead('destroy');
                $('.autosuggest').attr('data-queryURL','{!! url('setting/auto_suggest?limit=10&search=') !!}'+$(this).val());
                _autosuggest();
                $(this).trigger( "focus" );
            });
            $(document).on('click','.delete-a-tuple',function(){
                var id =  this.id;
                $('#tuple-'+id).addClass('hidden');
                $('#delete-'+id).val('deleted');
            });
            $(document).on('click','#add-new-permission-btn',function(){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/contact/add_new_contact',
                        {data:  $('#studentInfo').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='fail'){
                        _toastr("ไม่พบนิสิตในระบบ","top-right","error",false);
                        return false;
                    }
                    else {
                        if(document.getElementById(+input["student_id"])){
                            if(!$('#tuple-'+input["student_id"]).hasClass('hidden')){
                                _toastr("ข้อมูลซ้ำ","top-right","warning",false);
                            }
                            $('#tuple-'+input["student_id"]).removeClass('hidden');
                            $('#delete-'+input["student_id"]).val("");
                        }
                        else {
                            $('#contact-table').append('<tr id="tuple-'+input["student_id"]+'"><input type="hidden" id="delete-'+input["student_id"]+'" name="privilege['+input["student_id"]+'][]" value="" />'
                                    +'<td class="text-center"><a id="'+input["student_id"]+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
                                    +' <i class="fa fa-minus"></i>'
                                    +' <i class="fa fa-trash"></i>'
                                    +' </a></td>'
                                    +' <td><input type="hidden" name="student_id[]" value="'+input["student_id"]+'"/>'+input["student_id"]+'</td>'
                                    +' <td>'+input["name"]+'</td>'
                                    +' <td>'+input["surname"]+'</td>'
                                    +' <td>'+input["nickname"]+'</td>'
                                    +' <td>'+input["phone_number"]+'</td>'
                                    +' <td>'+input["email"]+'</td>'
                                    +' <td>'+input["line_id"]+'</td>'
                                    +' <td>'+input["facebook_link"]+'</td>'
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