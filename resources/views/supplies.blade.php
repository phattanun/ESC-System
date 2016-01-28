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

    <section>
        <div class="container">

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
@endsection

@section('js')
    <script type="text/javascript" src="{{url('assets/js/view/demo.shop.js')}}"></script>
@endsection