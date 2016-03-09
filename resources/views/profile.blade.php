@extends('masterpage')

@section('title')
    ข้อมูลส่วนตัว
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    ข้อมูลส่วนตัว
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-transparent">
                        <h2 class="panel-title">ข้อมูลนิสิต</h2>
                    </div>
                    <div class="panel-body">
                        <form class="validate" action="{{url().'/register'}}" method="post"
                              enctype="multipart/form-data" data-success="แก้ไขข้อมูลสำเร็จ<script>window.location='{{url()}}';</script>"
                              data-toastr-position="top-right">
                            <fieldset>
                                <!-- required [php action request] -->
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label>รหัสนิสิต <span class="text-blue">{{$user['student_id']}}</span></label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>คณะ <span class="text-blue">วิศวกรรมศาสตร์</span></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ชื่อ *</label>
                                            <input name="name" value="{{$user['name']}}" class="form-control required"
                                                   type="text">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>นามสกุล *</label>
                                            <input name="surname" value="{{$user['surname']}}"
                                                   class="form-control required"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ชื่อเล่น *</label>
                                            <input name="nickname" value="{{$user['nickname']}}" class="form-control required"
                                                   type="text">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>วันเกิด (ใช้ปีพุทธศักราช) *</label>
                                            <input  name="birthdate" type="text" class="form-control masked" data-format="9999-99-99"
                                                    data-placeholder="_" value="{{$user['birthdate']}}" placeholder="ปปปป-ดด-วว">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ศาสนา *</label>
                                            <input name="religion" value="{{$user['religion']}}" class="form-control required"
                                                   type="text">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>กรุ๊ปเลือด</label>
                                            <input name="blood" value="{{$user['blood_type']}}" class="form-control"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ภาควิชา *</label>
                                            <select name="department" class="form-control select2 required">
                                                @foreach($department as $departments)
                                                    @if($departments['div_id']==$user['department'])
                                                        <option selected="selected" value="{{$departments['div_id']}}">{{$departments['name']}}</option>
                                                    @else
                                                        <option value="{{$departments['div_id']}}">{{$departments['name']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>กรุ๊ป *</label>
                                            <select name="group" class="form-control select2 required">
                                                @foreach($group as $groups)
                                                    @if($groups['div_id']==$user['group'])
                                                        <option selected="selected" value="{{$groups['div_id']}}">{{$groups['name']}}</option>
                                                    @else
                                                        <option value="{{$groups['div_id']}}">{{$groups['name']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>อีเมล์ *</label>
                                            <input name="email" value="{{$user['email']}}" class="form-control required"
                                                   type="email" placeholder="example@example.com">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>เบอร์โทรศัพท์มือถือ *</label>

                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-phone-square"></i>
                                                <!-- replace here any input from below if you want fancy style (icon + tooltip) -->
                                                <input name="phone"  type="text" value="{{$user['phone_number']}}" class="form-control masked"
                                                       data-format="(999) 999-9999" data-placeholder="X"
                                                       placeholder="(08X) XXX-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ที่อยู่ *</label>
                                            <input name="address" value="{{$user['address']}}" class="form-control required"
                                                   type="text">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>เบอร์ติดต่อกรณีฉุกเฉิน *</label>

                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-phone-square"></i>
                                                <!-- replace here any input from below if you want fancy style (icon + tooltip) -->
                                                <input  name="emergency" type="text" class="form-control" value="{{$user['emergency_contact']}}"
                                                        placeholder="(08X) XXX-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>โรคประจำตัว</label>
                                            <input name="anomaly" value="{{$user['anomaly']}}" class="form-control"
                                                   type="text" placeholder="เช่น ภูมิแพ้ฝุ่น">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>อาหารที่แพ้</label>
                                            <input  name="allergy" value="{{$user['allergy']}}" class="form-control"
                                                    type="text" placeholder="เช่น อาหารทะเล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>ขนาดเสื้อ</label>
                                            <input name="size" value="{{$user['clothing_size']}}" class="form-control"
                                                   type="text" placeholder="เช่น S M L XL XXL">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6">
                                            <label>Facebook</label>
                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-facebook"></i>
                                                <input name="facebook" type="text" class="form-control" value="{{$user['facebook_link']}}"
                                                       placeholder="www.facebook.com/example/">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Line</label>
                                            <input name="line" value="{{$user['line_id']}}" class="form-control"
                                                   type="text" placeholder="ไลน์ ID ของคุณ">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row text-center">
                                <button type="submit" id="registerBtn" class="btn  btn-lg btn-success"><i
                                            class="fa fa-check"></i>แก้ไขข้อมูล
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Useful Elements -->
            </div>
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('js')
@endsection
