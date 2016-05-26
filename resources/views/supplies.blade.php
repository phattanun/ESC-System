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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> ข้อมูลพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>รหัสพัสดุ</b></label>
                        </div>
                        <div id="item-id" class="col-md-10 col-sm-9 col-xs-7">
                            ESC-0001
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div id="item-name" class="col-md-10 col-sm-9 col-xs-7">
                            ดินสอแสนน่ารัก
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div id="item-type" class="col-md-10 col-sm-9 col-xs-7">
                            ใช้แล้วหมดไป
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>จำนวนคงเหลือ</b></label>
                        </div>
                        <div id="item-remain_qty" class="col-md-10 col-sm-9 col-xs-7">
                            300
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>ราคากลาง</b></label>
                        </div>
                        <div id="item-price_per_unit" class="col-md-10 col-sm-9 col-xs-7">
                            20.00 บาท
                        </div>
                    </div>
                    <!--div class="row" style="margin-top: 20px;">
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
                    </div-->
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2 col-sm-3 col-xs-5">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div id="item-unit" class="col-md-10 col-sm-9 col-xs-7">
                            แท่ง
                        </div>
                    </div>
                </div>

                <div class="modal-body supplier-table" style="border-top: 1px solid #e5e5e5;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-modal-item">
                            <thead>
                            <tr>
                                <th class="width-50" style="min-width: 50px; max-width: 50px;">ลำดับ</th>
                                <th class="width-100" style="min-width: 100px; max-width: 100px;">สถานที่ซื้อ</th>
                                <th class="width-400" style="min-width: 400px; max-width: 400px;">ข้อมูลติดต่อ</th>
                                <th class="width-110" style="min-width: 110px; max-width: 110px;">เบอร์โทรศัพท์</th>
                                <th class="width-110" style="min-width: 110px; max-width: 110px;">ราคาต่อหน่วย</th>
                                <th class="width-100" style="min-width: 99px; max-width: 99px;">หน่วย</th>
                            </tr>
                            </thead>
                            <tbody class="modal-item-table-body">
                                <tr class="modal-item-tuple">
                                    <td style="min-width: 50px; max-width: 50px;">1</td>
                                    <td style="min-width: 100px; max-width: 100px;">จีฉ่อย</td>
                                    <td style="min-width: 400px; max-width: 400px;">32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111 32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111</td>
                                    <td style="min-width: 110px; max-width: 110px;">085-111-1111</td>
                                    <td style="min-width: 110px; max-width: 110px;">20.00</td>
                                    <td style="min-width: 99px; max-width: 99px;">เครื่อง</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--div class="row" style="margin-top: 20px;">
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
                    </div-->
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
                </div>

            </div>
        </div>
    </div>
    @if(isset($user['supplies']))
    <div id="modalItemCreate" class="modal fade" role="dialog" aria-labelledby="CreateItem" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <form class="validate" action="{{url('/supplies/create')}}" method="post"
                      {{--enctype="multipart/form-data" data-success="สร้างพัสดุสำเร็จ<script>window.location='{{url('/supplies')}}';</script>"--}}
                      enctype="multipart/form-data" data-success="สร้างพัสดุสำเร็จ"
                      data-toastr-position="top-right">
                    <!-- required [php action request] -->
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> เพิ่มพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>รูปภาพ</b></label>
                        </div>
                        <div class="col-md-9">
                            <div class="fancy-file-upload fancy-file-default">
                                <i class="fa fa-upload"></i>
                                <input type="file" id="create-item-pic-input" required class="form-control"  onchange="jQuery(this).next('input').val(this.value);" />
                                <input type="text" id="create-item-pic-name" required class="form-control" placeholder="ยังไม่ได้เลือกรูปภาพ" readonly="" />
                                <span class="button">เลือกไฟล์</span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="cropping-wrapper" style="margin-top: 0px;margin-bottom: 0px;">
                        <img class="hidden" id="cropping-area" style="max-width: 100%">
                        <input type="hidden" name="createItemPicCropped" id="create-item-pic-cropped" class="form-control" value=""/>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div class="col-md-9">
                            <input required id="create-item-name" placeholder="กรุณากรอกชื่อพัสดุ" type="text"  name="createItemName" class="form-control required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div class="col-md-9">
                            <select required id="create-item-type" name="createItemType" class="form-control select2 required">
                                <option selected="selected" value="0">ประเภทพัสดุ</option>
                                <option value="ใช้แล้วหมดไป">ใช้แล้วหมดไป</option>
                                <option value="ใช้แล้วต้องนำมาคืน">ใช้แล้วต้องนำมาคืน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนทั้งหมด</b></label>
                        </div>
                        <div class="col-md-9">
                            <input required id="create-item-total_qty" type="text" min="0" name="createItemTotal" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input required id="create-item-unit" type="text" name="createItemUnit" class="form-control required" placeholder="ลักษณนาม">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคากลาง (ต่อหน่วย)</b></label>
                        </div>
                        <div class="col-md-9">
                            <input required type="text" min="0" name="createItemPricePerUnit" class="form-control stepper required">
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 15px;margin-bottom: 0px">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            <select id="create-item-store"  class="form-control select2">
                                <option selected="selected" value="0">สถานที่ซื้อ</option>
                                @foreach($supplier as $asupplier)
                                    <option value="{{$asupplier['supplier_id']}}">{{$asupplier['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div  style="margin-bottom: 15px;text-align: right">
                        <a target="_blank" class="underline-hover" href="{{url('/supplies/supplier')}}">คลิกที่นี่เพื่อเพิ่มร้านค้า</a>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input  id="create-item-store-unit" type="text" class="form-control required" placeholder="ลักษณนาม">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคาที่ซื้อ (ต่อหน่วย)</b></label>
                        </div>
                        <div class="col-md-9">
                            <input  id="create-item-price_per_unit" type="text" min="0" class="form-control stepper">
                        </div>
                    </div>

                    <div class="row text-center" style="margin-top: 15px;">
                        <a id="createItemAddShop" class="btn btn-3d btn-reveal btn-green">
                            <i class="fa fa-plus"></i>
                            <span>เพิ่มร้านค้า</span>
                        </a>
                    </div>
                    <div id="create-item-store-table" class="table-responsive hidden">
                        <table class="table table-bordered table-striped table-cart">
                            <thead>
                            <tr>
                                <th class="remove-button-col"></th>
                                <th  class="table-cart-top">ลำดับ</th>
                                <th class="table-cart-top">สถานที่ซื้อ</th>
                                <th class="table-cart-top">ราคาต่อหน่วย</th>
                                <th class="table-cart-top">หน่วย</th>
                            </tr>
                            </thead>
                            <tbody id="add-store-table-body">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal" style="width: 90px;">
                        <i class="fa fa-times"></i>
                        <span>ยกเลิก</span>
                    </a>
                    <button type="submit" id="create-item-confirm-button" class="btn btn-3d btn-reveal btn-green"  style="width: 90px;">
                        <i class="fa fa-check"></i>
                        <span>ยืนยัน</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalItemEdit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="validate" action="{{url('/supplies/edit')}}" method="post"
                      {{--enctype="multipart/form-data" data-success="สร้างพัสดุสำเร็จ<script>window.location='{{url('/supplies')}}';</script>"--}}
                      enctype="multipart/form-data" data-success="แก้ไขพัสดุสำเร็จ<script>reload();$('#modalItemEdit').modal('hide');</script>"
                      data-toastr-position="top-right">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> แก้ไขข้อมูลพัสดุ</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>รูปภาพ</b></label>
                        </div>
                        <div class="col-md-9">
                            <div class="fancy-file-upload fancy-file-default">
                                <i class="fa fa-upload"></i>
                                <input type="file" id="edit-item-pic-input"  class="form-control"  onchange="jQuery(this).next('input').val(this.value);" />
                                <input type="text" id="edit-item-pic-name"  class="form-control" placeholder="ยังไม่ได้เลือกรูปภาพ" readonly="" />
                                <span class="button">เลือกไฟล์</span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="cropping-wrapper-edit" style="margin-top: 0px;margin-bottom: 0px;">
                        <img id="cropping-area-edit" style="max-width: 100%">
                        <input type="hidden" name="editItemPicCropped" id="edit-item-pic-cropped" class="form-control" value=""/>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">
                            <label><b>รหัสพัสดุ</b></label>
                        </div>
                        <div id="edit-item-id" class="col-sm-9 col-xs-8">
                            ESC-0001
                        </div>
                        <input id="edit-item-id-input" type="hidden" name="editItemID" value="" class="form-control required">
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ชื่อพัสดุ</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-name" type="text" name="editItemName" value="" class="form-control required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ประเภท</b></label>
                        </div>
                        <div class="col-md-9">
                            <select id="edit-item-type" name="editItemType" class="form-control select2 required">
                                <option id="edit-item-type-0" class="edit-item-type-all" value="0">ประเภทพัสดุ</option>
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
                            <input id="edit-item-total_qty" name="editItemTotal" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนที่เสีย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-broken_qty" name="editItemBroken" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>จำนวนที่เหลืออยู่</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-remain" name="editItemRemain" type="text" value="" min="0" class="form-control stepper required">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-unit" type="text" name="editItemUnit" value="" class="form-control required" placeholder="ลักษณนาม">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคากลาง (ต่อหน่วย)</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-price-per-unit" required type="text" min="0" name="editItemPricePerUnit" class="form-control stepper required">
                        </div>
                    </div>
                </div>

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>สถานที่ซื้อ</b></label>
                        </div>
                        <div class="col-md-9">
                            <select id="edit-item-store" class="form-control select2" id="project-selection">
                                <option id="edit-item-store-0" class="edit-item-store-all" value="0">สถานที่ซื้อ</option>
                                @foreach($supplier as $asupplier)
                                    <option value="{{$asupplier['supplier_id']}}">{{$asupplier['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>หน่วย</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-store-unit" type="text" value="" class="form-control" placeholder="ลักษณนาม">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label><b>ราคาที่ซื้อ (ต่อหน่วย)</b></label>
                        </div>
                        <div class="col-md-9">
                            <input id="edit-item-price_per_unit" type="text" value="" min="0" class="form-control stepper">
                        </div>
                    </div>

                    <div class="row text-center" style="margin-top: 15px;">
                        <a id="editItemAddShop" class="btn btn-3d btn-reveal btn-green">
                            <i class="fa fa-plus"></i>
                            <span>เพิ่มร้านค้า</span>
                        </a>
                    </div>
                    <div id="edit-item-store-table" class="table-responsive hidden">
                        <table class="table table-bordered table-striped table-cart">
                            <thead>
                            <tr>
                                <th class="remove-button-col"></th>
                                <th  class="table-cart-top">ลำดับ</th>
                                <th class="table-cart-top">สถานที่ซื้อ</th>
                                <th class="table-cart-top">ราคาต่อหน่วย</th>
                                <th class="table-cart-top">หน่วย</th>
                            </tr>
                            </thead>
                            <tbody id="edit-store-table-body">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal" style="width: 90px;">
                        <i class="fa fa-times"></i>
                        <span>ยกเลิก</span>
                    </a>
                    <button type="submit" id="edit-item-confirm-button" class="btn btn-3d btn-reveal btn-green"  style="width: 90px;">
                        <i class="fa fa-check"></i>
                        <span>ยืนยัน</span>
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    {{--<div id="modalRemoveItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-sm">--}}
            {{--<div class="modal-content">--}}

                {{--<!-- header modal -->--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="mySmallModalLabel">ต้องการลบพัสดุนี้ใช่หรือไม่ ?</h4>--}}
                {{--</div>--}}

                {{--<!-- body modal -->--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="row text-center">--}}
                        {{--<a id="item-confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">--}}
                            {{--<i class="fa fa-check"></i>--}}
                            {{--<span>ใช่</span>--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--<span>ไม่ใช่</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    @endif
    <section style="margin-top: -40px;">
        <div class="container">

            <div class="cart-button hidden"  data-toggle="modal" data-target="#modalCart" style="position: fixed; top: 85px; right: 8%; z-index: 1000;">
                <span class="cart-button-badge badge btn-xs" style="top: -40px !important; right: -50px !important; position: relative !important; color: #fff !important; z-index:1010; background-color: #5cb85c;">0</span>
                <a class="social-icon social-icon-round social-icon-light cart" data-toggle="tooltip" data-placement="top" title="รายการยืม">
                    <i class="fa fa-shopping-cart"></i>
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            @if(isset($user['supplies'])||$announcement!='')
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <!-- Panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<span class="title elipsis">
									<strong>ประกาศ</strong> <!-- panel title -->
								</span>
                            </div>
                            <!-- panel content -->
                            <div class="panel-body">
                                <div id="announcement" class="text-center"><p id="announcementText">{{$announcement}}</p></div>
                                @if(isset($user['supplies']))
                                    <form novalidate="novalidate" class="validate" action="{{url().'/supplies/edit_announcement'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>window.location='{{url()}}/supplies';</script>" data-toastr-position="top-right">
                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                        <input id = "announcementEditBox"  name="announcement" class="form-control hidden" type="text">
                                        <div id="editAnnouncementButton"  class="text-center">
                                            <a class="btn btn-3d btn-reveal btn-yellow">
                                                <i class="fa fa-edit"></i>
                                                <span>แก้ไข</span>
                                            </a>
                                        </div>
                                        <div class="row text-center hidden" id="edit-panel">
                                            <div class="col-md-offset-5 col-md-1 ">
                                                <button id="save-btn" type="submit" class="btn btn-3d btn-reveal btn-green ">
                                                    <i class="fa fa-check"></i>
                                                    <span>บันทึก</span>
                                                </button>
                                            </div>
                                            <div class="col-md-1">
                                                <a id="cancel-btn" class="btn btn-3d btn-reveal btn-red ">
                                                    <i class="fa fa-times"></i>
                                                    <span>ยกเลิก</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <!-- /panel content -->
                        </div>
                        <!-- /Panel -->
                    </div>
                </div>
            @endif
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
                            <div class="input-group autosuggest" data-minLength="1" data-queryURL="{!! url('setting/auto_suggest?limit=10&search=') !!}">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="searchInventory" name="searchInventory" class="form-control typeahead" placeholder="กรอกรหัส/ชื่อพัสดุ" type="text">
                                    <span class="input-group-btn" id="add-new-permission-btn" onclick="searchCountInventory(1)">
                                        <a class="btn btn-success">ค้นหา</a>
                                    </span>
                            </div>
                        </div>
                    @if(isset($user['supplies']))
                            <div class="col-md-1">
                                <button type="button" data-toggle="modal" data-target="#modalItemCreate" id="add-file" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่มพัสดุ</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- /LIST OPTIONS -->

                    <ul class="shop-item-list row list-inline nomargin">

                    </ul>

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

    </section>

@endsection

@section('css')
    <link href="{{url('assets/css/layout-shop.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/plugins/cropper/cropper.min.css')}}" rel="stylesheet" type="text/css" />
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

        .table-modal-item tr, .table-modal-item td{
            white-space: pre-wrap !important;
        }
        .cropper-container{
            width:100% !important;
        }
        .item-transparent {
            opacity: 0.1;
        }
        .each-item-transparent {
            background-image: -webkit-gradient(linear, left top, right bottom, color-stop(.25, rgba(0, 0, 0, .03)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(0, 0, 0, .03)), color-stop(.75, rgba(0, 0, 0, .03)), color-stop(.75, transparent), to(transparent));
            background-image: -webkit-linear-gradient(135deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            background-image: -webkit-linear-gradient(315deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            background-image: linear-gradient(135deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            -webkit-background-size: 16px 16px;
            background-size: 16px 16px;
        }
        form {
            margin-bottom: 0px;
        }
        #announcement p{
            color: #780000;
            word-break: break-all;
            word-wrap: break-word;
            font-size: 20px;
            margin-bottom: 0px;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('assets/js/view/demo.shop.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/plugins/cropper/cropper.min.js')}}"></script>
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
//        changePageTo(nowPage);
        searchCountInventory(nowPage);

        var allItem;
//announcement
        @if($user['supplies'])
       $("#editAnnouncementButton").click(function () {
            $("#announcement").hide();
            $("#announcementEditBox").val($("#announcementText").text());
            $("#announcementEditBox").removeClass('hidden');
            $("#edit-panel").removeClass('hidden');
            $(this).hide();
        });
        $("#cancel-btn").click(function(){
            $("#announcement").show();
            $("#announcementEditBox").addClass('hidden');
            $("#edit-panel").addClass('hidden');
            $("#editAnnouncementButton").show();
        });
        @endif
//create Item
        $(document).on('click','.delete-create-tuple',function(){
            $(this).closest('tr').remove();
            var i=1;
            $('.create-item-store-tuple-sequence').each(function(){
                $(this).html(i);
                i++;
            });
        });
        var sequenceNumber=1;
        // File Handling
        var  $image=$('#cropping-area');
        var $imageWrapper = $('#cropping-wrapper');
        function handleFileSelect(evt) {
            var f = evt.target.files[0];
            if (!f.type.match('image.*')) {
                return false;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    $image.cropper('replace',e.target.result);
                }
            })(f);
            reader.readAsDataURL(f);
        };
        var croppedInput=$('#create-item-pic-cropped');
        $('#create-item-pic-input').on('change',function(e){
            $image.cropper({
                aspectRatio: 4 / 3,
                autoCropArea: 1.0,
                cropend: function() {
                    croppedInput.val(($image.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                },
                built: function () {
                    croppedInput.val(($image.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                }
            });
            handleFileSelect(e);
            $image.removeClass('hidden');
            $imageWrapper.css('margin-bottom','15px');
        });
        $('#modalItemCreate').on('shown.bs.modal', function () {
        }).on('hidden.bs.modal', function () {
            sequenceNumber=1;
            $('#add-store-table-body').html('');
            $('#create-item-store-table').addClass('hidden');
            $('#create-item-pic-name').val('');
            $image.cropper('destroy');
            $image.attr('src','');
            $image.addClass('hidden');
            $imageWrapper.css('margin-bottom','0px');
        });
        $('#createItemAddShop').click(function (){
            $('#create-item-store-table').removeClass('hidden');
            $('#add-store-table-body').append('<tr class="modal-item-tuple ">'+
                    '<td class="remove-button-col text-center">'+
                        '<a id="" class="delete-create-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'+
                            '<i class="fa fa-minus"></i>'+
                            '<i class="fa fa-trash"></i>'+
                        '</a>'+
                    '</td>'+
                    '<td class="create-item-store-tuple-sequence">'+sequenceNumber+'</td>'+
                    '<td>'+ $( "#create-item-store option:selected" ).text() +'</td><input type="hidden" name="createItemStore[]" class="form-control" value="'+ $( "#create-item-store" ).val() +'">'+
                    '<td>'+ $('#create-item-store-unit').val() +'</td><input type="hidden" name="createItemStoreUnit[]" class="form-control" value="'+ $('#create-item-store-unit').val() +'">'+
                    '<td>'+ $('#create-item-price_per_unit').val() +'</td><input type="hidden" name="createItemStorePrice[]" class="form-control" value="'+ $('#create-item-price_per_unit').val() +'">'+
            '</tr>'
            );
            sequenceNumber++;
        });

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
                        else if (data == 'amountExceeded') {
                            _toastr("พัสดุในคลังมีไม่เพียงพอ<br>โปรดลดจำนวนพัสดุ", "top-right", "error", false);
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
            $("#item-type").text(allItem[id]['type']);
            $("#item-remain_qty").text(allItem[id]['remain_qty']);
//            $("#item-total_qty").text(allItem[id]['total_qty']);
//            $("#item-broken_qty").text(allItem[id]['broken_qty']);
            $("#item-unit").text(allItem[id]['unit']);
            $("#item-price_per_unit").text(allItem[id]['price_per_unit']+' บาท / '+allItem[id]['unit']);

            $(".modal-item-tuple").remove();
            var len = allItem[id]['supplier'].length;
//            alert(allItem[id]['supplier'].length);
            if(len == 0) $(".supplier-table").addClass("hidden");
            else $(".supplier-table").removeClass("hidden");
            for(var i = 0 ; i < len ;i++){
                if(allItem[id]['supplier'][i]['price_per_unit'] == null)
                    var price_per_unit = '-';
                else
                    var price_per_unit = allItem[id]['supplier'][i]['price_per_unit'];

                if(allItem[id]['supplier'][i]['unit'] == null)
                    var unit = '-';
                else
                    var unit = allItem[id]['supplier'][i]['unit'];

                var tmp = '<tr class="modal-item-tuple">'
                            +'<td style="min-width: 50px; max-width: 50px;">'+(i+1)+'</td>'
                            +'<td style="min-width: 100px; max-width: 100px;">'+allItem[id]['supplier'][i]['name']+'</td>'
                            +'<td style="min-width: 400px; max-width: 400px;">'+allItem[id]['supplier'][i]['address']+'</td>'
                            +'<td style="min-width: 110px; max-width: 110px;">'+allItem[id]['supplier'][i]['phone_no']+'</td>'
                            +'<td style="min-width: 110px; max-width: 110px;">'+price_per_unit+'</td>'
                            +'<td style="min-width: 99px; max-width: 99px;">'+unit+'</td>'
                        +'</tr>';
                $(".modal-item-table-body").append(tmp);
            }
//            $("#item-store").text(allItem[id]['inv_id']);
//            $("#item-store-address").text(allItem[id]['inv_id']);
//            $("#item-store-tel").text(allItem[id]['inv_id']);

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
            if(allItem[id]['remain_qty'] == 0){
                _toastr("ขออภัย พัสดุหมด", "top-right", "warning", false);
                return;
            }

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
            _toastr("เพิ่มพัสดุนี้ในรายการยืมแล้ว", "top-right", "success", false);
        }

        //modalItemEdit
        function reload(){
            changePageTo(nowPage);
        }
        // File Handling
        var  $imageEdit=$('#cropping-area-edit');
        var $imageWrapperEdit = $('#cropping-wrapper-edit');
        function handleFileSelectEdit(evt) {
            var f = evt.target.files[0];
            if (!f.type.match('image.*')) {
                return false;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    $imageEdit.cropper('replace',e.target.result);
                }
            })(f);
            reader.readAsDataURL(f);
        };
        var croppedInputEdit=$('#edit-item-pic-cropped');
        $('#edit-item-pic-input').on('change',function(e){
            $imageEdit.cropper({
                aspectRatio: 4 / 3,
                autoCropArea: 1.0,
                cropend: function() {
                    croppedInputEdit.val(($imageEdit.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                },
                built: function () {
                    croppedInputEdit.val(($imageEdit.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                }
            });
            handleFileSelectEdit(e);
//            $imageEdit.removeClass('hidden');
            $imageWrapperEdit.css('margin-bottom','15px');
        });
        $('#editItemAddShop').click(function (){
            var sequenceNumber2=parseInt($('.edit-item-store-tuple-sequence').last().text())+1;
            $('#edit-item-store-table').removeClass('hidden');
            $('#edit-store-table-body').append('<tr class="modal-item-tuple ">'+
                    '<td class="remove-button-col text-center">'+
                    '<a id="" class="delete-edit-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบร้านนี้">'+
                    '<i class="fa fa-minus"></i>'+
                    '<i class="fa fa-trash"></i>'+
                    '</a>'+
                    '</td>'+
                    '<td class="edit-item-store-tuple-sequence">'+sequenceNumber2+'</td>'+
                    '<td>'+ $( "#edit-item-store option:selected" ).text() +'</td><input type="hidden" name="editItemStore[]" class="form-control" value="'+ $( "#edit-item-store" ).val() +'">'+
                    '<td>'+ $('#edit-item-price_per_unit').val() +'</td><input type="hidden" name="editItemStorePrice[]" class="form-control" value="'+ $('#edit-item-price_per_unit').val() +'">'+
                    '<td>'+ $('#edit-item-store-unit').val() +'</td><input type="hidden" name="editItemStoreUnit[]" class="form-control" value="'+ $('#edit-item-store-unit').val() +'">'+
                    '</tr>'
            );
        });
        $(document).on('click','.delete-edit-tuple',function(){
            $(this).closest('tr').remove();
            var i=1;
            $('.edit-item-store-tuple-sequence').each(function(){
                $(this).html(i);
                i++;
            });
        });
        $('#modalItemEdit').on('hidden.bs.modal', function () {
            $('#edit-store-table-body').html('');
            $('#edit-item-store-table').addClass('hidden');
            $('#edit-item-pic-name').val('');
            $imageEdit.cropper('destroy');
            $imageEdit.attr('src','');
//            $imageEdit.addClass('hidden');
            $imageWrapperEdit.css('margin-bottom','0px');
        }).on('shown.bs.modal', function () {

        });
        function openModalItemEdit(event,id){
            event.preventDefault();
            $("#cropping-area-edit").attr('src',allItem[id]['image']);
            $imageEdit.cropper({
                aspectRatio: 4 / 3,
                autoCropArea: 1.0,
                cropend: function() {
                    croppedInputEdit.val(($imageEdit.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                },
                built: function () {
                    croppedInputEdit.val(($imageEdit.cropper("getCroppedCanvas",{
                        width: 400,
                        height: 300
                    })).toDataURL());
                }
            });
            $("#edit-item-id").text(allItem[id]['inv_id']);
            $("#edit-item-id-input").val(allItem[id]['inv_id']);
            $("#edit-item-name").val(allItem[id]['name']);
            if(allItem[id]['type']=='' || allItem[id]['type']==null){
                $('#edit-item-type').select2("val", '0');
            } else {
            $('#edit-item-type').select2("val", allItem[id]['type']);
            }
            $("#edit-item-total_qty").val(allItem[id]['total_qty']);
            $("#edit-item-broken_qty").val(allItem[id]['broken_qty']);
            $("#edit-item-remain").val(allItem[id]['remain_qty']);
            $("#edit-item-unit").val(allItem[id]['unit']);
            $("#edit-item-price-per-unit").val(allItem[id]['price_per_unit']);

            var len = allItem[id]['supplier'].length;
            if(len!=0){
                $('#edit-item-store-table').removeClass('hidden');
                for(var i = 0 ; i < len ;i++) {
                    if (allItem[id]['supplier'][i]['price_per_unit'] == null)
                        var price_per_unit = '-';
                    else
                        var price_per_unit = allItem[id]['supplier'][i]['price_per_unit'];

                    if (allItem[id]['supplier'][i]['unit'] == null)
                        var unit = '-';
                    else
                        var unit = allItem[id]['supplier'][i]['unit'];

                    var tmp = '<tr class="modal-item-tuple">'+
                    '<td class="remove-button-col text-center">'+
                    '<a id="" class="delete-edit-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบร้านนี้">'+
                    '<i class="fa fa-minus"></i>'+
                    '<i class="fa fa-trash"></i>'+
                    '</a>'+
                    '</td>'
                            + '<td class="edit-item-store-tuple-sequence">' + (i + 1) + '</td>'
                            + '<td >' + allItem[id]['supplier'][i]['name'] + '</td><input type="hidden" name="editItemStore[]" class="form-control" value="'+ allItem[id]['supplier'][i]['supplier_id'] +'">'
                            + '<td >' + price_per_unit + '</td><input type="hidden" name="editItemStorePrice[]" class="form-control" value="'+ price_per_unit +'">'
                            + '<td >' + unit + '</td><input type="hidden" name="editItemStoreUnit[]" class="form-control" value="'+ unit +'">'
                            + '</tr>';
                    $("#edit-store-table-body").append(tmp);
                }
            }

            $('#modalItemEdit').modal('show');
        }
        function confirmEditItem(id){
            //ajax post to edit
            alert('edit'+id);
        }

        //removeItem
        function toggleShowItem(event,id){
            event.preventDefault();
//            $("#modalRemoveItem").modal("show");
//            $("#item-confirm-remove-button").attr("onclick","confirmRemoveItem("+id+")");
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/supplies/toggle_show_item',
                    {data:  id, _token: '{{csrf_token()}}'}).done(function (input) {
                if(input=='hide_success'){
                    _toastr("ซ่อนพัสดุสำเร็จ","top-right","success",false);
                    changePageTo(nowPage);
                    return false;
                }
                else if(input=='show_success'){
                    _toastr("แสดงพัสดุสำเร็จ","top-right","success",false);
                    changePageTo(nowPage);
                    return false;
                }
                else if(input=='noright'){
                        _toastr("คุณไม่มีสิทธิทำรายการนี้","top-right","error",false);
                        return false;
                    }
                else {
                        _toastr("ผิดพลาด! กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                        return false;
                    }
                }
            );
        }
        function confirmRemoveItem(id){
            //ajax post to delete
            alert('remove'+id);
        }

        //autoSuggest
        $('#searchInventory').keyup(function(){
            $('.typeahead').typeahead('destroy');
            $('.autosuggest').attr('data-queryURL','{!! url('supplies/auto_suggest?limit=10&search=') !!}'+$(this).val());
            _autosuggest();
            $(this).trigger( "focus" );
        });
        $('#searchInventory').keypress(function(e){
            if(e.keyCode == 13)
                searchCountInventory(1);
//                changePageTo(1);
        });

        function searchCountInventory(page){
            var word = $("#searchInventory").val();

            $.post("{{url('supplies/search_count')}}",
                    {word:word, _token:'{{csrf_token()}}'  } ).done(function( input ) {
//                alert(input);
                nowPage = page;
                itemAmount = input;
                pageAll = Math.ceil(itemAmount / 12);
                updatePagination();
                changePageTo(page);
            });

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
                /*itemAmount = input['count'];
                pageAll = Math.ceil(itemAmount / 12);
                updatePagination();*/

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
                    @if($user['supplies'])
                        var icon = (allItem[tmp]['isVisible']==1)?'fa-eye-slash':'fa-eye';
                        var hideOrShowTitle = (allItem[tmp]['isVisible']==1)?'ซ่อนพัสดุนี้':'แสดงพัสดุนี้';
                        var tranparentClass = (allItem[tmp]['isVisible']==1)?'':'item-transparent';
                        var tranparentClassMain = (allItem[tmp]['isVisible']==1)?'':'each-item-transparent';
                    @endif
//                    alert(input[tmp]['name']);
                    var txt = '<li class="col-lg-3 col-sm-3 each-item @if($user['supplies']) '+tranparentClassMain+'   @endif">'

                            + '<div class="shop-item">'

                            + '<div class="thumbnail" >'
                            + '<a class="shop-item-image @if($user['supplies']) '+tranparentClass+'   @endif" data-toggle="modal" data-target="#modalItem" onclick="openModalItem(' + allItem[tmp]['inv_id'] + ')">'
                            + '<img class="img-responsive" src="' + allItem[tmp]['image'] + '" alt="shop hover image" style="width: 100%;">'
                            + '</a>'

                            + '<div class="shop-option-over" style="opacity: 1 !important;">'
                            @if($user['supplies'])           + '<a data-original-title="แก้ไขพัสดุนี้" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="openModalItemEdit(event,' + allItem[tmp]['inv_id'] + ')"><i class="fa fa-edit nopadding"></i></a>'
                            + '<a data-original-title="'+hideOrShowTitle+'" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" onclick="toggleShowItem(event,' + allItem[tmp]['inv_id'] + ')"><i class="fa '+ icon +' nopadding"></i></a>'
                            @endif

                            + '</div>';
                    if(allItem[tmp]['remain_qty'] == 0){
                        txt = txt + '<div class="shop-item-info">'
                            +'<span class="label label-danger">หมด</span>'
                            +'</div>';
                    }
                        txt = txt   +'</div>'

                                    +'<div class="shop-item-summary text-center">'
                                        +'<h2>'+allItem[tmp]['name']+'</h2>'
                                    +'</div>'

                                    +'<div class="amount text-center @if($user['supplies']) '+tranparentClass+'   @endif">'
                                        +'<div style="width: 50%; display: inline-block">'
                                            +'<input id="item-input-amount-'+allItem[tmp]['inv_id']+'" type="text" value="" min="0" class="form-control stepper2 required">'
                                        +'</div>'
                                        +' '+allItem[tmp]['unit']
                                    +'</div>'

                                    +'<div class="shop-item-buttons text-center @if($user['supplies']) '+tranparentClass+'   @endif">'
                                        +'<a class="btn btn-default" onclick="addToCart('+allItem[tmp]['inv_id']+')"><i class="fa fa-cart-plus"></i> Add to Cart</a>'
                                    +'</div>'
                                +'</div>'
                            +'</li>';
                    $('.shop-item-list').append(txt);
                }
                jQuery("a[data-toggle=tooltip], button[data-toggle=tooltip], span[data-toggle=tooltip]").tooltip();
//                if(firstTime) {
//                    myStepper(2);
//                }
//                else
//                    firstTime = false;
                setTimeout(step, 80);
//                step();
            });

        }

        function step(){
            myStepper(2);
        }

        var cartItemAmount = 0;
        var stepperN = 2;
        function addToCart(id){
//            alert(id);
            var inv_id = allItem[id]['inv_id'];
            var check = checkDuplicateItemInCart(inv_id);
            if(!check) return;
            if(allItem[id]['remain_qty'] == 0){
                _toastr("ขออภัย พัสดุหมด", "top-right", "warning", false);
                return;
            }

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
            _toastr("เพิ่มพัสดุนี้ในรายการยืมแล้ว", "top-right", "success", false);
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