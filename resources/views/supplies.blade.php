@extends('masterpage')

@section('title')
    ยืม/ค้นหาพัสดุ
@endsection
@section('body-attribute')
@endsection
@section('suppliesNavToggle')
    active
@endsection
@section('bodyTitle')
    พัสดุ
@endsection
@section('content')
    <button class="hidden" id="submitCartButton" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalCartSuccess">ส่งเรื่องยืม</button>

    <div id="modalCart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {{--<form id="cart-form" class="validate" novalidate="novalidate" action="{{url().'/supplies/send_cart'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="ส่งเรื่องยืมสำเร็จ!<script>submitCartButton();</script>" data-toastr-position="top-right">--}}
        <form id="cart-form" class="validate" novalidate="novalidate" action="{{url().'/supplies/send_cart'}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">รายการพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-cart">
                            <thead>
                            <tr>
                                <th class="width-10 remove-button-col" style="width: 10px !important;"></th>
                                <th class="width-10 text-center table-cart-top">ลำดับ</th>
                                <th class="width-200 table-cart-top">รายการ</th>
                                <th class="width-50 table-cart-top">จำนวน</th>
                            </tr>
                            </thead>
                            <tbody class="cart-item-table-body">
                            <!--tr id="cart-item-id-2" class="cart-item cart-item-order-1">
                                <input type="hidden" id="cart-item-input-id-2" name="cart[2][id]" value="2" />
                                <td class="text-center remove-button-col">
                                    <a id="cart-remove-button-1" onclick="removeCartItem(1)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td id="cart-item-order-number-1" class="text-center">1</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-2"  name="cart[2][amount]" type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr>
                            <tr id="cart-item-id-1" class="cart-item cart-item-order-2">
                                <input type="hidden" id="cart-item-input-id-1" name="cart[1][id]" value="1" />
                                <td class="text-center remove-button-col">
                                    <a id="cart-remove-button-2" onclick="removeCartItem(2)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td id="cart-item-order-number-2" class="text-center">2</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-1"  name="cart[1][amount]"  type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr>
                            <tr id="cart-item-id-3" class="cart-item cart-item-order-3">
                                <input type="hidden" id="cart-item-input-id-3" name="cart[3][id]" value="3" />
                                <td class="text-center remove-button-col">
                                    <a id="cart-remove-button-3" onclick="removeCartItem(3)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td id="cart-item-order-number-3" class="text-center">3</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร เนื้อดีเป็นพิเศษ เหมาะสำหรับการทำเสลี่ยงให้กลุ่มตัวแทนนิสิตแห่งจุฬาลงกรณ์มหาวิทยาลัย</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-3"  name="cart[3][amount]"  type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr-->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row no-mergin">
                        <div class="col-md-6">
                            <label>วันที่ยืม</label>
                            <input id="cart-start-date" name="startDate" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false" required>
                        </div>
                        <div class="col-md-6">
                            <label>วันที่คืน</label>
                            <input id="cart-end-date" name="endDate" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false" required>
                        </div>
                    </div>

                    <label class="margin-top-20">โครงการ</label>
                    <div id="inListActivity">
                        <select id="cart-activity" name="activity" class="form-control select2 required">
                            <option selected="selected" value="0">โครงการ / กิจกรรมที่ต้องการ</option>
                            <!--option value="1">งานชั้นปี</option>
                            <option value="2">ค่ายลานเกียร์</option>
                            <option value="3">ConneK 7</option>
                            <option value="4">FE Camp</option>
                            <option value="5">ฟันเฟือง</option-->
                            @foreach($activity as $act)
                                <option value="{{$act['act_id']}}">{{$act['name']}}</option>
                            @endforeach
                        </select>
                        <div class="pull-right">
                            <a class="underline-hover" onclick="otherActivity()">ไม่มีโครงการ/กิจกรรมที่คุณต้องการอยู่ในระบบ?</a>
                        </div>
                    </div>
                    <div id="otherActivity" class="hidden">
                        <div>
                            <input required id="cart-otherActivity" name="otherActivity" type="text" class="form-control"
                                   placeholder="ระบุโครงการ / กิจกรรมของคุณ">
                        </div>
                        <div class="pull-right" onclick="backToActicityList()">
                            <a id="back-to-activity" class="underline-hover">กลับไปยังลิสต์รายการเดิม</a>
                        </div>
                    </div>
                    <input required id="cart-otherActivity-flag" name="otherActivityFlag" type="hidden" class="form-control" value="false">

                    <label class="margin-top-20">หน่วยงาน</label>
                    <div id="inListDivision">
                        <select id="cart-division" name="division" class="form-control select2 required">
                            <option selected="selected" value="0">หน่วยงาน</option>
                            <!--option value="1">รุ่น</option>
                            <option value="2">กรุ๊ป</option>
                            <option value="3">ภาควิชา</option-->
                            @foreach($division as $div)
                                <option value="{{$div['div_id']}}">{{$div['name']}}</option>
                            @endforeach
                        </select>
                        <div class="text-right">
                            <a class="underline-hover" onclick="otherDivision()">ไม่มีหน่วยงานที่คุณต้องการอยู่ในระบบ?</a>
                        </div>
                    </div>
                    <div id="otherDivision" class="hidden">
                        <div>
                            <input required id="cart-otherDivision" name="otherDivision" type="text" class="form-control"
                                   placeholder="ระบุหน่วยงานของคุณ">
                        </div>
                        <div class="text-right">
                            <a class="underline-hover" onclick="backToDivisionList()">กลับไปยังลิสต์รายการเดิม</a>
                        </div>
                    </div>
                    <input required id="cart-otherDivision-flag" name="otherDivisionFlag" type="hidden" class="form-control" value="false">

                    <div class="row">
                        <div class="col-md-3 col-xs-6"  style="margin-top: 5px;">
                            <label>รายละเอียด</label>
                        </div>
                        <div class="col-md-12 col-sm-10 col-xs-12">
                            <textarea id="cart-detail" name="detail" rows="4" class="form-control required" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">กลับไปเลือกเพิ่ม</button>
                    <button type="button" class="btn btn-primary" onclick="submitCartButton()">ส่งเรื่องยืม</button>
                </div>

            </div>
        </div>
        </form>
    </div>

    <div id="modalCartSuccess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ยื่นเรื่องเรียบร้อย</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>โครงการ</b></label>
                        </div>
                        <div id="cart-success-activity" class="col-md-10 col-sm-9 col-xs-9">
                            งานชั้นปี
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>หน่วยงาน</b></label>
                        </div>
                        <div id="cart-success-division" class="col-md-10 col-sm-9 col-xs-9">
                            รุ่น 97
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>วันที่ยืม</b></label>
                        </div>
                        <div id="cart-success-startDate" class="col-md-10 col-sm-9 col-xs-9">
                            05-04-2016
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>วันที่คืน</b></label>
                        </div>
                        <div id="cart-success-endDate" class="col-md-10 col-sm-9 col-xs-9">
                            07-04-2016
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                        <div class="col-md-3 col-xs-6">
                            <label><b>รายละเอียด</b></label>
                        </div>
                        <div id="cart-success-detail" class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 5px;">
                            ยืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปี
                            ยืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปี
                            ยืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปี
                            ยืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปียืมเพื่อไปใช้ในงานชั้นปี
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="width-10 text-center">ลำดับ</th>
                                <th class="width-200">รายการ</th>
                                <th class="width-50">จำนวน</th>
                            </tr>
                            </thead>
                            <tbody id="cart-success-table-body">
                            <tr class="cart-success-item">
                                <td class="text-center">1</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                            </tr>
                            <tr class="cart-success-item">
                                <td class="text-center">2</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                            </tr>
                            <tr class="cart-success-item">
                                <td class="text-center">3</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร เนื้อดีเป็นพิเศษ เหมาะสำหรับการทำเสลี่ยงให้กลุ่มตัวแทนนิสิตแห่งจุฬาลงกรณ์มหาวิทยาลัย</td>
                                <td>10 อัน</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="finishCart()">เสร็จสิ้น</button>
                </div>

            </div>
        </div>
    </div>

    <div id="modalItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> ข้อมูลพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">
                            <label><b>รหัสพัสดุ</b></label>
                        </div>
                        <div id="item-id" class="col-sm-9 col-xs-8">
                            ESC-0001
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div id="item-name" class="col-sm-9">
                            ดินสอแสนน่ารัก
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div id="item-type" class="col-sm-9">
                            ใช้แล้วหมดไป
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>จำนวนทั้งหมด</b></label>
                        </div>
                        <div id="item-total_qty" class="col-sm-9">
                            300
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>จำนวนที่เสีย</b></label>
                        </div>
                        <div id="item-broken_qty" class="col-sm-9">
                            26
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div id="item-unit" class="col-sm-9">
                            แท่ง
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-3">
                            <label><b>ราคาที่ซื้อ</b></label>
                        </div>
                        <div id="item-price_per_unit" class="col-sm-9">
                            20.00 บาท
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div id="item-store" class="col-sm-9">
                            จีฉ่อย
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>ข้อมูลติดต่อ</b></label>
                        </div>
                        <div id="item-store-address" class="col-sm-9">
                            32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111 32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-3">
                            <label><b>เบอร์โทรศัพท์</b></label>
                        </div>
                        <div id="item-store-tel" class="col-sm-9">
                            085-111-1111
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <div class="row no-margin" style="width: 90%; display: inline-block; text-align:center; margin-bottom: 15px;">
                        <input id="modal-item-input-amount" type="text" value="" min="0" class="form-control stepper required" style="display: inline-block !important; width: 100%;">
                        <label id="modal-item-input-mount-unit" style="display: inline-block !important; width: 20%;">เครื่อง</label>
                    </div>
                    <div class="row no-margin">
                        <a class="btn btn-3d btn-reveal btn-default" data-dismiss="modal" style="width: 90px;">
                            <i class="fa fa-times"></i>
                            <span>ยกเลิก</span>
                        </a>
                        <a id="modal-item-addToCart" class="btn btn-3d btn-primary" data-dismiss="modal" onclick="modalItemAddToCart(1)" style="width: 110px;">
                            <i class="fa fa-cart-plus"></i>
                            <span>Add to Cart</span>
                        </a>
                    </div>
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>--}}
                    {{--<button type="button" class="btn btn-primary" data-dismiss="modal">ยืนยัน</button>--}}
                </div>

            </div>
        </div>
    </div>

    <div id="modalItemEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> แก้ไขข้อมูลพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">
                            <label><b>รหัสพัสดุ</b></label>
                        </div>
                        <div id="edit-item-id" class="col-sm-9 col-xs-8">
                            ESC-0001
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-name" type="text" name="" value="" class="form-control required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div class="col-md-9">
                            <select id="edit-item-type" name="project" class="form-control select2 required">
                                <option id="edit-item-type-0" class="edit-item-type-all" selected="selected" value="0">ประเภทพัสดุ</option>
                                <option id="edit-item-type-1" class="edit-item-type-all" value="ใช้แล้วหมดไป">ใช้แล้วหมดไป</option>
                                <option id="edit-item-type-2" class="edit-item-type-all" value="ใช้แล้วต้องนำมาคืน">ใช้แล้วต้องนำมาคืน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนทั้งหมด</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-total_qty" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนที่เสีย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-broken_qty" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-unit" type="text" name="" value="" class="form-control required" placeholder="ลักษณนาม">
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคาที่ซื้อ (ต่อหน่วย)</b></label>
                        </div>
                        <div class="col-md-9">
                            {{--<input id="edit-item-price_per_unit" type="text" class="form-control masked" data-format="999,999.99" data-placeholder="X" placeholder="ราคาที่ซื้อ">--}}
                            <input id="edit-item-price_per_unit" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            <select id="edit-item-store" name="project" class="form-control select2 required" id="project-selection">
                                <option id="edit-item-store-0" class="edit-item-store-all" selected="selected" value="0">สถานที่ซื้อ</option>
                                <option id="edit-item-store-1" class="edit-item-store-all" value="1">จีฉ่อย</option>
                                <option id="edit-item-store-2" class="edit-item-store-all" value="2">ช.การช่าง</option>
                                <option id="edit-item-store-3" class="edit-item-store-all" value="3">ค.เครื่องเขียน</option>
                                <option id="edit-item-store-4" class="edit-item-store-all" value="4">สมใจ</option>
                                <option id="edit-item-store-5" class="edit-item-store-all" value="5">จามจุรีสแควร์</option>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center" style="margin-top: 15px;">
                        <a id="addShop" class="btn btn-3d btn-reveal btn-green" href="/addStore">
                            <i class="fa fa-plus"></i>
                            <span>เพิ่มร้านค้า</span>
                        </a>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal" style="width: 90px;">
                        <i class="fa fa-times"></i>
                        <span>ยกเลิก</span>
                    </a>
                    <a id="edit-item-confirm-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal" style="width: 90px;" onclick="confirmEditItem(1)">
                        <i class="fa fa-check"></i>
                        <span>ยืนยัน</span>
                    </a>
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>--}}
                    {{--<button type="button" class="btn btn-primary" data-dismiss="modal">ยืนยัน</button>--}}
                </div>

            </div>
        </div>
    </div>

    <div id="modalRemoveItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">ต้องการลบพัสดุนี้ใช่หรือไม่ ?</h4>
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div class="row text-center">
                        <a id="item-confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">
                            <i class="fa fa-check"></i>
                            <span>ใช่</span>
                        </a>
                        <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            <span>ไม่ใช่</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section>
        <div class="container">

            <div class="cart-button hidden"  data-toggle="modal" data-target="#modalCart" style="position: fixed; top: 85px; right: 8%; z-index: 1000;">
                <span class="cart-button-badge badge btn-xs" style="top: -40px !important; right: -50px !important; position: relative !important; color: #fff !important; z-index:1010; background-color: #5cb85c;">0</span>
                <a class="social-icon social-icon-round social-icon-light cart" data-toggle="tooltip" data-placement="top" title="รายการยืม">
                    <i class="fa fa-shopping-cart"></i>
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>

            <div class="row">

                <!-- RIGHT -->
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- LIST OPTIONS -->
                    <div class="clearfix margin-bottom-20">

                        <ul class="pagination nomargin pull-right">
                            <!--li><a>«</a></li>
                            <li class="page-1 active" onclick="changePageTo(1)"><a>1</a></li>
                            <li class="page-2" onclick="changePageTo(2)"><a>2</a></li>
                            <li class="page-3" onclick="changePageTo(3)"><a>3</a></li>
                            <li class="page-4" onclick="changePageTo(4)"><a>4</a></li>
                            <li><a>»</a></li-->
                        </ul>

                        <div class="options-left col-lg-5 col-md-5 col-sm-5">
                            <div class="input-group autosuggest" data-minLength="1">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="searchInventory" name="searchInventory" class="form-control typeahead" placeholder="กรอกรหัส/ชื่อพัสดุ" type="text" onchange="changePageTo(1)">
                                    <span class="input-group-btn" id="add-new-permission-btn" onclick="changePageTo(1)">
                                        <a class="btn btn-success">ค้นหา</a>
                                    </span>
                            </div>
                        </div>

                    </div>
                    <!-- /LIST OPTIONS -->

                    <ul class="shop-item-list row list-inline nomargin">

                        {{--@foreach($inventory as $inven)
                            <li class="col-lg-3 col-sm-3 each-item">

                                <div class="shop-item">

                                    <div class="thumbnail" >
                                        <!-- product image(s) -->
                                        <a class="shop-item-image" data-toggle="modal" data-target="#modalItem" onclick="openModalItem({{$inven['inv_id']}})">
                                            <!--img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image">
                                            <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image"-->
                                            <div style="width:100%; height:100%; background-image: url({{$inventory['image']}})"></div>
                                            <img class="img-responsive" src="{{$inven['image']}}" alt="shop hover image" style="width: 100%;">
                                        </a>
                                        <!-- /product image(s) -->

                                        <!-- hover buttons -->
                                        <div class="shop-option-over" style="opacity: 1 !important;"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                            <a data-original-title="แก้ไขพัสดุนี้" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="openModalItemEdit({{$inven['inv_id']}})"><i class="fa fa-edit nopadding"></i></a>
                                            <a data-original-title="ลบพัสดุนี้" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-trash nopadding"></i></a>
                                        </div>
                                        <!-- /hover buttons -->

                                        <!-- product more info -->
                                        <div class="shop-item-info">
                                            <!--span class="label label-success">NEW</span>
                                            <span class="label label-danger">SALE</span-->
                                        </div>
                                        <!-- /product more info -->
                                    </div>

                                    <div class="shop-item-summary text-center">
                                        <h2>{{$inven['name']}}</h2>

                                        <!-- rating -->
                                        <!--div class="shop-item-rating-line">
                                            <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --><!--/div>
                                        </div>
                                        <!-- /rating -->

                                        <!-- price -->
                                        <!--div class="shop-item-price">
                                            <span class="line-through">$98.00</span>
                                            $900
                                        </div>
                                        <!-- /price -->
                                    </div>

                                    <div class="amount text-center">
                                        <div style="width: 50%; display: inline-block">
                                            <input type="text" value="" min="0" class="form-control stepper required">
                                        </div>
                                        เครื่อง
                                    </div>

                                    <!-- buttons -->
                                    <div class="shop-item-buttons text-center">
                                        <a class="btn btn-default" onclick="addToCart({{$inven['inv_id']}})"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                    </div>
                                    <!-- /buttons -->
                                </div>

                            </li>
                        @endforeach--}}

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail" >
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" data-toggle="modal" data-target="#modalItem" {{--href="shop-single-left.html"--}}>
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-success">NEW</span>
                                        <span class="label label-danger">SALE</span>
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Cotton 100% - Pink Shirt</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        <span class="line-through">$98.00</span>
                                        $78.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                    </ul>

                    <!--default ul-->
                    <ul class="shop-item-list row list-inline nomargin">

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-success">NEW</span>
                                        <span class="label label-danger">SALE</span>
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Cotton 100% - Pink Shirt</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        <span class="line-through">$98.00</span>
                                        $78.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p11.jpg" alt="shop hover image">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p3.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="2" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="2" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Black Long Lady Shirt</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-0 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $128.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <span class="out-of-stock">out of stock</span><!-- add .clean to remove css characteres -->
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p12.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="3" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="3" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- countdown -->
                                    <div class="shop-item-counter">
                                        <div class="countdown is-countdown" data-from="January 31, 2018 15:03:26" data-labels="years,months,weeks,days,hour,min,sec"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">733</span><span class="countdown-period">days</span></span><span class="countdown-section"><span class="countdown-amount">15</span><span class="countdown-period">hour</span></span><span class="countdown-section"><span class="countdown-amount">30</span><span class="countdown-period">min</span></span><span class="countdown-section"><span class="countdown-amount">19</span><span class="countdown-period">sec</span></span></span></div>
                                    </div>
                                    <!-- /countdown -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Night Dress For Ladies</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-1 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $34.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <!-- CAROUSEL -->
                                        <div style="opacity: 1; display: block;" class="owl-carousel nomargin owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;autoPlay&quot;: 3000, &quot;navigation&quot;: false, &quot;pagination&quot;: false, &quot;transitionStyle&quot;:&quot;fadeUp&quot;}">
                                            <div class="owl-wrapper-outer"><div style="width: 1152px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); perspective-origin: 96px 50%;" class="owl-wrapper"><div style="width: 192px;" class="owl-item"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p10.jpg" alt=""></div><div style="width: 192px;" class="owl-item"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p1.jpg" alt=""></div><div style="width: 192px;" class="owl-item"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt=""></div></div></div>


                                        </div>
                                        <!-- /CAROUSEL -->
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="4" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="4" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-success">NEW</span>
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Long Grey Dress - Special</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-5 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $76.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p9.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="5" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="5" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->


                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-danger">SALE</span>
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Grey Lady Hat</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        <span class="line-through">$67.00</span>
                                        $21.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p8.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="6" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="6" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- countdown -->
                                    <div class="shop-item-counter">
                                        <div class="countdown is-countdown" data-from="December 31, 2017 08:22:01" data-labels="years,months,weeks,days,hour,min,sec"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">702</span><span class="countdown-period">days</span></span><span class="countdown-section"><span class="countdown-amount">8</span><span class="countdown-period">hour</span></span><span class="countdown-section"><span class="countdown-amount">48</span><span class="countdown-period">min</span></span><span class="countdown-section"><span class="countdown-amount">54</span><span class="countdown-period">sec</span></span></span></div>
                                    </div>
                                    <!-- /countdown -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Beach Black Lady Suit</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $56.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p7.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="7" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="7" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Town Dress - Black</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $154.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p6.jpg" alt="shop first image">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="8" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="8" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Chick Lady Fashion</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $167.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <!-- CAROUSEL -->
                                        <div style="opacity: 1; display: block;" class="owl-carousel buttons-autohide controlls-over nomargin owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;autoPlay&quot;: 3500, &quot;navigation&quot;: false, &quot;pagination&quot;: false, &quot;transitionStyle&quot;:&quot;fadeUp&quot;}">
                                            <div class="owl-wrapper-outer"><div style="width: 768px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); perspective-origin: 96px 50%;" class="owl-wrapper"><div style="width: 192px;" class="owl-item"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p5.jpg" alt=""></div><div style="width: 192px;" class="owl-item"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p1.jpg" alt=""></div></div></div>

                                        </div>
                                        <!-- /CAROUSEL -->
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="9" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="9" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Pink Dress 100% Cotton</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $44.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p4.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="10" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="10" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>White And Black</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $31.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p11.jpg" alt="shop first image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="11" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="11" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- countdown -->
                                    <div class="shop-item-counter">
                                        <div class="countdown is-countdown" data-from="January 12, 2018 12:34:55" data-labels="years,months,weeks,days,hour,min,sec"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">714</span><span class="countdown-period">days</span></span><span class="countdown-section"><span class="countdown-amount">13</span><span class="countdown-period">hour</span></span><span class="countdown-section"><span class="countdown-amount">1</span><span class="countdown-period">Minute</span></span><span class="countdown-section"><span class="countdown-amount">48</span><span class="countdown-period">sec</span></span></span></div>
                                    </div>
                                    <!-- /countdown -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Long Black Top</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        $99.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                        <!-- ITEM -->
                        <li class="col-lg-3 col-sm-3">

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p2.jpg" alt="shop first image">
                                        <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p12.jpg" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="12" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                        <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="12" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-success">NEW</span>
                                        <span class="label label-danger">SALE</span>
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Black Fashion Hat</h2>

                                    <!-- rating -->
                                    <div class="shop-item-rating-line">
                                        <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                    </div>
                                    <!-- /rating -->

                                    <!-- price -->
                                    <div class="shop-item-price">
                                        <span class="line-through">$77.00</span>
                                        $65.00
                                    </div>
                                    <!-- /price -->
                                </div>

                                <!-- buttons -->
                                <div class="shop-item-buttons text-center">
                                    <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                </div>
                                <!-- /buttons -->
                            </div>

                        </li>
                        <!-- /ITEM -->

                    </ul>
                    <!--default ul-->

                    <hr>

                    <!-- Pagination Default -->
                    <div class="text-center">
                        <ul class="pagination">
                            <!--li><a>«</a></li>
                            <li class="page-1 active" onclick="changePageTo(1)"><a>1</a></li>
                            <li class="page-2" onclick="changePageTo(2)"><a>2</a></li>
                            <li class="page-3" onclick="changePageTo(3)"><a>3</a></li>
                            <li class="page-4" onclick="changePageTo(4)"><a>4</a></li>
                            <li><a>»</a></li-->
                        </ul>
                    </div>
                    <!-- /Pagination Default -->

                </div>

            </div>

        </div>
        {{--
        <li class="col-lg-3 col-sm-3 each-item">

            <div class="shop-item">

                <div class="thumbnail" >
                    <a class="shop-item-image" data-toggle="modal" data-target="#modalItem" onclick="openModalItem({{$inven['inv_id']}})">
                        <img class="img-responsive" src="{{$inven['image']}}" alt="shop hover image" style="width: 100%;">
                    </a>

                    <div class="shop-option-over" style="opacity: 1 !important;">
                        <a data-original-title="แก้ไขพัสดุนี้" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="openModalItemEdit({{$inven['inv_id']}})"><i class="fa fa-edit nopadding"></i></a>
                        <a data-original-title="ลบพัสดุนี้" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-trash nopadding"></i></a>
                    </div>

                </div>

                <div class="shop-item-summary text-center">
                    <h2>{{$inven['name']}}</h2>
                </div>

                <div class="amount text-center">
                    <div style="width: 50%; display: inline-block">
                        <input type="text" value="" min="0" class="form-control stepper required">
                    </div>
                    เครื่อง
                </div>

                <div class="shop-item-buttons text-center">
                    <a class="btn btn-default" onclick="addToCart({{$inven['inv_id']}})"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        </li>--}}
    </section>

