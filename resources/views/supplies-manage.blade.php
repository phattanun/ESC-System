@extends('masterpage')

@section('title')
    จัดการยืม-คืนพัสดุ
@endsection
@section('body-attribute')
@endsection
@section('suppliesNavToggle')
    active
@endsection
@section('bodyTitle')
    จัดการยืม-คืนพัสดุ
@endsection
@section('content')
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                <div class = "panel-body">
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center;width:8%">ลำดับ</th>
                                <th style="vertical-align:middle;text-align: center;width:25%">กิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">หน่วยงาน</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">ผู้ขอยืม</th>
                                <th style="vertical-align:middle;text-align: center;width:8%">วันที่</th>
                                <th style="vertical-align:middle;text-align: center;width:10%">สถานะ</th>
                                <th style="vertical-align:middle;text-align: center;width:100%"></th>
                            </tr>
                            <tr id="template-reserve" style="display:none">
                                <td id="number"   style="vertical-align:middle;text-align: center">-</td>
                                <td id="activity_name" style="vertical-align:middle;text-align: center">ไม่มีข้อมูล</td>
                                <td id="division_name"     style="vertical-align:middle;text-align: center">ไม่มีข้อมูล</td>
                                <td id="creator_name"  style="vertical-align:middle;text-align: center">ไม่มีข้อมูล</td>
                                <td id="create_at"style="vertical-align:middle;text-align: center">--/--/--</td>
                                <td style="vertical-align:middle;text-align: center"><span id="status">ไม่มีข้อมูล</span></td>
                                <td style="vertical-align:middle;text-align: center">
                                    <button id="button" type="button" class="btn btn-3d btn-reveal btn-yellow" onclick='$("#sup-detail").modal("toggle");'>
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
    <div id="sup-detail" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="container" class="validate" method="post" enctype="multipart/form-data" style="margin:0">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="approver_id" value="{{ $user['student_id'] }}">
                    <input type="hidden" name="list_id">

                    <div id="head" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="title" class="modal-title">
                            <i class="fa fa-list-alt"></i> รายละเอียดการจอง
                        </h4>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>กิจกรรม <span id="activity" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                            </div>
                            <div class="col-sm-6">
                                <label>หน่วยงาน <span id="division" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                            </div>
                        </div>

                        <div class="row" style="margin:0">
                            <div class="col-sm-6">
                                <label style="text-align:center">รายการพัสดุ (เจ้าหน้าที่)</label>
                                <table class="table">
                                    <tr>
                                        <th style="vertical-align:middle;text-align:center;">ชื่อพัสดุ</th>
                                        <th colspan="2" style="vertical-align:middle;text-align:center;">จำนวน</th>
                                        <th style="vertical-align:middle;text-align:center;">หน่วย</th>
                                        <th></th>
                                    </tr>
                                    <tr id="item-notfound">
                                        <td colspan="5" style="vetical-align:middle;text-align: center">ไม่พบรายการ</td>
                                    </tr>
                                    <tbody id="staff-item-list">
                                        <tr>
                                            <input id="give_item_id" type="hidden" class="required">
                                            <td style="vertical-align:middle;text-align:center;">ไม่มีข้อมูล</td>
                                            <td style="vertical-align:middle;text-align:center;">-5</td>
                                            <td style="vertical-align:middle;text-align:center;" class="text-red">3</td>
                                            <td style="vertical-align:middle;text-align:center;">(หน่วย)</td>
                                            <td style="vertical-align:middle;text-align:center;">
                                                <button type="button" class="btn btn-yellow">ให้</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <label style="text-align:center">รายการพัสดุ (ผู้ยืมของ)</label>
                                <table class="table nomargin">
                                    <tr>
                                        <th style="vertical-align:middle;text-align:center;">ชื่อพัสดุ</th>
                                        <th colspan="2" style="vertical-align:middle;text-align:center;">จำนวน</th>
                                        <th style="vertical-align:middle;text-align:center;">หน่วย</th>
                                        <th></th>
                                    </tr>
                                    <tr id="item-notfound">
                                        <td colspan="5" style="vetical-align:middle;text-align: center">ไม่พบรายการ</td>
                                    </tr>
                                    <tbody id="user-item-list">
                                        <tr>
                                            <input id="reci_item_id" type="hidden" class="required">
                                            <td style="vertical-align:middle;text-align:center;">ไม่มีข้อมูล</td>
                                            <td style="vertical-align:middle;text-align:center;">+5</td>
                                            <td style="vertical-align:middle;text-align:center;" class="text-green">5</td>
                                            <td style="vertical-align:middle;text-align:center;">(หน่วย)</td>
                                            <td style="vertical-align:middle;text-align:center;">
                                                <button type="button" class="btn btn-green">รับ</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TABs -->
                        <ul id="sup-tab" class="nav nav-tabs">
                            <li class="active"><a href="#" data-tab="reserve">ประวัติ</a></li>
                            <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
                        </ul>
                    </div>

                    <div id="content" class="modal-body">
                        <div id="sup-info-reserve">
                            <table class="table nomargin" width="100%">
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;width:5%">วันที่</th>
                                    <th style="vertical-align:middle;text-align:center;width:10%">ชื่อพัสดุ</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">จำนวน</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">หน่วย</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">ผู้ดำเนินการ</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">ประเภท</th>
                                </tr>
                                <tr id="template-item" style="display:none;">
                                    <td id="date"         style="vertical-align:middle;text-align:center">--/--/--</td>
                                    <td id="name"         style="vertical-align:middle;text-align:center">ไม่มีข้อมูล</td>
                                    <td id="borrow_allow" style="vertical-align:middle;text-align:center">--</td>
                                    <td id="unit"         style="vertical-align:middle;text-align:center">(หน่วย)</td>
                                    <td id="action_user"  style="vertical-align:middle;text-align:center">ไม่มีข้อมูล</td>
                                    <td id="type"         style="vertical-align:middle;text-align:center">รับ-ให้</td>
                                </tr>
                                <tr id="item-notfound" style="display:none">
                                    <td colspan="7" style="vetical-align:middle;text-align:center">ไม่พบรายการประวัติ</td>
                                </tr>
                                <tbody id="items-list"></tbody>
                            </table>
                        </div>

                        <div id="sup-info-owner" class="hide">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>รหัสนิสิต <span id="student_id" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อ <span id="name" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>นามสกุล <span id="surname" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อเล่น <span id="nickname" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>รุ่น <span id="generation" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ภาควิชา <span id="department" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>เบอร์ติดต่อ <span id="phone_number" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>E-mail <span id="email" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Facebook <span id="facebook_link" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-red" style="float:left" onclick="alert('Close');">
                            <i class="fa fa-times"></i><span>ปิดรายการ</span>
                        </button>
                        <button type="button" class="btn btn-green" onclick="sendDetail();">
                            <i class="fa fa-check"></i><span>ยืนยัน</span>
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
        label.checkbox {
            padding: 0;
            margin-left: 27px;
        }
        .checkbox input + i:after{
            top:1px;
            left:2px;
        }
        tr.disabled {
            background-color: #eee;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        .status{
            display: inline-block;
            width: 120px;
            border-radius: 5px;
        }
        .status-step-1{
            color: white;
            background-color: rgb(255, 200, 20);
        }
        .status-step-2{
            color: white;
            background-color: #b6e143;
        }
        .status-step-3{
            color: white;
            background-color: #5bc0eb;
        }
        .status-step-4{
            color: white;
            background-color: #e55934;
        }
        .status-step-5{
            color: white;
            background-color: #d6d6d6;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/magic-pagination.js')}}"></script>
    <script type="text/javascript">
        var modal = $("#sup-detail");
        MagicPagi.init({
            url : '{{ url("supplies/manage") }}',
            ul : $("#page-nav .pagination"),
            min : 1,
            max : {{ $maxpage }},
            range : 2,
            mode : 'jquery',
            onclick : function(page) { loadList(page); },
        }).go({{ $page }});
        function replace(data, postCallback) {
            modal.find("*[data-default]").each(function(){ $(this).html($(this).data('default')); });
            modal.find("#sup-tab > li").removeClass('active');
            modal.find("#sup-tab > li:first-child").addClass('active');
            modal.find("div[id*='sup-info']").addClass('hide').scrollTop(0);
            modal.find("div[id*='sup-info']:first-child").removeClass('hide');
            // console.log(data);

            var infoTabs = Object.getOwnPropertyNames(data);
            for(i in infoTabs) {
                var names = Object.getOwnPropertyNames(data[infoTabs[i]]);
                for(j in names) {
                    if(infoTabs[i] == "head") {
                        modal.find("#"+infoTabs[i]+" *[id="+names[j]+"]:not(input)").html(data[infoTabs[i]][names[j]]);
                        modal.find("#"+infoTabs[i]+" input[id="+names[j]+"]").val(data[infoTabs[i]][names[j]]);
                        if(postCallback != null)
                            postCallback(names[j],modal.find("#sup-info-"+infoTabs[i]+" *[id="+names[j]+"]"),data[infoTabs[i]][names[j]]);
                    }
                    if(infoTabs[i] == "reserve") {
                        var attr = Object.getOwnPropertyNames(data[infoTabs[i]][names[j]]);
                        for(k in attr) {
                            // console.log(infoTabs[i], names[j], attr[k], data[infoTabs[i]][names[j]][attr[k]]);
                            modal.find("#sup-info-"+infoTabs[i]+" tr[id="+names[j]+"] td[id="+attr[k]+"]").html(data[infoTabs[i]][names[j]][attr[k]]);
                            modal.find("#sup-info-"+infoTabs[i]+" tr[id="+names[j]+"] input[id="+attr[k]+"]").val(data[infoTabs[i]][names[j]][attr[k]]);
                            if(postCallback != null)
                                postCallback(attr[k],modal.find("#sup-info-"+infoTabs[i]+" tr[id="+names[j]+"] *[id="+attr[k]+"]"),data[infoTabs[i]][names[j]][attr[k]]);
                        }
                    }
                    else {
                        modal.find("#sup-info-"+infoTabs[i]+" *[id="+names[j]+"]:not(input)").html(data[infoTabs[i]][names[j]]);
                        modal.find("#sup-info-"+infoTabs[i]+" input[id="+names[j]+"]").val(data[infoTabs[i]][names[j]]);
                        if(postCallback != null)
                            postCallback(names[j],modal.find("#sup-info-"+infoTabs[i]+" *[id="+names[j]+"]"),data[infoTabs[i]][names[j]]);
                    }
                }
            }
        }
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
                    $("#sup-detail").modal('toggle');
                    $("#sup-detail input[name=list_id]").val(id);
                    var items = Object.getOwnPropertyNames(response['reserve']);
                    var itemsList = $("#items-list").empty();
                    for(i in items) {
                        var template = $("#template-item").clone(true).attr('id',items[i]).css('display','');
                        template.find("#item_id").val(items[i]);
                        template.find("input").each(function() {
                            $(this).attr('name',$(this).attr('id')+'[' + i + ']');
                        });
                        template.appendTo(itemsList);
                    }
                    replace(response);
                },
                error : function(e) {
                    var response = e.responseText;
                    _toastr("Error", "top-right", "error", false);
                    return false;
                }
            });
        }
        var mydebug;
        function loadList(page) {
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/approve/list") }}/' + page,
                data: {
                  _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var contents = Object.getOwnPropertyNames(response).reverse();
                    var container = $("#contents-list").empty();
                    for(i in contents) {
                        var template = $("#template-reserve").clone().css("display","");
                        var attrs = Object.getOwnPropertyNames(response[contents[i]]);
                        template.find("#number").html(contents[i]);
                        template.find("button").attr("onclick","loadDetail(" + contents[i] + ");");
                        for(j in attrs)
                            template.find("#"+attrs[j]).html(response[contents[i]][attrs[j]]);
                        var status = template.find("#status");
                        template.find("#status").addClass("status");
                        switch(status.html()) {
                            case "รออนุมัติ":
                                template.find("#status").addClass("status-step-1");
                                break;
                            case "อนุมัติ":
                                template.find("#status").addClass("status-step-2");
                                break;
                            case "กำลังดำเนินการ":
                                template.find("#status").addClass("status-step-3");
                                break;
                            case "เกินกำหนดคืน":
                                template.find("#status").addClass("status-step-4");
                                break;
                            case "ปิดรายการ":
                                template.find("#status").addClass("status-step-5");
                                break;
                        }
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
        function disAll() {
            $("#sup-detail label[class=checkbox] i").trigger("click");
        }
        function sendDetail() {
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/approve/approve")}}',
                data: (new FormData($("#sup-detail #container")[0])),
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    _toastr("ยืนยันสำเร็จ", "top-right", "success", false);
                    $("#sup-detail").modal('toggle');
                },
                error : function(e) {
                    _toastr("กรุณาติดต่อผู้ดูแลระบบ", "top-right", "success", false);
                }
              });
        }
        $("#sup-detail").find("#sup-tab a[data-tab]").click(function(e) {
            e.preventDefault();
            $("#sup-detail #sup-tab > li").removeClass('active');
            $(this.parentElement).addClass('active');
            $("#sup-detail div[id*='sup-info-']").addClass('hide').scrollTop(0);
            $("#sup-detail #sup-info-"+$(this).data('tab')).removeClass('hide');
        });
        loadList({{ $page }});
    </script>
@endsection
