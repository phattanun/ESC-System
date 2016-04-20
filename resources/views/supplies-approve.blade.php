@extends('masterpage')

@section('title')
    อนุมัติการยืมพัสดุ
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
                        <table class="table nomargin" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center;width:8%">ลำดับ</th>
                                <th style="vertical-align:middle;text-align: center;width:25%">กิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">หน่วยงาน</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">ผู้ขอยืม</th>
                                <th style="vertical-align:middle;text-align: center;width:10%">วันที่</th>
                                <th style="vertical-align:middle;text-align: center;width:15%">สถานะ</th>
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
                            <i class="fa fa-list-alt"></i> รายละเอียดการจอง</h4>
                            <br>
                            <div class="col-sm-4">
                                <label>กิจกรรม <span id="activity" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                            </div>
                            <div class="col-sm-4">
                                <label>หน่วยงาน <span id="division" class="text-blue" data-default="ไม่มีข้อมูล"></span></label>
                            </div>
                            <div class="col-sm-12" style="margin-bottom:10px;">
                                <label>เหตุผล</label><span>&emsp;</span><span id="reason" class="text-blue" data-default="ไม่มีข้อมูล"></span>
                            </div>

                        <!-- TABs -->
                        <ul id="sup-tab" class="nav nav-tabs">
                            <li class="active"><a href="#" data-tab="reserve">ใบจอง</a></li>
                            <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
                        </ul>
                    </div>

                    <div id="content" class="modal-body">

                        <div id="sup-info-reserve">
                            <table class="table nomargin" width="100%">
                                <tr>
                                    <th style="vertical-align:middle;text-align: center;width:15%">ชื่อพัสดุ</th>
                                    <th colspan="2" style="vertical-align:middle;text-align: center;width:15%">จำนวน</th>
                                    <th style="vertical-align:middle;text-align: center;width:5%">หน่วย</th>
                                    <th style="vertical-align:middle;text-align: center;width:5%">ไม่อนุมัติ</th>
                                    <th style="vertical-align:middle;text-align: center;width:10%">หมายเหตุ</th>
                                </tr>
                                <tr id="template-item" style="display:none;">
                                    <input id="item_id" type="hidden" class="required">
                                    <td id="name"   style="vertical-align:middle;text-align: center">ไม่มีรายละเอียด</td>
                                    <td  style="vertical-align:middle;text-align: center">
                                        <div class="stepper-wrap">
                                            <input id="borrow_allow" type="number" class="form-control required" style="margin: 0px;">
                                            <div class="stepper-btn-wrap">
                                                <a class="stepper-btn-up">▴</a>
                                                <a class="stepper-btn-dwn">▾</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="borrow_request"   style="vertical-align:middle;text-align: center">--</td>
                                    <td id="unit"   style="vertical-align:middle;text-align: center">(หน่วย)</td>
                                    <td style="vertical-align:middle;text-align: center">
                                        <label class="checkbox">
                                            <input id='disapprove' type="hidden"   value="false">
                                            <input id="disapprove" type="checkbox" value="false">
                                            <i style="position:initial"></i>
                                        </label>
                                    </td>
                                    <td id="reason" style="vertical-align:middle;text-align: center">
                                        <input id="reason" type="text">
                                    </td>
                                </tr>
                                <tr id="item-notfound" style="display:none">
                                    <td colspan="7" style="vetical-align:middle;text-align: center">ไม่พบรายการจอง</td>
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
                        <button type="button" class="btn btn-green" onclick="sendDetail();">
                            <i class="fa fa-check"></i><span>ยืนยัน</span>
                        </button>
                        <button type="button" class="btn btn-red" onclick="disAll();">
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
            url : '{{ url("supplies/approve")}}',
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
                        template.find("label[class=checkbox]").each(function () {
                            var row = $(this.parentElement.parentElement),
                                borrow = row.find("input[id=borrow_allow]"),
                                input = $(this).find("input[type=checkbox]"),
                                inputHidden = $(this).find("input[type=hidden]"),
                                i = $(this).find("i");
                            borrow.data('min',0);
                            i.click(function() {
                                var value = !JSON.parse(input.val());
                                inputHidden.disabled = !value;
                                input.val(value);
                                borrow.prop("disabled", value);
                                row.toggleClass("disabled", value);
                                if(value) {
                                    borrow.data('cur',borrow.val());
                                    borrow.val(0);
                                }
                                else {
                                    borrow.val(borrow.data('cur'));
                                }
                            });
                        });
                        template.appendTo(itemsList);
                    }
                    itemsList.find(".stepper-wrap").each(function() {
                        var input = $(this).find("input"),
                            up = $(this).find(".stepper-btn-up"),
                            down = $(this).find(".stepper-btn-dwn");
                        up.click(function() {
                            input.val(Math.min(parseInt(input.val()) + 1,input.data('max')));
                        });
                        down.click(function() {
                            input.val(Math.max(parseInt(input.val()) - 1,input.data('min')));
                        });
                    });

                    replace(response, function(name, element, data) {
                        switch(name) {
                            case "borrow_request":
                                element.html("จาก " + data);
                                $(element[0].parentElement).find("#borrow_allow").data('max',data);
                                break;
                            case "borrow_allow":
                                if(data==null)
                                    element.val(element.data('max'));
                                break;
                        }
                    });
                },
                error : function(e) {
                    var response = e.responseText;
                    _toastr("Error", "top-right", "error", false);
                    return false;
                }
            });
        }
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