@endsection

@section('css')
    <link href="{{url('assets/css/layout-shop.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .no-margin{
            margin: 0;
        }
        .select2{
            width: 100% !important;
        }

        .cart:hover{
            background-color: #780000 !important;
        }

        .table-cart{
            border: none !important;
        }

        .table-cart-top{
            border-top: 1px solid #ddd !important;
        }

        .table-cart td{
            vertical-align: middle !important;
        }

        .underline-hover {
            font-size: 14px;
        }

        .underline-hover:hover {
            text-decoration: underline;
        }

        .remove-button-col{
            border: none !important;
            background-color: white !important;
        }

        #modalItem .stepper-wrap{
            display: inline-block;
            width: 70%;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('assets/js/view/demo.shop.js')}}"></script>
    <script type="text/javascript" src="{{url('js/magic-pagination.js')}}"></script>
    <script>
        /** Form Stepper
         **************************************************************** **/
        function myStepper(stepperN) {
            var _container = jQuery('input.stepper'+stepperN);

            if(_container.length > 0) {

                loadScript(plugin_path + 'form.stepper/jquery.stepper.min.js', function() {

                    if(jQuery().stepper) {

                        jQuery(_container).each(function() {
                            var _t 		= jQuery(this),
                                    _min 	= _t.attr('min') || null,
                                    _max 	= _t.attr('max') || null;

                            _t.stepper({
                                limit:						[_min,_max],
                                floatPrecission:			_t.attr('data-floatPrecission') || 2,
                                wheel_step: 				_t.attr('data-wheelstep') 		|| 0.1,
                                arrow_step:	 				_t.attr('data-arrowstep') 		|| 0.2,
                                allowWheel: 				_t.attr('data-mousescrool') 	== "false" ? false : true,
                                UI: 						_t.attr('data-UI') 				== "false" ? false : true,
                                // --
                                type: 						_t.attr('data-type') 			|| "float",
                                preventWheelAcceleration:	_t.attr('data-preventWheelAcceleration') == "false" ? false : true,
                                incrementButton:			_t.attr('data-incrementButton') || "&blacktriangle;",
                                decrementButton:			_t.attr('data-decrementButton') || "&blacktriangledown;",
                                onStep:						null,
                                onWheel:					null,
                                onArrow:					null,
                                onButton:					null,
                                onKeyUp:					null
                            });

                        });

                    }

                });

            }

        }
    </script>
    <script>

        var firstTime = true;
        var nowPage = {{$page}};
        var itemAmount = {{$itemAmount}};
        var pageAll = Math.ceil(itemAmount / 12);
        changePageTo(nowPage);

        var allItem;

        //trigger activity and division to other in cart modal
        function otherActivity(){
            $('#inListActivity').addClass('hidden');
            $('#otherActivity').removeClass('hidden');
            $('#cart-otherActivity-flag').val(true);
        }
        function backToActicityList(){
            $('#inListActivity').removeClass('hidden');
            $('#otherActivity').addClass('hidden');
            $('#cart-otherActivity-flag').val(false);
        }
        function otherDivision(){
            $('#inListDivision').addClass('hidden');
            $('#otherDivision').removeClass('hidden');
            $('#cart-otherDivision-flag').val(true);
        }
        function backToDivisionList(){
            $('#inListDivision').removeClass('hidden');
            $('#otherDivision').addClass('hidden');
            $('#cart-otherDivision-flag').val(false);
        }

        //send cart
        function submitCartButton(){
            if ($('#cart-form').valid()) {
                $.ajax({
                    url : $('#cart-form').attr('action'),
                    type: "POST",
                    data: $('#cart-form').serialize(),
                    success: function (data) {
//                        $("#form_output").html(data);
//                    alert(data['startDate']);
                        if(data == 'startAfterEnd'){
                            _toastr("วันที่ยืมอยู่หลังวันที่คืน กรุณากรอกใหม่", "top-right", "error", false);
                        }
                        else if (data == 'dateInvalid') {
                            _toastr("โปรดระบุวันที่ให้ถูกต้อง", "top-right", "error", false);
                            return false;
                        }
                        else if (data == 'noproject') {
                            _toastr("โปรดระบุโครงการหรือกิจกรรมให้ถูกต้อง", "top-right", "error", false);
                            return false;
                        }
                        else if (data == 'nodivision') {
                            _toastr("โปรดระบุหน่วยงานให้ถูกต้อง", "top-right", "error", false);
                            return false;
                        }
                        else if (data == 'amountInvalid') {
                            _toastr("โปรดระบุจำนวนพัสดุให้ถูกต้อง", "top-right", "error", false);
                            return false;
                        }
                        else {
                            _toastr("ส่งเรื่องยืมสำเร็จ", "top-right", "success", false);
                            updateModalCartSuccess(data);
                            clearCart();
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
//                            alert(errorThrown);
                    }
                });
            }
//            $('#modalCart').addClass('hidden');
//            document.getElementById("submitCartButton").click();
        }
        function updateModalCartSuccess(data){
//            alert(data['startDate']);
            $("#cart-success-activity").text(data['activity']);
            $("#cart-success-division").text(data['division']);
            $("#cart-success-startDate").text(data['startDate']);
            $("#cart-success-endDate").text(data['endDate']);
            $("#cart-success-detail").text(data['detail']);

            $(".cart-success-item").remove();
            var count = 1;
            for(tmp in data['items'])
            {
                var txt = '<tr class="cart-success-item">'
                            +'<td class="text-center">'+count+'</td>'
                            +'<td>'+data['items'][tmp]['name']+'</td>'
                            +'<td>'+data['items'][tmp]['amount']+' '+data['items'][tmp]['unit']+'</td>'
                        +'</tr>';
                $("#cart-success-table-body").append(txt);
                count = count + 1;
            }

            setTimeout(clickToShowModalCartSuccess, 500);
        }
        function clickToShowModalCartSuccess(){
            document.getElementById("submitCartButton").click();
        }
        function clearCart(){
            $('.cart-item').remove();
            $('#cart-start-date').val("");
            $('#cart-end-date').val("");
            $('#cart-detail').val("");
            $('#otherActivity').val("");
            $('#otherDivision').val("");
            changeCartItemAmount(0);
        }

        //close modalCart and modalCartSuccess
        function finishCart(){
            $('#modalCart').removeClass('hidden');
            $('#modalCart').modal('hide');
            $('#modalCartSuccess').modal('hide');
//            alert("aa");
        }
        $("#modalCartSuccess").focusout(function(){
            finishCart();
        });

        //modalItem
        function openModalItem(id){
//            alert(id);
//            alert(allItem[id]['name']);
            $("#item-id").text(allItem[id]['inv_id']);
            $("#item-name").text(allItem[id]['name']);
            $("#item-type").text(allItem[id]['inv_id']);
            $("#item-total_qty").text(allItem[id]['total_qty']);
            $("#item-broken_qty").text(allItem[id]['broken_qty']);
            $("#item-unit").text(allItem[id]['unit']);
            $("#item-price_per_unit").text(allItem[id]['price_per_unit']+' บาท');
            $("#item-store").text(allItem[id]['inv_id']);
            $("#item-store-address").text(allItem[id]['inv_id']);
            $("#item-store-tel").text(allItem[id]['inv_id']);

            var num = $("#item-input-amount-"+id).val();
            $("#modal-item-input-amount").val(num);
            $("#modal-item-input-mount-unit").text(allItem[id]['unit']);
            $("#modal-item-addToCart").removeAttrs('onclick');
            $("#modal-item-addToCart").attr('onclick','modalItemAddToCart('+id+')');
        }
        function modalItemAddToCart(id){
//            alert('++ '+id);
            var inv_id = allItem[id]['inv_id'];
            var check = checkDuplicateItemInCart(inv_id);
            if(!check) return;

            var amount = $("#modal-item-input-amount").val();
            changeCartItemAmount(cartItemAmount+1);
            stepperN = stepperN +1;

            var txt = '<tr id="cart-item-id-'+inv_id+'" class="cart-item cart-item-order-'+cartItemAmount+'">'
                    +'<input type="hidden" id="cart-item-input-id-'+inv_id+'" name="cart['+inv_id+'][id]" value="'+inv_id+'" />'
                    +'<td class="text-center remove-button-col">'
                    +'<a id="cart-remove-button-'+cartItemAmount+'" onclick="removeCartItem('+cartItemAmount+')" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">'
                    +'<i class="fa fa-minus"></i>'
                    +'<i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>'
                    +'</a>'
                    +'</td>'
                    +'<td id="cart-item-order-number-'+cartItemAmount+'" class="text-center">'+cartItemAmount+'</td>'
                    +'<td>'+allItem[id]['name']+'</td>'
                    +'<td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-'+inv_id+'"  name="cart['+inv_id+'][amount]"  type="text" value="'+amount+'" min="0" class="form-control stepper'+stepperN+' required"></div> '+allItem[id]['unit']+'</td>'
                    +'</tr>';
            $('.cart-item-table-body').append(txt);
            myStepper(stepperN);
        }

        //modalItemEdit
        function openModalItemEdit(id){
//            alert("a"+id);
            $("#edit-item-id").text(allItem[id]['inv_id']);
            $("#edit-item-name").val(allItem[id]['name']);

            $(".edit-item-type-all").removeAttrs('selected');
            if(allItem[id]['type'] == 'ใช้แล้วหมดไป')
                $("#edit-item-type-1").attr('selected','selected');
            else if(allItem[id]['type'] == 'ใช้แล้วต้องนำมาคืน')
                $("#edit-item-type-2").attr('selected','selected');
            else
                $("#edit-item-type-0").attr('selected','selected');
            _select2();

            $("#edit-item-total_qty").val(allItem[id]['total_qty']);
            $("#edit-item-broken_qty").val(allItem[id]['broken_qty']);
            $("#edit-item-unit").val(allItem[id]['unit']);
            $("#edit-item-price_per_unit").val(allItem[id]['price_per_unit']);

//            $("#edit-item-store-all").removeAttrs('selected');
//            $("#edit-item-store-"+allItem[id]['store_id']).attr('selected','selected');

            $("#edit-item-confirm-button").removeAttrs('onclick');
            $("#edit-item-confirm-button").attr('onclick','confirmEditItem('+allItem[id]['inv_id']+')');

            $('#modalItemEdit').modal('show');
        }
        function confirmEditItem(id){
            //ajax post to edit
            alert('edit'+id);
        }

        //removeItem
        function removeItem(id){
            $("#modalRemoveItem").modal("show");
            $("#item-confirm-remove-button").attr("onclick","confirmRemoveItem("+id+")");
        }
        function confirmRemoveItem(id){
            //ajax post to delete
            alert('remove'+id);
        }

        function changePageTo(page){
//            if(page == nowPage){
////                alert(pageAll);
//                return ;
//            }
//            alert(page);
//            $(".page-"+nowPage).removeClass("active");
//            $(".page-"+page).addClass("active");
            nowPage = page;
            var word = $("#searchInventory").val();
//            alert(word);

            $.post("{{url('supplies')}}",
                    {page:page,word:word, _token:'{{csrf_token()}}'  } ).done(function( input ) {
//                alert(input);
                allItem = input['inventory'];
                itemAmount = input['count'];
                pageAll = Math.ceil(itemAmount / 12);
                updatePagination();

                $(".each-item").remove();

                Object.size = function(obj) {
                    var size = 0, key;
                    for (key in obj) {
                        if (obj.hasOwnProperty(key)) size++;
                    }
                    return size;
                };
                var size = Object.size(allItem);
//                alert(size);

                var tmp;
                for (tmp in allItem) {
//                    alert(input[tmp]['name']);
                    var txt = '<li class="col-lg-3 col-sm-3 each-item">'

                                +'<div class="shop-item">'

                                    +'<div class="thumbnail" >'
                                        +'<a class="shop-item-image" data-toggle="modal" data-target="#modalItem" onclick="openModalItem('+allItem[tmp]['inv_id']+')">'
                                        +'<img class="img-responsive" src="'+allItem[tmp]['image']+'" alt="shop hover image" style="width: 100%;">'
                                        +'</a>'

                                        +'<div class="shop-option-over" style="opacity: 1 !important;">'
                                        +'<a data-original-title="แก้ไขพัสดุนี้" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="openModalItemEdit('+allItem[tmp]['inv_id']+')"><i class="fa fa-edit nopadding"></i></a>'
                                        +'<a data-original-title="ลบพัสดุนี้" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="removeItem('+allItem[tmp]['inv_id']+')"><i class="fa fa-trash nopadding"></i></a>'
                                        +'</div>'
                                    +'</div>'

                                    +'<div class="shop-item-summary text-center">'
                                        +'<h2>'+allItem[tmp]['name']+'</h2>'
                                    +'</div>'

                                    +'<div class="amount text-center">'
                                        +'<div style="width: 50%; display: inline-block">'
                                            +'<input id="item-input-amount-'+allItem[tmp]['inv_id']+'" type="text" value="" min="0" class="form-control stepper2 required">'
                                        +'</div>'
                                        +' '+allItem[tmp]['unit']
                                    +'</div>'

                                    +'<div class="shop-item-buttons text-center">'
                                        +'<a class="btn btn-default" onclick="addToCart('+allItem[tmp]['inv_id']+')"><i class="fa fa-cart-plus"></i> Add to Cart</a>'
                                    +'</div>'
                                +'</div>'
                            +'</li>';
                    $('.shop-item-list').append(txt);
                }
                if(firstTime) {
                    myStepper(2);
                }
                else
                    firstTime = false;
            });

        }

        var cartItemAmount = 0;
        var stepperN = 2;
        function addToCart(id){
//            alert(id);
            var inv_id = allItem[id]['inv_id'];
            var check = checkDuplicateItemInCart(inv_id);
            if(!check) return;

            var amount = $("#item-input-amount-"+id).val();
            changeCartItemAmount(cartItemAmount+1);
            stepperN = stepperN +1;

            var txt = '<tr id="cart-item-id-'+inv_id+'" class="cart-item cart-item-order-'+cartItemAmount+'">'
                        +'<input type="hidden" id="cart-item-input-id-'+inv_id+'" name="cart['+inv_id+'][id]" value="'+inv_id+'" />'
                        +'<td class="text-center remove-button-col">'
                            +'<a id="cart-remove-button-'+cartItemAmount+'" onclick="removeCartItem('+cartItemAmount+')" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">'
                            +'<i class="fa fa-minus"></i>'
                            +'<i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>'
                            +'</a>'
                        +'</td>'
                        +'<td id="cart-item-order-number-'+cartItemAmount+'" class="text-center">'+cartItemAmount+'</td>'
                        +'<td>'+allItem[id]['name']+'</td>'
                        +'<td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-'+inv_id+'"  name="cart['+inv_id+'][amount]"  type="text" value="'+amount+'" min="0" class="form-control stepper'+stepperN+' required"></div> '+allItem[id]['unit']+'</td>'
                    +'</tr>';
            $('.cart-item-table-body').append(txt);
            myStepper(stepperN);
        }

        function removeCartItem(order){
            var r = confirm("ยืนยันการลบพัสดุนี้ออกจากรายการยืม ?");
            if (r == true) {
                $(".cart-item-order-"+order).remove();
                for(var i = r+1 ; i<=cartItemAmount ; i++){
                    $('.cart-item-order-'+i).addClass('cart-item-order-'+(i-1));
                    $('.cart-item-order-'+(i-1)).removeClass('cart-item-order-'+i);

                    $('#cart-remove-button-'+i).addClass('tmp');
                    $('.tmp').removeAttrs('id');
                    $('.tmp').attr('id','cart-remove-button-'+(i-1));
                    $('#cart-remove-button-'+(i-1)).removeClass('tmp');

                    $('#cart-remove-button-'+(i-1)).removeAttrs('onclick');
                    $('#cart-remove-button-'+(i-1)).attr('onclick','removeCartItem('+(i-1)+')');

                    $('#cart-item-order-number-'+i).addClass('tmp');
                    $('.tmp').removeAttrs('id');
                    $('.tmp').attr('id','cart-item-order-number-'+(i-1));
                    $('#cart-item-order-number-'+(i-1)).removeClass('tmp');

                    $('#cart-item-order-number-'+(i-1)).text((i-1));
                }
            }
            changeCartItemAmount(cartItemAmount-1);
        }

        //other method
        function changeCartItemAmount(num){
            cartItemAmount = num ;
            if(cartItemAmount == 0){
                $(".cart-button").addClass("hidden");
                $('#modalCart').modal('hide');
            }
            else {
                $(".cart-button").removeClass("hidden");
            }
            $(".cart-button-badge").text(cartItemAmount);
        }
        function updatePagination(){
            MagicPagi.init({
                url : '{{ url("supplies/")}}',
                ul : $(".pagination"),
                min : 1,
                max : pageAll,
                range : 2,
                mode : 'jquery',
                onclick : function(page) { changePageTo(page); },
            }).go(nowPage);
        }
        function checkDuplicateItemInCart(id){
            for(var i=1;i<=cartItemAmount;i++)
            {
                var tmp = $(".cart-item-order-"+i).attr('id');
//                alert(tmp);
                if(tmp == 'cart-item-id-'+id)
                {
                    _toastr("มีพัสดุนี้ในรายการยืมแล้ว", "top-right", "warning", false);
                    return false;
                }
            }
            return true;
        }

        updatePagination();

    </script>
@endsection