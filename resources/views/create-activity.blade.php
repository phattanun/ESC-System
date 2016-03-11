@extends('masterpage')

@section('title')
    เพิ่มกิจกรรม
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
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
                    <form>
                        <div class = "row">
                            <div class="col-md-8 col-sm-8">
                                <label>ชื่อกิจกรรม *</label>
                                <input name="activity_name" value="" class="form-control required"
                                       type="text">
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
                                <div class="fancy-form fancy-form-select">
                                    <select class="form-control" name="kind_of_activity">
                                        <option value="">--- ประเภทของกิจกรรม ---</option>
                                        <option value="1">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</option>
                                        <option value="2">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</option>
                                        <option value="3">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</option>
                                        <option value="4">กิจกรรมส่งเสริมศิลปวัฒนธรรม</option>
                                        <option value="5">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</option>
                                    </select>

                                    <!--
                                        .fancy-arrow
                                        .fancy-arrow-double
                                    -->
                                    <i class="fancy-arrow"></i>
                                </div>
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
                                    <input type="checkbox" value="1" name="ethics">
                                    <i></i> ด้านคุณธรรม จริยธรรม (Ethics and Moral)
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4 col-sm-4">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="knowledge">
                                    <i></i> Languages and Academic Knowledge
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4 col-sm-4">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="engineering">
                                    <i></i> Engineering Practice
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4 col-sm-4">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="culture">
                                    <i></i> Cultural Practice
                                </label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-md-4 col-sm-4">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="asean">
                                    <i></i> Basic Knowledge of ASEAN
                                </label>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-md-8">--}}
                                {{--<label>ไฟล์ *</label>--}}
                                {{--<input class="custom-file-upload" type="file" id="file" name="file" id="file" data-btn-text="Select a File" />--}}
                                {{--<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class = "row">
                            <div class="col-md-2 col-sm-2">
                                <label>ชั้นปีสุดท้ายที่เห็น *</label>
                                <input name="last_year_seen" value="" class="form-control required"
                                       type="text">
                            </div>
                        </div>
                    </form>
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_permission'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20 ">เพิ่มผู้จัดการข้อมูล</label>
                                        <div class="input-group autosuggest" data-minLength="1" data-queryURL="{{url('setting/auto_suggest?limit=10&search=1')}}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <a class="btn btn-success">เพิ่ม</a>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="table-responsive margin-bottom-30" style="float:left; width:50%">
                            <table class="table nomargin" id="permission-table" width="100%">
                                <tr>
                                    <th style="vertical-align:middle" rowspan="2">รหัสนิสิต</th>
                                    <th style="vertical-align:middle" rowspan="2">ชื่อ</th>
                                    <th style="vertical-align:middle" rowspan="2">นามสกุล</th>
                                </tr>
                            </table>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-1">--}}
                                {{--<button type="submit" class="btn btn-3d btn-reveal btn-green">--}}
                                    {{--<i class="fa fa-check"></i>--}}
                                    {{--<span>บันทึก</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-1 text-center">--}}
                                {{--<span class="loading-icon"></span>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-1">--}}
                                {{--<a id="cancelPermissionEditButton" class="btn btn-3d btn-reveal btn-red">--}}
                                    {{--<i class="fa fa-times"></i>--}}
                                    {{--<span>ยกเลิก</span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection