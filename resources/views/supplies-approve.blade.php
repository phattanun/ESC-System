@extends('masterpage')

@section('title')
    จัดการการยืมพัสดุ
@endsection
@section('body-attribute')
@endsection
@section('suppliesNavToggle')
    active
@endsection
@section('bodyTitle')
    อนุมัติการยืมพัสดุ
@endsection
@section('content')
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                <div class = "panel-body">
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" id="activity-table" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center;width:8%">ลำดับ</th>
                                <th style="vertical-align:middle;text-align: center;width:25%">กิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">หน่วยงาน</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">ผู้ขอยืม</th>
                                <th style="vertical-align:middle;text-align: center;width:8%">วันที่</th>
                                <th style="vertical-align:middle;text-align: center;width:10%">สถานะ</th>
                                <th style="vertical-align:middle;text-align: center;width:100%"></th>
                            </tr>
                            <tr id="template-tr">
                                <td id="number"   style="vertical-align:middle;text-align: center">-</td>
                                <td id="activity" style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                <td id="club"     style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                <td id="student"  style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                <td id="create_at"style="vertical-align:middle;text-align: center">--/--/--</td>
                                <td id="status"   style="vertical-align:middle;text-align: center">รอการอนุมัติ</td>
                                <td style="vertical-align:middle;text-align: center">
                                    <button id="button" type="button" class="btn btn-3d btn-reveal btn-yellow" onclick='$("#act-detail").modal("toggle");'>
                                        <i class="fa fa-edit"></i>
                                        <span>รายละเอียด</span>
                                    </button>
                                </td>
                            </tr>
                            <tr id="content-notfound" style="display:none">
                                <td colspan="7" style="vetical-align:middle;text-align: center">ไม่พบรายการจอง</td>
                            </tr>
                            <tbody id="contents-list"></tbody>
                            <tbody id="page-nav">
                                <tr>
                                    <td colspan="7" style="vetical-align:middle;text-align: center">
                                        <ul class="pagination">
                                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                            <li id="p1"><a href="#">1</a></li>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="act-detail" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="container" class="validate" method="post" enctype="multipart/form-data" style="margin:0">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <input type="hidden" name="approver_id" value="{{ $user['student_id'] }}">

                    <div id="head" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="title" class="modal-title">
                            <i class="fa fa-list-alt"></i> รายละเอียดการจอง</h4>
                        <!-- TABs -->
                        <ul id="act-tab" class="nav nav-tabs">
                            <li class="active"><a href="#" data-tab="reserve">ใบจอง</a></li>
                            <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
                        </ul>
                    </div>

                    <div id="content" class="modal-body">

                        <div id="act-info-reserve">
                            <table class="table nomargin" id="activity-table" width="100%">
                                <tr>
                                    <th style="vertical-align:middle;text-align: center;width:25%">ชื่อพัสดุ</th>
                                    <th style="vertical-align:middle;text-align: center;width:20%">วันเริ่มต้นการยืม</th>
                                    <th style="vertical-align:middle;text-align: center;width:20%">วันสิ้นสุดการยืม</th>
                                    <th colspan="2" style="vertical-align:middle;text-align: center;width:20%">จำนวน</th>
                                    <th style="vertical-align:middle;text-align: center;width:15%">ไม่อนุมัติ</th>
                                </tr>
                                @for($i=0;$i<10;$i++)
                                <tr id="template-tr">
                                    <td id=""   style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                    <td id=""   style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                    <td id=""   style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                    <td id=""   style="vertical-align:middle;text-align: center">--</td>
                                    <td id=""   style="vertical-align:middle;text-align: center">/ --</td>
                                    <td style="vertical-align:middle;text-align: center">
                                        <label class="checkbox"><input type="checkbox" name="disapprove"><i style="position:initial"></i></label>
                                    </td>
                                </tr>
                                @endfor
                                <tr id="item-notfound" style="display:none">
                                    <td colspan="7" style="vetical-align:middle;text-align: center">ไม่พบรายการจอง</td>
                                </tr>
                                <tbody id="items-list"></tbody>
                            </table>
                        </div>

                        <div id="act-info-owner" class="hide">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>รหัสนิสิต <span id="student_id" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อ <span id="name" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>นามสกุล <span id="surname" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อเล่น <span id="nickname" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>รุ่น <span id="generation" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ภาควิชา <span id="department" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>เบอร์ติดต่อ <span id="phone_number" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>E-mail <span id="email" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Facebook <span id="facebook_link" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>กิจกรรม <span id="activity" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>หน่วยงาน <span id="club" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-green" onclick="">
                            <i class="fa fa-check"></i><span>ยืนยัน</span>
                        </button>
                        <button type="button" class="btn btn-red" onclick="">
                            <i class="fa fa-times"></i><span>ไม่อนุมัติทั้งหมด</span>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-minus"></i><span>ยกเลิก</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .modal-header {
            padding-bottom: 0;
        }
        .nav-tabs {
            padding-top: 10px;
            border-bottom: none;
        }
        .checkbox input + i:after{
            top:1px;
            left:29px;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        function replace(data, postCallback) {
            var modal = $("#act-detail");
            console.log(data);

            var infoTabs = Object.getOwnPropertyNames(data);
            for(i in infoTabs) {
                var names = Object.getOwnPropertyNames(data[infoTabs[i]]);
                for(j in names) {
                    //console.log("#"+infoTabs[i]+" *[id="+names[j]+"]");
                    modal.find("#"+infoTabs[i]+" *[id="+names[j]+"]:not(input)").html(data[infoTabs[i]][names[j]]);
                    modal.find("#"+infoTabs[i]+" input[id="+names[j]+"]").val(data[infoTabs[i]][names[j]]);
                    if(postCallback != null)
                        postCallback(names[j],modal.find("#"+infoTabs[i]+" *[id="+names[j]+"]"),data[infoTabs[i]][names[j]]);
                }
            }
        }
        replace({
            'reserve' : {
                
            },
            'owner' : {

            }
        });
        function loadDetail(id) {
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/approve/modal") }}',
                data: {
                  _token: '{{ csrf_token() }}',
                  id: id
                },
                success: function(response) {
                    _toastr("Okay", "top-right", "success", false);
                    $("#act-detail").modal('toggle');
                    replace(response, function(name, element, data) {
                        // Nothing to do
                        console.log(name,data);
                    });
                    $("#act-detail").modal('toggle');
                },
                error : function(e) {
                    var response = e.responseText;
                    _toastr("Error", "top-right", "error", false);
                    return false;
                }
            });
        }
        function loadList() {
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/approve/list") }}',
                data: {
                  _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    /*
                        Sample Response
                        {
                            '1' : { // ใส่ไอดีมาได้เลย
                                'activity' : 'กิจกรรมกิจกรรม',
                                'club' : 'ชมรมชมรม',
                                'student' : 'ชื่อ นามสกุล',
                                'creat_at' : '01/03/59', // format ใน javascript ก็ได้
                                'status' : 'รอการอนุมัติ', // ส่ง  0 1 2 มาแปลทีหลังในนี้เอา
                            },
                            '2' : {
                                ...
                            },
                            '3' : {
                                ...
                            },
                        }
                    */
                    _toastr("Okay", "top-right", "success", false);
                    console.log(response);
                    var contents = Object.getOwnPropertyNames(data);
                    var container = $("#contents-list").empty();
                    for(contentId in contents) {
                        console.log(contentId);
                        var template = $("#template-tr").clone().css("display","");
                        template.find("#number").html(contentId);
                        template.find("button").attr("onclick","loadDetail("+contentId+");");
                        // TODO : More
                        container.append(template);
                    }
                    if(container.html()=="")
                        container.html($("#content-notfound").clone().css("display",""));
                },
                error : function() {
                    _toastr("กรุณาติดต่อผู้ดูแลระบบ", "top-right", "error", false);
                    $("#contents-list").empty().html($("#content-notfound").clone().css("display",""));
                    return false;
                }
            });
        }
        $("#act-detail").find("#act-tab a[data-tab]").click(function(e) {
            e.preventDefault();
            $("#act-detail #act-tab > li").removeClass('active');
            $(this.parentElement).addClass('active');
            $("#act-detail div[id*='act-info-']").addClass('hide').scrollTop(0);
            $("#act-detail #act-info-"+$(this).data('tab')).removeClass('hide');
        });
        loadList();
    </script>
@endsection
