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
        <form class="validate" action="{{url().'/supplies/send_cart'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="ส่งเรื่องยืมสำเร็จ!<script>submitCartButton();</script>" data-toastr-position="top-right">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
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
                            <tbody>
                            <tr id="cart-item-id-2" class="cart-item-order-1">
                                <input type="hidden" id="cart-item-input-id-2" name="cart[2][id]" value="2" />
                                <td class="text-center remove-button-col">
                                    <a id="room-remove-button-" onclick="removeCartItem(1)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td class="text-center">1</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-2"  name="cart[2][amount]" type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr>
                            <tr id="cart-item-id-1" class="cart-item-order-2">
                                <input type="hidden" id="cart-item-input-id-1" name="cart[1][id]" value="1" />
                                <td class="text-center remove-button-col">
                                    <a id="room-remove-button-" onclick="removeCartItem(2)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td class="text-center">2</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-1"  name="cart[1][amount]"  type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr>
                            <tr id="cart-item-id-3" class="cart-item-order-3">
                                <input type="hidden" id="cart-item-input-id-3" name="cart[3][id]" value="3" />
                                <td class="text-center remove-button-col">
                                    <a id="room-remove-button-" onclick="removeCartItem(3)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบพัสดุนี้" style="vertical-align:middle">
                                        <i class="fa fa-minus"></i>
                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                    </a>
                                </td>
                                <td class="text-center">3</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร เนื้อดีเป็นพิเศษ เหมาะสำหรับการทำเสลี่ยงให้กลุ่มตัวแทนนิสิตแห่งจุฬาลงกรณ์มหาวิทยาลัย</td>
                                <td><div style="width:80%; display: inline-block"><input id="cart-item-input-amount-3"  name="cart[3][amount]"  type="text" value="10" min="0" class="form-control stepper required"></div> อัน</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row no-mergin">
                        <div class="col-md-6">
                            <label>วันที่ยืม</label>
                            <input id="cart-start-date" name="startDate" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                        </div>
                        <div class="col-md-6">
                            <label>วันที่คืน</label>
                            <input id="cart-end-date" name="endDate" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                        </div>
                    </div>

                    <label class="margin-top-20">โครงการ</label>
                    <div id="inListActivity">
                        <select id="catr-activity" name="activity" class="form-control select2 required">
                            <option selected="selected" value="0">โครงการ / กิจกรรมที่ต้องการ</option>
                            <option value="1">งานชั้นปี</option>
                            <option value="2">ค่ายลานเกียร์</option>
                            <option value="3">ConneK 7</option>
                            <option value="4">FE Camp</option>
                            <option value="5">ฟันเฟือง</option>
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

                    <label class="margin-top-20">หน่วยงาน</label>
                    <div id="inListDivision">
                        <select id="cart-division" name="division" class="form-control select2 required">
                            <option selected="selected" value="0">หน่วยงาน</option>
                            <option value="1">รุ่น</option>
                            <option value="2">กรุ๊ป</option>
                            <option value="3">ภาควิชา</option>
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

                    <div class="row">
                        <div class="col-md-3 col-xs-6"  style="margin-top: 5px;">
                            <label>รายละเอียด</label>
                        </div>
                        <div class="col-md-12 col-sm-10 col-xs-12">
                            <textarea id="cart-detail" name="detail" rows="4" class="form-control required"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">กลับไปเลือกเพิ่ม</button>
                    <button type="submit" class="btn btn-primary" onclick="submitCartButton()">ส่งเรื่องยืม</button>
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
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            งานชั้นปี
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>หน่วยงาน</b></label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            รุ่น 97
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>วันที่ยืม</b></label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            05-04-2016
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <label><b>วันที่คืน</b></label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            07-04-2016
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                        <div class="col-md-3 col-xs-6">
                            <label><b>รายละเอียด</b></label>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 5px;">
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
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                            </tr>
                            <tr>
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
                        <div class="col-sm-9 col-xs-8">
                            ESC-0001
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div class="col-md-9">
                            ดินสอแสนน่ารัก
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div class="col-md-9">
                            ใช้แล้วหมดไป
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>จำนวนทั้งหมด</b></label>
                        </div>
                        <div class="col-md-9">
                            300
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>จำนวนที่เสีย</b></label>
                        </div>
                        <div class="col-md-9">
                            26
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            แท่ง
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-3">
                            <label><b>ราคาที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            20.00 บาท
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            จีฉ่อย
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>ข้อมูลติดต่อ</b></label>
                        </div>
                        <div class="col-md-9">
                            32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111 32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <label><b>เบอร์โทรศัพท์</b></label>
                        </div>
                        <div class="col-md-9">
                            085-111-1111
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <div class="row no-margin" style="width: 90%; display: inline-block; text-align:center; margin-bottom: 15px;">
                        <input type="text" value="" min="0" class="form-control stepper required" style="display: inline-block !important; width: 100%;">
                        <label style="display: inline-block !important; width: 20%;">เครื่อง</label>
                    </div>
                    <div class="row no-margin">
                        <a class="btn btn-3d btn-reveal btn-default" data-dismiss="modal" style="width: 90px;">
                            <i class="fa fa-times"></i>
                            <span>ยกเลิก</span>
                        </a>
                        <a id="" class="btn btn-3d btn-primary" data-dismiss="modal" onclick="addToCart(1)" style="width: 110px;">
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
                        <div class="col-sm-9 col-xs-8">
                            ESC-0001
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="" value="" class="form-control required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div class="col-md-9">
                            <select name="project" class="form-control select2 required" id="project-selection">
                                <option selected="selected" value="0">ประเภทพัสดุ</option>
                                <option value="1">งานช่าง</option>
                                <option value="2">เย็บปักถักร้อย</option>
                                <option value="3">ของกิน</option>
                                <option value="4">อุปกรณ์ปฐมพยาบาล</option>
                                <option value="5">เครื่องเขียน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนทั้งหมด</b></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนที่เสีย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="" value="" class="form-control required" placeholder="ลักษณนาม">
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคาที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control masked" data-format="999,999.99" data-placeholder="X" placeholder="ราคาที่ซื้อ">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            <select name="project" class="form-control select2 required" id="project-selection">
                                <option selected="selected" value="0">สถานที่ซื้อ</option>
                                <option value="1">จีฉ่อย</option>
                                <option value="2">ช.การช่าง</option>
                                <option value="3">ค.เครื่องเขียน</option>
                                <option value="4">สมใจ</option>
                                <option value="5">จามจุรีสแควร์</option>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center" style="margin-top: 15px;">
                        <a id="addShop" class="btn btn-3d btn-reveal btn-green" onclick="">
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
                    <a id="room-confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal" style="width: 90px;">
                        <i class="fa fa-check"></i>
                        <span>ยืนยัน</span>
                    </a>
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>--}}
                    {{--<button type="button" class="btn btn-primary" data-dismiss="modal">ยืนยัน</button>--}}
                </div>

            </div>
        </div>
    </div>

    <section>
        <div class="container">

            <div class="cart-button"  data-toggle="modal" data-target="#modalCart" style="position: fixed; top: 85px; right: 8%; z-index: 1000;">
                <span class="badge btn-xs" style="top: -40px !important; right: -50px !important; position: relative !important; color: #fff !important; z-index:1010; background-color: #5cb85c;">2</span>
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
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">»</a></li>
                        </ul>

                        <div class="options-left col-lg-5 col-md-5 col-sm-5">
                            <div class="input-group autosuggest" data-minLength="1">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="searchInventory" name="searchInventory" class="form-control typeahead" placeholder="กรอกรหัส/ชื่อพัสดุ" type="text">
                                    <span class="input-group-btn" id="add-new-permission-btn">
                                        <a class="btn btn-success">ค้นหา</a>
                                    </span>
                            </div>
                        </div>

                    </div>
                    <!-- /LIST OPTIONS -->

                    <ul class="shop-item-list row list-inline nomargin">

                        @foreach($inventory as $inventory)
                            <li class="col-lg-3 col-sm-3">

                                <div class="shop-item">

                                    <div class="thumbnail" >
                                        <!-- product image(s) -->
                                        <a class="shop-item-image" data-toggle="modal" data-target="#modalItem" onclick="openModalItem({{$inventory['inv_id']}})">
                                            <!--img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image">
                                            <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image"-->
                                            {{--<div style="width:100%; height:100%; background-image: url({{$inventory['image']}})"></div>--}}
                                            <img class="img-responsive" src="{{$inventory['image']}}" alt="shop hover image" style="width: 100%;">
                                        </a>
                                        <!-- /product image(s) -->

                                        <!-- hover buttons -->
                                        <div class="shop-option-over" style="opacity: 1 !important;"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                            <a data-original-title="แก้ไขพัสดุนี้" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="openModalItemEdit({{$inventory['inv_id']}})"><i class="fa fa-edit nopadding"></i></a>
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
                                        <h2>{{$inventory['name']}}</h2>

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
                                        <a class="btn btn-default" onclick="addToCart({{$inventory['inv_id']}})"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                                    </div>
                                    <!-- /buttons -->
                                </div>

                            </li>
                        @endforeach

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
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                    <!-- /Pagination Default -->

                </div>

            </div>

        </div>
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
    <script>

        var amountCartItem = 3;

        function otherActivity(){
            $('#inListActivity').addClass('hidden');
            $('#otherActivity').removeClass('hidden');
        }
        function backToActicityList(){
            $('#inListActivity').removeClass('hidden');
            $('#otherActivity').addClass('hidden');
        }
        function otherDivision(){
            $('#inListDivision').addClass('hidden');
            $('#otherDivision').removeClass('hidden');
        }
        function backToDivisionList(){
            $('#inListDivision').removeClass('hidden');
            $('#otherDivision').addClass('hidden');
        }

        function submitCartButton(){
//            alert();
            $('#modalCart').addClass('hidden');
//            $('#modalCartSuccess').modal('show');
            document.getElementById("submitCartButton").click();
        }
        function finishCart(){
            $('#modalCart').removeClass('hidden');
            $('#modalCart').modal('hide');
            $('#modalCartSuccess').modal('hide');
//            alert("aa");
        }
        $("#modalCartSuccess").focusout(function(){
//            alert();
            finishCart();
        });

        function openModalItem(id){
//            alert(id);
        }

        function openModalItemEdit(id){
//            alert("a"+id);
            $('#modalItemEdit').modal('show');
        }

        function addToCart(id){
            alert(id);
            alert({{$inventory[0]['name']}});
        }

        function removeCartItem(order){
            var r = confirm("ยืนยันการลบพัสดุนี้ออกจากรายการยืม ?");
            if (r == true) {
                $(".cart-item-order-"+order).remove();
            }
        }
    </script>
@endsection