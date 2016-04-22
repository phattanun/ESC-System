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
                    <input type="hidden" name="actor_id" value="{{ $user['student_id'] }}">
                    <input id="list_id" type="hidden" name="list_id">

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
                            <div id="sup-info-reserve">
                                <label style="text-align:center">รายการพัสดุ</label>
                                <table class="table">
                                    <tr>
                                        <th style="vertical-align:middle;text-align:center;width:20%">ชื่อพัสดุ</th>
                                        <th style="vertical-align:middle;text-align:center;">จำนวนคงเหลือ</th>
                                        <th style="vertical-align:middle;text-align:center;">จำนวนให้ยืม</th>
                                        <th style="vertical-align:middle;text-align:center;">หน่วย</th>
                                        <th colspan="3" style="vertical-align:middle;text-align:center;width:30%">จำนวนเปลี่ยนแปลง</th>
                                    </tr>
                                    <tr id="template-item" style="display:none;">
                                        <input id="item_id" type="hidden" class="required">
                                        <td id="name"   style="vertical-align:middle;text-align:center;">ไม่มีข้อมูล</td>
                                        <td id="remain" style="vertical-align:middle;text-align:center;">-</td>
                                        <td id="give"   style="vertical-align:middle;text-align:center;">-</td>
                                        <td id="unit"   style="vertical-align:middle;text-align:center;">(หน่วย)</td>
                                        <td style="vertical-align:middle;text-align:center;">
                                            <div class="radio">
                                                <button id="receiving" class="btn btn-green deactivated">รับ</button>
                                                <input id="type" type="radio" value="0" style="display:none;"></input>
                                            </div>
                                        </td>
                                        <td style="vertical-align:middle;text-align:center;">
                                            <div class="stepper-wrap">
                                                <input id="amount" type="number" class="form-control required" style="margin: 0px;" value="0">
                                                <div class="stepper-btn-wrap">
                                                    <a class="stepper-btn-up">▴</a>
                                                    <a class="stepper-btn-dwn">▾</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="vertical-align:middle;text-align:center;">
                                            <div class="radio">
                                                <button id="giving" class="btn btn-yellow deactivated">ให้</button>
                                                <input id="type" type="radio" value="1" style="display:none;"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="item-notfound" style="display:none;">
                                        <td colspan="7" style="vetical-align:middle;text-align: center">ไม่พบรายการ</td>
                                    </tr>
                                    <tbody id="items-list"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TABs -->
                        <ul id="sup-tab" class="nav nav-tabs">
                            <li class="active"><a href="#" data-tab="transaction">ประวัติ</a></li>
                            <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
                        </ul>
                    </div>

                    <div id="content" class="modal-body">
                        <div id="sup-info-transaction">
                            <table class="table nomargin" width="100%">
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;width:5%">วันที่</th>
                                    <th style="vertical-align:middle;text-align:center;width:10%">ชื่อพัสดุ</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">จำนวน</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">หน่วย</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">ผู้ดำเนินการ</th>
                                    <th style="vertical-align:middle;text-align:center;width:5%">ประเภท</th>
                                </tr>
                                <tr id="template-transaction" style="display:none;">
                                    <td id="date"         style="vertical-align:middle;text-align:center">--/--/--</td>
                                    <td id="name"         style="vertical-align:middle;text-align:center">ไม่มีข้อมูล</td>
                                    <td id="amount"       style="vertical-align:middle;text-align:center">--</td>
                                    <td id="unit"         style="vertical-align:middle;text-align:center">(หน่วย)</td>
                                    <td id="staff"  style="vertical-align:middle;text-align:center">ไม่มีข้อมูล</td>
                                    <td style="vertical-align:middle;text-align:center">
                                        <span id="type" class='status' style='width:60px;'>รับ-ให้</span>
                                    </td>
                                </tr>
                                <tr id="transaction-notfound" style="display:none">
                                    <td colspan="7" style="vetical-align:middle;text-align:center">ไม่มีรายการประวัติ</td>
                                </tr>
                                <tbody id="transaction-list"></tbody>
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
                            <i class="fa fa-check"></i><span>บันทึก</span>
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
        .status-give {
            color: black;
            background-color: #ECD078;
        }
        .status-receive {
            color: white;
            background-color: #59BA41;
        }

        button.deactivated {
            color: black !important;
            background-color: #ddd;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/magic-pagination.js')}}"></script>
    <script type="text/javascript">
        var modal = $("#sup-detail"), page = {{ $page }};
        MagicPagi.init({
            url : '{{ url("supplies/manage") }}',
            ul : $("#page-nav .pagination"),
            min : 1,
            max : {{ $maxpage }},
            range : 2,
            mode : 'jquery',
            onclick : function(page) { loadList(page); },
        }).go(page);
        function replace(data, postCallback) {
            modal.find("*[data-default]").each(function(){ $(this).html($(this).data('default')); });
            modal.find("#sup-tab > li").removeClass('active');
            modal.find("#sup-tab > li:first-child").addClass('active');
            modal.find("div[id*='sup-info']").addClass('hide').scrollTop(0);
            modal.find("div[id*='sup-info']:first-child").removeClass('hide');

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
                    if(infoTabs[i] == "reserve" || infoTabs[i] == "transaction") {
                        var attr = Object.getOwnPropertyNames(data[infoTabs[i]][names[j]]);
                        for(k in attr) {
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
        var modalData;
        var itemsList, transactionList;
        function isInt(n) {
            if(isNaN(n))
                return true;
            return n % 1 === 0;
        }
        function fixFloatNumber(n) {
            if(!isInt(parseFloat(n)))
                return n = parseFloat(n).toFixed(2);
            return n;
        }
        function loadDetail(id) {
            $("#sup-detail").find("#list_id").val(id);
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/approve/modal") }}',
                data: {
                  _token: '{{ csrf_token() }}',
                  id: id
                },
                success: function(response) {
                    modalData = response;
                    $("#sup-detail").modal('toggle');
                    $("#sup-detail input[name=list_id]").val(id);
                    itemsList = response['reserve'];
                    var container = $("#sup-info-reserve");
                    var itemsListE = container.find("#items-list").empty();
                    if(response['reserve'] != undefined) {
                        var items = Object.getOwnPropertyNames(response['reserve']);
                        for(i in items) {
                            var template = container.find("#template-item").clone(true).attr('id',items[i]).css('display','');
                            template.find("#item_id").val(items[i]);
                            template.find("input").each(function() {
                                $(this).attr('name',$(this).attr('id')+'[' + i + ']');
                            });
                            template.find(".radio").each(function() {
                                var radio = $(this).find("input[type=radio]");
                                $(this).find("button").click(function(event) {
                                    event.preventDefault();
                                    radio.prop('checked', true);
                                });
                            });
                            template.appendTo(itemsListE);

                            itemsList[items[i]]['remain'] = (itemsList[items[i]]['borrow_allow'] != null ? itemsList[items[i]]['borrow_allow']: itemsList[items[i]]['borrow_request']);
                            itemsList[items[i]]['give'] = 0;
                        }
                        container.find("#item-notfound").hide();
                    }
                    else container.find("#item-notfound").show();
                    $.ajax({
                        type: "POST",
                        url: '{{ url("/supplies/manage/getTransaction") }}',
                        data: {
                          _token: '{{ csrf_token() }}',
                          id: id
                        },
                        success: function(response) {
                            var container = $("#sup-info-transaction");
                            var transactionListE = container.find("#transaction-list").empty();
                            transactionList = response;
                            if(response.length !== 0) {
                                var transaction = Object.getOwnPropertyNames(response);
                                for(i in transaction) {
                                    var template = container.find("#template-transaction").clone(true).attr('id',transaction[i]).css('display','');
                                    template.appendTo(transactionListE);
                                    transactionList[transaction[i]]['name'] = itemsList[transactionList[transaction[i]]['item_id']]['name'];
                                    transactionList[transaction[i]]['unit'] = itemsList[transactionList[transaction[i]]['item_id']]['unit'];
                                    if(transactionList[transaction[i]]['type'] == 1) { // Give
                                        itemsList[transactionList[transaction[i]]['item_id']]['remain'] -= transactionList[transaction[i]]['amount'];
                                        itemsList[transactionList[transaction[i]]['item_id']]['give']   += transactionList[transaction[i]]['amount'];
                                    }
                                    else { // Receive
                                        itemsList[transactionList[transaction[i]]['item_id']]['remain'] += transactionList[transaction[i]]['amount'];
                                        itemsList[transactionList[transaction[i]]['item_id']]['give']   -= transactionList[transaction[i]]['amount'];
                                    }
                                    itemsList[transactionList[transaction[i]]['item_id']]['remain'] = fixFloatNumber(itemsList[transactionList[transaction[i]]['item_id']]['remain']);
                                    itemsList[transactionList[transaction[i]]['item_id']]['give']   = fixFloatNumber(itemsList[transactionList[transaction[i]]['item_id']]['give']);
                                }
                                container.find("#transaction-notfound").hide();
                            }
                            else container.find("#transaction-notfound").show();
                            modalData['transaction'] = transactionList;

                            $("#sup-info-reserve").find("#items-list").find("tr").each(function() {
                                var id = $(this).attr('id');
                                $(this).find("#amount").data({
                                    'min': 0,
                                    'max': 0,
                                    'max-give': itemsList[id]['remain'],
                                    'max-receive': itemsList[id]['give']
                                }).val(0);
                            });

                            replace(modalData, function(name, element, data) {
                                switch(name) {
                                    case "facebook_link":
                                        if(data!="")
                                            element.html("<a href='https://"+data+"'><u>Link</u></a>");
                                        else
                                            element.html("ไม่มีข้อมูล");
                                        break;
                                    case "remain":
                                    case "give":
                                        element.data({
                                            'original': parseFloat(data),
                                            'current': parseFloat(data)
                                        });
                                        break;
                                    case "type":
                                        switch(data) {
                                            case 1:
                                                data = "ให้";
                                                element.addClass('status-give');
                                            break;
                                            case 0:
                                                data = "รับ";
                                                element.addClass('status-receive');
                                            break;
                                        }
                                        element.html(data);
                                        break;
                                }
                            });
                            $("#sup-info-reserve").find("#items-list").find("tr").each(function() {
                                var stepper = $(this).find(".stepper-wrap"),
                                    input = stepper.find("#amount"),
                                    up = stepper.find(".stepper-btn-up"),
                                    down = stepper.find(".stepper-btn-dwn"),
                                    remain = $(this).find("#remain"),
                                    give = $(this).find("#give"),
                                    giveButton = $(this).find("button[id=giving]"),
                                    giveRadio = giveButton.next(),
                                    receiveButton = $(this).find("button[id=receiving]"),
                                    receiveRadio = receiveButton.next();
                                function highlight(element) {
                                    element.data('current',fixFloatNumber(element.data('current')));
                                    element.removeClass();
                                    element.html(element.data('current'));
                                    if(element.data('current') < element.data('original'))
                                        element.addClass("text-red");
                                    else if(element.data('current') > element.data('original'))
                                        element.addClass("text-green");
                                }
                                up.click(function() {
                                    if(input.val() == "NaN")
                                        input.val(0);
                                    input.val(Math.min(parseFloat(input.val()) + 1,input.data('max')));
                                    input.trigger('input');
                                });
                                down.click(function() {
                                    if(input.val() == "NaN")
                                        input.val(0);
                                    input.val(Math.max(parseFloat(input.val()) - 1,input.data('min')));
                                    input.trigger('input');
                                });
                                input.on('input',function() {
                                    var min = $(this).data('min'), max = $(this).data('max');
                                    if(input.val() < min || input.val() > max)
                                        input.val(Math.max(Math.min(input.val(),max),min));
                                    input.val(fixFloatNumber(input.val()));
                                    var val = parseFloat(input.val());
                                    switch(input.data('mode')) {
                                        case "give":
                                            remain.data('current',remain.data('original') - val);
                                            give.data('current',give.data('original') + val);
                                            break;
                                        case "receive":
                                            remain.data('current',remain.data('original') + val);
                                            give.data('current',give.data('original') - val);
                                            break;
                                        case "none":
                                            remain.data('current',remain.data('original'));
                                            give.data('current',give.data('original'));
                                            break;
                                    }
                                    highlight(remain);
                                    highlight(give);
                                }).data('mode','none');
                                giveButton.click(function() {
                                    if(giveButton.hasClass("deactivated")) {
                                        giveButton.removeClass("deactivated");
                                        receiveButton.addClass("deactivated");
                                        input.data({
                                            'max': input.data('max-give'),
                                            'mode': 'give'
                                        });
                                        input.trigger('input');
                                    }
                                    else {
                                        giveRadio.prop('checked',false);
                                        giveButton.addClass("deactivated");
                                        input.data({
                                            'max': 0,
                                            'mode': 'none'
                                        });
                                        input.trigger('input');
                                    }
                                });
                                receiveButton.click(function() {
                                    if(receiveButton.hasClass("deactivated")) {
                                        receiveButton.removeClass("deactivated");
                                        giveButton.addClass("deactivated");
                                        input.data({
                                            'max': input.data('max-receive'),
                                            'mode': 'receive'
                                        });
                                        input.trigger('input');
                                    }
                                    else {
                                        receiveRadio.prop('checked',false);
                                        receiveButton.addClass("deactivated");
                                        input.data({
                                            'max': 0,
                                            'mode': 'none'
                                        });
                                        input.trigger('input');
                                    }
                                });
                            });
                        },
                        error : function(e) {
                            var response = e.responseText;
                            _toastr("Error", "top-right", "ระบบมีปัญหา กรุณาติดต่อผู้ดูแลระบบ", false);
                            return false;
                        }
                    });
                },
                error : function(e) {
                    var response = e.responseText;
                    _toastr("Error", "top-right", "ระบบมีปัญหา กรุณาติดต่อผู้ดูแลระบบ", false);
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
            var hasTransaction = 0;
            $("#sup-detail").find("#items-list").find("tr").each(function() {
                var radio = $(this).find("input[type=radio]"), checked = false;
                radio.each(function() { checked = checked || $(this).prop('checked'); });
                if($(this).find("#amount").val() == 0)
                    checked = false;

                hasTransaction += checked;
                $(this).find("input").prop('disabled', !checked);
            });
            if(hasTransaction == 0) {
                _toastr("ไม่มีการเปลี่ยนแปลงข้อมูล", "top-right", "warning", false);
                $("#sup-detail").modal('toggle');
                return;
            }
            $.ajax({
                type: "POST",
                url: '{{ url("/supplies/manage/addTransaction")}}',
                data: (new FormData($("#sup-detail #container")[0])),
                processData: false,
                contentType: false,
                success: function(response) {
                    _toastr("บันทึกสำเร็จ", "top-right", "success", false);
                    $("#sup-detail").modal('toggle');
                    loadList(page);
                },
                error : function(e) {
                    _toastr("กรุณาติดต่อผู้ดูแลระบบ", "top-right", "error", false);
                }
              });
        }
        $("#sup-detail").find("#sup-tab a[data-tab]").click(function(e) {
            e.preventDefault();
            $("#sup-detail #sup-tab > li").removeClass('active');
            $(this.parentElement).addClass('active');
            $("#sup-detail #content div[id*='sup-info-']").addClass('hide').scrollTop(0);
            $("#sup-detail #content #sup-info-"+$(this).data('tab')).removeClass('hide');
        });
        loadList(page);
    </script>
@endsection
