@extends('masterpage')

@section('title')
    ติดต่อ กวศ.
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
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

                    <form novalidate="novalidate" class="validate" action="{{url().'/contact/update_contact'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงข้อมูลสำเร็จ" data-toastr-position="top-right">

                        @if($admin)
                        {{-- begin add box --}}
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
                        {{-- end add box --}}
                        @endif

                        {{-- begin table --}}
                        <div class="table-responsive margin-bottom-30">
                            <table class="table nomargin" id="contact-table">
                                <tr >
                                    @if($admin)<th></th>@endif
                                    <th style="text-align:center">ตำแหน่ง</th>
                                    <th style="text-align:center">ชื่อ</th>
                                    <th style="text-align:center">นามสกุล</th>
                                    <th style="text-align:center">ชื่อเล่น</th>
                                    <th style="text-align:center">หมายเลขโทรศัพท์</th>
                                    <th style="text-align:center">e-mail</th>
                                    <th style="text-align:center">line</th>
                                    <th style="text-align:center">Facebook</th>
                                </tr>

                                {{-- begin content --}}
                                @foreach($all_contact as $contact)
                                    <tr id="tuple-{{$contact['position']}}-{{$contact['student_id']}}">
                                        @if($admin)
                                        <input type="hidden" id="delete-{{$contact['position']}}-{{$contact['student_id']}}" name="contact[{{$contact['student_id']}}][]" value="{{$contact['position']}}" />
                                        <td class="text-center"><a id="{{$contact['position']}}-{{$contact['student_id']}}" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบ">
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        @endif
                                        <td>{{$contact['position']}}</td>
                                        <td>{{$contact['name']}}</td>
                                        <td>{{$contact['surname']}}</td>
                                        <td style="text-align:center">{{$contact['nickname']}}</td>
                                        <td style="text-align:center">{{$contact['phone_number']}}</td>
                                        <td style="text-align:center">{{$contact['email']}}</td>
                                        <td style="text-align:center">{{$contact['line_id']}}</td>
                                        <td style="text-align:center"><a href="{{$contact['facebook_link']}}">{{$contact['facebook_link']}}</a></td>
                                    </tr>
                                @endforeach
                                {{-- end content --}}
                            </table>
                        </div>
                        {{-- end table --}}

                        @if($admin)
                        {{-- begin button --}}
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
                                <a id="cancelContactEditButton" class="btn btn-3d btn-reveal btn-red">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                            <div class="col-md-1" style="margin-left: 5px">
                                <a id="deleteAllContactButton" class="btn btn-3d btn-reveal btn-black" data-toggle="modal" data-target="#confirmDelete">
                                    <i class="fa fa-trash-o"></i>
                                    <span>ลบทั้งหมด</span>
                                </a>
                            </div>
                        </div>
                        {{-- end button --}}
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>
    <div id="confirmDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ยืนยันการลบข้อมูลกรรมการนิสิตทั้งหมด</h4>
                </div>
                <div class="modal-footer">
                    <a id="confirmDeleteAll" class="btn btn-3d btn-reveal btn-black" data-dismiss="modal">
                        <i class="fa fa-trash-o"></i>
                        <span>ลบทั้งหมด</span>
                    </a>
                    <a id="cancelDeleteAll" class="btn btn-default" data-dismiss="modal">
                        <span>ยกเลิก</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        function main () {
            $("#cancelContactEditButton").click(function () {
                window.location='{{url()}}/contact';
            });
            $("#confirmDeleteAll").click(function () {
                $.post(URL_ROOT+'/contact/drop_contact');
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
                $('#tuple-'+id).remove();
            });
            $(document).on('click','#add-new-permission-btn',function(){
                var URL_ROOT = '{{Request::root()}}';
                var position = $('#position').val();
                $.post(URL_ROOT+'/contact/add_new_contact',
                        {data:  $('#studentInfo').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='fail'){
                        _toastr("ไม่พบนิสิตในระบบ","top-right","error",false);
                        return false;
                    }
                    else {
                        if(document.getElementById('tuple-'+position+'-'+input["student_id"])){
                            if(!$('#tuple-'+position+'-'+input["student_id"]).hasClass('hidden')){
                                _toastr("ข้อมูลซ้ำ","top-right","warning",false);
                            }
                        }
                        else {
                            $('#contact-table').append('<tr id="tuple-'+position+'-'+input["student_id"]+'"><input type="hidden" id="delete-'+position+'-'+input["student_id"]+'" name="contact['+input['student_id']+'][]" value="'+position+'" />'
                                    +'<td class="text-center"><a id="'+position+'-'+input["student_id"]+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบ">'
                                    +'<i class="fa fa-minus"></i>'
                                    +'<i class="fa fa-trash"></i>'
                                    +'</a></td>'
                                    +'<td>'+position+'</td>'
                                    +'<td>'+input["name"]+'</td>'
                                    +'<td>'+input["surname"]+'</td>'
                                    +'<td style="text-align:center">'+input["nickname"]+'</td>'
                                    +'<td style="text-align:center">'+input["phone_number"]+'</td>'
                                    +'<td style="text-align:center">'+input["email"]+'</td>'
                                    +'<td style="text-align:center">'+input["line_id"]+'</td>'
                                    +'<td style="text-align:center"><a href="'+input["facebook_link"]+'">'+input["facebook_link"]+'</td>'
                                    +'</tr>');
                        }
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                    return false;
                });
            });
        }
        $(document).ready(main);
    </script>
@endsection