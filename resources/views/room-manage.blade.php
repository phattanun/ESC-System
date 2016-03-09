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
                    <form class="validate" action="{{url().'/room/room-manage/edit_room'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

{{--เพิ่มลดแก้ไขห้องประชุม--------------------------------------------------------------------------------------------}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="margin-bottom-20 ">เพิ่มห้องประชุม</label>
                                <div class="fancy-form margin-bottom-20">
                                    <i class="fa fa-tag"></i>
                                    <input type="text" class="form-control" placeholder="ชื่อห้องประชุม">
                                </div>
                                <div class="fancy-form margin-bottom-20">
                                    <i class="fa fa-users"></i>
                                    <input type="text" class="form-control" placeholder="จำนวนคนที่จุได้">
                                </div>
                                <a class="btn btn-3d btn-reveal btn-success pull-right">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่ม</span>
                                </a>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">ห้องประชุม</label>
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table nomargin" id="permission-table">
                                            <tr >
                                                <th style="vertical-align:middle">ชื่อห้องประชุม</th>
                                                <th style="vertical-align:middle">จำนวนคนที่จุดได้</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id="">
                                                <input type="hidden" id="" name="room[1][]" value="ห้องประชุมใหญ่1">
                                                <input type="hidden" id="" name="room[1][]" value="30">
                                                <td class="margin-bottom-10">ห้องประชุมใหญ่ 1</td>
                                                <td class="margin-bottom-10" contenteditable>30 คน</td>
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
                                            <tr id="">
                                                <input type="hidden" id="" name="room[1][]" value="ห้องประชุมใหญ่1">
                                                <input type="hidden" id="" name="room[1][]" value="30">
                                                <td class="margin-bottom-10"><input type="text"></td>
                                                <td class="margin-bottom-10" contenteditable><input type="text"> คน</td>
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
                                            <tr id="">
                                                <input type="hidden" id="" name="room[1][]" value="ห้องประชุมใหญ่1">
                                                <input type="hidden" id="" name="room[1][]" value="30">
                                                <td class="margin-bottom-10"><input type="text"></td>
                                                <td class="margin-bottom-10" contenteditable>30 คน</td>
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
<hr>

{{--เวลาเปิด-ปิดห้อง ปกติ----------------------------------------------------------------------------------------------}}
                        <!--div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">เวลาที่อนุญาตให้จองห้องได้</label>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="08 : 00 : AM" data-timepicki-tim="08" data-timepicki-mini="00" data-timepicki-meri="AM">
                                        </div>
                                    </div>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="07 : 00 : PM" data-timepicki-tim="07" data-timepicki-mini="00" data-timepicki-meri="PM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<hr>


{{--เวลาเปิด-ปิดห้อง แบบไม่ปกติ มีeventต่างๆ----------------------------------------------------------------------------------------------}}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">ปรับเปลี่ยนช่วงเวลาที่อนุญาตให้ของได้ ในกรณีพิเศษ</label>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>ตั้งแต่วันที่</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>ถึงวันที่</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="08 : 00 : AM" data-timepicki-tim="08" data-timepicki-mini="00" data-timepicki-meri="AM">
                                        </div>
                                    </div>
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="07 : 00 : PM" data-timepicki-tim="07" data-timepicki-mini="00" data-timepicki-meri="PM">
                                        </div>
                                    </div>
                                    <a class="btn btn-3d btn-reveal btn-success pull-right">
                                        <i class="fa fa-plus"></i>
                                        <span>เพิ่ม</span>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="margin-bottom-20 ">กรณีพิเศษ</label>
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table" id="permission-table">
                                            <tr >
                                                <th style="vertical-align:middle">ตั้งแต่วันที่</th>
                                                <th style="vertical-align:middle">ถึงวันที่</th>
                                                <th style="vertical-align:middle">เวลาเปิด</th>
                                                <th style="vertical-align:middle">เวลาปิด</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id=""><input type="hidden" id="delete" name="" value="" />
                                                <td>21-03-2016</td>
                                                <td>23-03-2016</td>
                                                <td>08 : 00 : AM</td>
                                                <td>16 : 00 : PM</td>
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
                        </div-->

{{--แถบปุ่มบันทึก----------------------------------------------------------------------------------------------}}


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
    <style>
        td[contenteditable]{
            border: #ddd 2px solid;
            box-shadow: none;
            border-radius: 3px;
            padding: 0px;
        }
    </style>
@endsection

@section('js-top')
    <script>

    </script>
@endsection
