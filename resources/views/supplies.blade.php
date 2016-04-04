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

                <div class="modal-body" style="border-top: 1px solid #e5e5e5;">
                    <label>โครงการ</label>
                    <div id="inListActivity">
                        <select name="project" class="form-control select2 required" id="project-selection">
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
                            <input required id="otherAct" name="otherAct" type="text" class="form-control"
                                   placeholder="ระบุโครงการ / กิจกรรมของคุณ">
                        </div>
                        <div class="pull-right" onclick="backToActicityList()">
                            <a id="back-to-activity" class="underline-hover">กลับไปยังลิสต์รายการเดิม</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-3 col-xs-6"  style="margin-top: 5px;">
                            <label>รายละเอียด</label>
                        </div>
                        <div class="col-md-12 col-sm-10 col-xs-12">
                            <textarea name="" rows="4" class="form-control required"></textarea>
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
                        <div class="col-md-1 col-sm-2 col-xs-3">
                            <label><b>โครงการ</b></label>
                        </div>
                        <div class="col-md-11 col-sm-9 col-xs-9">
                            งานชั้นปี
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
                                <th class="width-100">วันที่ยืม</th>
                                <th class="width-100">วันที่คืน</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                                <td>12-03-2559</td>
                                <td>16-03-2559</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร</td>
                                <td>10 อัน</td>
                                <td>12-03-2559</td>
                                <td>16-03-2559</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>ไม้หน้า3 ยาว 36 เมตร เนื้อดีเป็นพิเศษ เหมาะสำหรับการทำเสลี่ยงให้กลุ่มตัวแทนนิสิตแห่งจุฬาลงกรณ์มหาวิทยาลัย</td>
                                <td>10 อัน</td>
                                <td>12-03-2559</td>
                                <td>16-03-2559</td>
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
                <div class="col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">

                    <!-- LIST OPTIONS -->
                    <div class="clearfix shop-list-options margin-bottom-20">

                        <ul class="pagination nomargin pull-right">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">»</a></li>
                        </ul>

                        <div class="options-left">
                            <select>
                                <option value="pos_asc">Position ASC</option>
                                <option value="pos_desc">Position DESC</option>
                                <option value="name_asc">Name ASC</option>
                                <option value="name_desc">Name DESC</option>
                                <option value="price_asc">Price ASC</option>
                                <option value="price_desc">Price DESC</option>
                            </select>

                            <a class="btn active fa fa-th" href="shop-4col-left.html"><!-- grid --></a>
                            <a class="btn fa fa-list" href="shop-1col-left.html"><!-- list --></a>
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
                                            <div style="width:100%; height: 287.797px; background-image: url({{$inventory['image']}})"></div>
                                            <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                                        </a>
                                        <!-- /product image(s) -->

                                        <!-- hover buttons -->
                                        <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                            <!--a data-original-title="Add To Wishlist" class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-heart nopadding"></i></a>
                                            <a data-original-title="Add To Compare" class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title=""><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a-->
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
                                        <div class="shop-item-rating-line">
                                            <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                        </div>
                                        <!-- /rating -->

                                        <!-- price -->
                                        <div class="shop-item-price">
                                            <span class="line-through">$98.00</span>
                                            ${{$inventory['prive_per_unit']}}
                                        </div>
                                        <!-- /price -->
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


                <!-- LEFT -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-pull-9 col-md-pull-9 col-sm-pull-9">

                    <!-- CATEGORIES -->
                    <div class="side-nav margin-bottom-60">

                        <div class="side-nav-head">
                            <button class="fa fa-bars"></button>
                            <h4>CATEGORIES</h4>
                        </div>

                        <ul class="list-group list-group-bordered list-group-noicon uppercase">
                            <li class="list-group-item active">
                                <a class="dropdown-toggle" href="#">WOMEN</a>
                                <ul>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(123)</span> Shoes &amp; Boots</a></li>
                                    <li class="active"><a href="#"><span class="size-11 text-muted pull-right">(331)</span> Top &amp; Blouses</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(234)</span> Dresses &amp; Skirts</a></li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="#">MEN</a>
                                <ul>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Accessories</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(67)</span> Shoes &amp; Boots</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(32)</span> Dresses &amp; Skirts</a></li>
                                    <li class="active"><a href="#"><span class="size-11 text-muted pull-right">(78)</span> Top &amp; Blouses</a></li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="#">JEWELLERY</a>
                                <ul>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(23)</span> Dresses &amp; Skirts</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(34)</span> Shoes &amp; Boots</a></li>
                                    <li class="active"><a href="#"><span class="size-11 text-muted pull-right">(21)</span> Top &amp; Blouses</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Accessories</a></li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a class="dropdown-toggle" href="#">KIDS</a>
                                <ul>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(88)</span> Shoes &amp; Boots</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(22)</span> Dresses &amp; Skirts</a></li>
                                    <li><a href="#"><span class="size-11 text-muted pull-right">(31)</span> Accessories</a></li>
                                    <li class="active"><a href="#"><span class="size-11 text-muted pull-right">(18)</span> Top &amp; Blouses</a></li>
                                </ul>
                            </li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(189)</span> ACCESSORIES</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(61)</span> GLASSES</a></li>

                        </ul>

                    </div>
                    <!-- /CATEGORIES -->

                    <!-- SIZE -->
                    <div class="margin-bottom-60">
                        <h4>SIZE</h4>

                        <a class="tag" href="#">
                            <span class="txt">S</span>
                        </a>
                        <a class="tag" href="#">
                            <span class="txt bold">M</span>
                        </a>
                        <a class="tag" href="#">
                            <span class="txt">L</span>
                        </a>
                        <a class="tag" href="#">
                            <span class="txt">XL</span>
                        </a>
                        <a class="tag" href="#">
                            <span class="txt">2XL</span>
                        </a>
                        <a class="tag" href="#">
                            <span class="txt">3XL</span>
                        </a>

                        <hr>

                        <div class="clearfix size-12">
                            <a class="pull-right glyphicon glyphicon-remove" href="#"></a>
                            SELECTED SIZE: <strong>M</strong>
                        </div>
                    </div>
                    <!-- /SIZE -->


                    <!-- COLOR -->
                    <div class="margin-bottom-60">
                        <h4>COLOR</h4>

                        <a class="tag shop-color" href="#" style="background-color:#000000"></a>
                        <a class="tag shop-color" href="#" style="background-color:#FFFFFF"></a>
                        <a class="tag shop-color" href="#" style="background-color:#C0C0C0"></a>
                        <a class="tag shop-color" href="#" style="background-color:#0000E0"></a>
                        <a class="tag shop-color" href="#" style="background-color:#800080"></a>
                        <a class="tag shop-color" href="#" style="background-color:#FF0000"></a>
                        <a class="tag shop-color" href="#" style="background-color:#FF0080"></a>
                        <a class="tag shop-color" href="#" style="background-color:#FF6600"></a>
                        <a class="tag shop-color" href="#" style="background-color:#E0DCC8"></a>
                        <a class="tag shop-color" href="#" style="background-color:#F0E68C"></a>
                        <a class="tag shop-color" href="#" style="background-color:#FFFFD0"></a>
                        <a class="tag shop-color" href="#" style="background-color:#4B0082"></a>
                        <a class="tag shop-color" href="#" style="background-color:#666666"></a>
                        <a class="tag shop-color" href="#" style="background-color:#00FF00"></a>
                        <a class="tag shop-color" href="#" style="background-color:#36454F"></a>
                        <a class="tag shop-color" href="#" style="background-color:#F4A460"></a>
                        <a class="tag shop-color" href="#" style="background-color:#0088CC"></a>
                        <a class="tag shop-color" href="#" style="background-color:#B38B6D"></a>

                        <hr>

                        <div class="clearfix size-12">
                            <a class="pull-right glyphicon glyphicon-remove" href="#"></a>
                            SELECTED COLOR: <strong>Red</strong>
                        </div>
                    </div>
                    <!-- /COLOR -->


                    <!-- BRANDS -->
                    <div class="side-nav margin-bottom-60">

                        <div class="side-nav-head">
                            <button class="fa fa-bars"></button>
                            <h4>BRANDS</h4>
                        </div>

                        <ul class="list-group list-unstyled">
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(21)</span> Armani</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(44)</span> Nike</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(2)</span> Jolidon</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(18)</span> Ralph Lauren</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(87)</span> Lotto</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(32)</span> Fila</a></li>
                            <li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(69)</span> Boss</a></li>
                        </ul>

                    </div>
                    <!-- BRANDS -->


                    <!-- BANNER ROTATOR -->
                    <div style="opacity: 1; display: block;" class="owl-carousel buttons-autohide controlls-over margin-bottom-60 text-center owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;autoPlay&quot;: 4000, &quot;navigation&quot;: true, &quot;pagination&quot;: false, &quot;transitionStyle&quot;:&quot;goDown&quot;}">
                        <div class="owl-wrapper-outer"><div style="width: 1052px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(-263px, 0px, 0px); perspective-origin: 394.5px 50%;" class="owl-wrapper"><div style="width: 263px;" class="owl-item"><a href="#">
                                        <img class="img-responsive" src="assets/images/demo/shop/banners/off_1.png" alt="" height="350" width="270">
                                    </a></div><div style="width: 263px;" class="owl-item"><a href="#">
                                        <img class="img-responsive" src="assets/images/demo/shop/banners/off_2.png" alt="" height="350" width="270">
                                    </a></div></div></div>

                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>
                    <!-- /BANNER ROTATOR -->


                    <!-- FEATURED -->
                    <div class="margin-bottom-60">

                        <h2 class="owl-featured">FEATURED</h2>
                        <div style="opacity: 1; display: block;" class="owl-carousel featured owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;stopOnHover&quot;:false, &quot;autoPlay&quot;:false, &quot;autoHeight&quot;: false, &quot;navigation&quot;: true, &quot;pagination&quot;: false}">

                            <div class="owl-wrapper-outer"><div style="width: 1052px; left: 0px; display: block;" class="owl-wrapper"><div style="width: 263px;" class="owl-item"><div><!-- SLIDE 1 -->
                                            <ul class="list-unstyled nomargin nopadding text-left">

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p10.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-12" href="#">Long Grey Dress - Special</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$132.00</div>
                                                </li><!-- /item -->

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p2.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-1" href="#">Black Fashion Hat</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$65.00</div>
                                                </li><!-- /item -->

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p13.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-1" href="#">Cotton 100% - Pink Dress</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$77.00</div>
                                                </li><!-- /item -->

                                            </ul>
                                        </div></div><div style="width: 263px;" class="owl-item"><div><!-- SLIDE 2 -->
                                            <ul class="list-unstyled nomargin nopadding text-left">

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p12.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-12" href="#">Long Grey Dress - Special</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$132.00</div>
                                                </li><!-- /item -->

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p6.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-1" href="#">Black Fashion Hat</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$65.00</div>
                                                </li><!-- /item -->

                                                <li class="clearfix"><!-- item -->
                                                    <div class="thumbnail featured clearfix pull-left">
                                                        <a href="#">
                                                            <img src="assets/images/demo/shop/products/100x100/p14.jpg" alt="featured item" height="80" width="80">
                                                        </a>
                                                    </div>

                                                    <a class="block size-1" href="#">Cotton 100% - Pink Dress</a>
                                                    <div class="rating rating-4 size-13 width-100 text-left"><!-- rating-0 ... rating-5 --></div>
                                                    <div class="size-18 text-left">$77.00</div>
                                                </li><!-- /item -->

                                            </ul>
                                        </div></div></div></div><!-- /SLIDE 1 -->

                            <!-- /SLIDE 2 -->

                            <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>

                    </div>
                    <!-- /FEATURED -->


                    <!-- HTML BLOCK -->
                    <div class="margin-bottom-60">
                        <h4>HTML BLOCK</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus eunit.</p>

                        <form action="#" role="form" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="email" name="email" class="form-control required" placeholder="Enter your Email" type="email">
										<span class="input-group-btn">
											<button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-send"></i></button>
										</span>
                            </div>
                        </form>

                    </div>
                    <!-- /HTML BLOCK -->

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

        .underline-hover {
            font-size: 14px;
        }

        .underline-hover:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('assets/js/view/demo.shop.js')}}"></script>
    <script>
        function otherActivity(){
            $('#inListActivity').addClass('hidden');
            $('#otherActivity').removeClass('hidden');
        }
        function backToActicityList(){
            $('#inListActivity').removeClass('hidden');
            $('#otherActivity').addClass('hidden');
        }
        function submitCartButton(){
//            alert();
            $('#modalCart').addClass('hidden');
//            $('#modalCartSuccess').modal('show');
            document.getElementById("submitCartButton").click();
        }
        function finishCart(){
            $('#modalCart').removeClass('hidden');
            $('#modalCart').modal('hidden');
            $('#modalCartSuccess').modal('hidden');
//            alert("aa");
        }
        $("#modalCartSuccess").focusout(function(){
//            alert();
            finishCart();
        });

        function openModalItem(id){
            alert(id);
        }

        function addToCart(id){
            alert(id);
            {{--alert({{$inventory[0]['name']}});--}}
        }
    </script>
@endsection