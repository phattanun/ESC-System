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
                                        <button type="button" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target=".{{$act['act_id']}}">
                                            <i class="fa fa-edit"></i>
                                            <span>แก้ไข</span>
                                        </button>
                                    </td>

                                    <div class="modal fade {{$act['act_id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- header modal -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myLargeModalLabel">{{$act['name']}}</h4>
                                                </div>

                                                <!-- body modal -->
                                                <div class="modal-body">
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label>ชื่อกิจกรรม *</label>
                                                            <input name="activity_name" value="{{$act['name']}}" class="form-control required"
                                                                   type="text">
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label>ประเภท *</label>
                                                            <div class="fancy-form fancy-form-select">
                                                                <select class="form-control" name="kind_of_activity">
                                                                    <option value="กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ" @if($act['category']=="กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ") selected @endif>กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>
                                                                    <option value="กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม" @if($act['category']=="กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม") selected @endif>กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>
                                                                    <option value="กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์" @if($act['category']=="กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์") selected @endif>กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>
                                                                    <option value="กิจกรรมส่งเสริมศิลปวัฒนธรรม" @if($act['category']=="กิจกรรมส่งเสริมศิลปวัฒนธรรม") selected @endif>กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>
                                                                    <option value="กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม" @if($act['category']=="กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม") selected @endif>กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>
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
                                                                <input type="checkbox" value=true name="tqf[ethics]" @if($act['tqf_ethics']) checked @endif>
                                                                <i></i> ด้านคุณธรรม จริยธรรม (Ethics and Moral)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=true name="tqf[knowledge]" @if($act['tqf_knowledge']) checked @endif>
                                                                <i></i> ด้านความรู้ (Knowledge)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=true name="tqf[cognitive]" @if($act['tqf_cognitive']) checked @endif>
                                                                <i></i> ด้านทักษะทางปัญญา (Cognitive Skills)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=true name="tqf[interpersonal]" @if($act['tqf_interpersonal']) checked @endif>
                                                                <i></i> ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=true name="tqf[communication]" @if($act['tqf_communication']) checked @endif>
                                                                <i></i> ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ <br>
                                                                (Numerical Analysis, Communication and Information Technology Skills)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <label>หน่วยงานที่เกี่ยวข้อง *</label>
                                                            <div class="fancy-form fancy-form-select">
                                                                <select class="form-control" name="division">
                                                                    <option value="">--- หน่วยงานที่เกี่ยวข้อง ---</option>
                                                                    {{--<option value="1">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>--}}
                                                                    {{--<option value="2">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>--}}
                                                                    {{--<option value="3">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>--}}
                                                                    {{--<option value="4">กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>--}}
                                                                    {{--<option value="5">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>--}}
                                                                    @foreach($division as $d)
                                                                        <option value = "{{$d['div_id']}}">{{$d['name']}}</option>
                                                                    @endforeach
                                                                </select>

                                                                <!--
                                                                    .fancy-arrow
                                                                    .fancy-arrow-double
                                                                -->
                                                                <i class="fancy-arrow"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> {{--End Modal body--}}
                                            </div>
                                        </div>
                                    </div>
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

    </script>
@endsection