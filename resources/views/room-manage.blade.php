@extends('masterpage')

@section('title')
    ตั้งค่าห้องประชุม
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    ตั้งค่าห้องประชุม
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>window.location='{{url()}}/setting';</script>" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            {{--<input type="hidden" name="_token" value="{{{ csrf_token() }}}">--}}
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20">Upload รูปแผนที่ห้องประชุม </label>
                                        <input class="custom-file-upload" type="file" id="file" name="contact[attachment]" id="contact:attachment" data-btn-text="Select a File" />
                                        <small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <br>
                                        <img src="{{url('assets/images/patterns/pattern6.png')}}" style="width: 100%">
                                        <br><br>
                                        <div>
                                            <a class="btn btn-3d btn-reveal btn-yellow">
                                                <i class="fa fa-save"></i>
                                                <span>บันทึก</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_permission'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">เพิ่มผู้จัดการข้อมูล</label>
                                    <div class="fancy-form" style="margin-bottom: 15px;">
                                        <i class="fa fa-tag"></i>
                                        <input type="text" class="form-control" placeholder="ชื่อห้องประชุม">
                                    </div>
                                    <div class="fancy-form" style="margin-bottom: 15px;">
                                        <i class="fa fa-users"></i>
                                        <input type="text" class="form-control" placeholder="จำนวนคนที่จุได้">
                                    </div>
                                    <a class="btn btn-3d btn-reveal btn-success pull-right">
                                        <i class="fa fa-plus"></i>
                                        <span>เพิ่ม</span>
                                    </a>
                                </div>
                            </div>
                        </fieldset>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table nomargin" id="permission-table">
                                            <tr >
                                                <th style="vertical-align:middle">ชื่อห้องประชุม</th>
                                                <th style="vertical-align:middle">จำนวนคนที่จุดได้</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id=""><input type="hidden" id="delete" name="" value="" />
                                                <td>ห้องประชุมใหญ่ 1</td>
                                                <td>30 คน</td>
                                                <td class="text-center">
                                                    <a class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table nomargin" id="permission-table">
                                            <tr >
                                                <th style="vertical-align:middle">ชื่อห้องประชุม</th>
                                                <th style="vertical-align:middle">จำนวนคนที่จุดได้</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id=""><input type="hidden" id="delete" name="" value="" />
                                                <td>ห้องประชุมใหญ่ 1</td>
                                                <td>30 คน</td>
                                                <td class="text-center">
                                                    <a class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                                <a id="cancelPermissionEditButton" class="btn btn-3d btn-reveal btn-red">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('css')
    <link href="{{url('assets/css/setting.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js-top')
    <script>

    </script>
@endsection
