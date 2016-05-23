@extends('masterpage')

@section('title')
    ลงทะเบียน
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('bodyTitle')
    ลงทะเบียน
@endsection

@section('bodyTitle-attribute')

@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">ข้อมูลนิสิต</h2>
                    </div>
                    <div class="panel-body">
                        <form class="validate" action="{{url().'/register'}}" method="post"
                              enctype="multipart/form-data" data-success="ลงทะเบียนสำเร็จ<script>window.location='{{url()}}';</script>"
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
                                            <label>คำนำหน้าชื่อ *</label>
                                            <div class="autosuggest" data-autoload="false">
                                                <input type="text" name="title" value="{{$user['title']}}" placeholder="นาย, นางสาว" class="form-control typeahead" />
                                            </div>
                                        </div>
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
                                                   data-placeholder="_" value="@if($user['birthdate']!='0000-00-00'){{$user['birthdate']}}@endif" placeholder="ปปปป-ดด-วว">
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
                                            <label>ขนาดเสื้อ (ความยาวรอบอก หน่วยเป็นนิ้ว)</label>
                                            <select name="size" class="form-control select2">
                                                        <option @if($user['clothing_size']=="< 24")selected="selected" @endif value="< 24">< 24</option>
                                                @for($i=24;$i<=52;$i++)
                                                        <option @if($user['clothing_size']==$i)selected="selected" @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                                        <option  @if($user['clothing_size']=="> 52")selected="selected" @endif value="> 52">> 52</option>
                                            </select>
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
                                                class="fa fa-check"></i>บันทึก
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
    <script>
        loadScript(plugin_path + 'typeahead.bundle.js', function() {
            var title = ['นาย', 'นางสาว', 'นาง', 'พลตำรวจเอก', 'พลตำรวจเอก หญิง',
                'พลตำรวจโท', 'พลตำรวจโท หญิง', 'พลตำรวจตรี', 'พลตำรวจตรี หญิง', 'พันตำรวจเอก', 'พันตำรวจเอก หญิง',
                'พันตำรวจเอกพิเศษ', 'พันตำรวจเอกพิเศษ หญิง', 'พันตำรวจโท', 'พันตำรวจโท หญิง', 'พันตำรวจตรี', 'พันตำรวจตรี หญิง', 'ร้อยตำรวจเอก',
                'ร้อยตำรวจเอก หญิง', 'ร้อยตำรวจโท', 'ร้อยตำรวจตรี หญิง', 'นายดาบตำรวจ', 'ดาบตำรวจหญิง',
                'สิบตำรวจเอก', 'สิบตำรวจเอก หญิง', 'สิบตำรวจโท', 'สิบตำรวจโท หญิง', 'สิบตำรวจตรี', 'สิบตำรวจตรี หญิง',
                'จ่าสิบตำรวจ', 'จ่าสิบตำรวจ หญิง', 'พลตำรวจ', 'พลตำรวจ หญิง', 'พลเอก',
                'พลเอก หญิง', 'พลโท', 'พลโท หญิง', 'พลตรี', 'พลตรี หญิง',
                'พันเอก', 'พันเอก หญิง', 'พันเอกพิเศษ', 'พันเอกพิเศษ หญิง', 'พันโท', 'พันโท หญิง',
                'พันตรี', 'พันตรี หญิง', 'ร้อยเอก', 'ร้อยเอก หญิง', 'ร้อยโท',
                'ร้อยโท หญิง', 'ร้อยตรี', 'ร้อยตรี หญิง', 'สิบเอก', 'สิบเอก หญิง', 'สิบโท',
                'สิบโท หญิง', 'สิบตรี', 'สิบตรี หญิง', 'จ่าสิบเอก', 'จ่าสิบเอก หญิง', 'จ่าสิบโท',
                'จ่าสิบโท หญิง', 'จ่าสิบตรี', 'จ่าสิบตรี หญิง', 'พลทหารบก', 'ว่าที่พันตรี', 'ว่าที่พันตรี หญิง',
                'ว่าที่ร้อยเอก', 'ว่าที่ร้อยเอก หญิง', 'ว่าที่ร้อยโท', 'ว่าที่ร้อยโท หญิง', 'ว่าที่ร้อยตรี', 'ว่าที่ร้อยตรี หญิง',
                'พลเรือเอก', 'พลเรือเอก หญิง', 'พลเรือโท', 'พลเรือโท หญิง', 'พลเรือตรี', 'พลเรือตรี หญิง',
                'นาวาเอก', 'นาวาเอก หญิง', 'นาวาเอกพิเศษ', 'นาวาเอกพิเศษ หญิง', 'นาวาโท', 'นาวาโท หญิง',
                'นาวาตรี', 'นาวาตรี หญิง', 'เรือเอก', 'เรือเอก หญิง', 'เรือโท', 'เรือโท หญิง',
                'เรือตรี', 'เรือตรี หญิง', 'พันจ่าเอก', 'พันจ่าเอก หญิง', 'พันจ่าโท', 'พันจ่าโท หญิง',
                'พันจ่าตรี', 'พันจ่าตรี หญิง', 'จ่าเอก', 'จ่าเอก หญิง', 'จ่าโท', 'จ่าโท หญิง',
                'จ่าตรี', 'จ่าตรี หญิง', 'พลทหารเรือ', 'พลอากาศเอก', 'พลอากาศเอก หญิง', 'พลอากาศเอก หญิง',
                'พลอากาศโท', 'พลอากาศโท หญิง', 'พลอากาศตรี', 'พลอากาศตรี หญิง', 'นาวาอากาศเอก', 'นาวาอากาศเอก หญิง',
                'นาวาอากาศเอกพิเศษ', 'นาวาอากาศเอกพิเศษ หญิง', 'นาวาอากาศโท', 'นาวาอากาศโท หญิง', 'นาวาอากาศตรี', 'นาวาอากาศตรี หญิง',
                'เรืออากาศเอก', 'เรืออากาศเอก หญิง', 'เรืออากาศโท', 'เรืออากาศโท หญิง', 'เรืออากาศตรี', 'เรืออากาศตรี หญิง',
                'พันจ่าอากาศเอก', 'พันจ่าอากาศเอก หญิง', 'พันจ่าอากาศโท', 'พันจ่าอากาศโท หญิง', 'พันจ่าอากาศตรี', 'พันจ่าอากาศตรี หญิง',
                'จ่าอากาศเอก', 'จ่าอากาศเอก หญิง', 'จ่าอากาศโท', 'จ่าอากาศโท หญิง', 'จ่าอากาศตรี', 'จ่าอากาศตรี หญิง',
                'พลทหารอากาศ', 'หม่อม', 'หม่อมเจ้า', 'หม่อมราชวงศ์', 'ดอกเตอร์', 'ศาสตราจารย์ดอกเตอร์',
                'ศาสตราจารย์', 'ผู้ช่วยศาสตราจารย์ดอกเตอร์', 'ผู้ช่วยศาสตราจารย์', 'รองศาสตราจารย์ดอกเตอร์', 'รองศาสตราจารย์', 'นายแพทย์',
                'แพทย์หญิง', 'สัตวแพทย์', 'สัตวแพทย์หญิง', 'ทันตแพทย์', 'ทันตแพทย์หญิง', 'เภสัชกร',
                'พระ', 'พระครู', 'พระสมุห์', 'พระอธิการ', 'สามเณร', 'แม่ชี',
                'บาทหลวง'
            ];
            var name_title = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: title
            });
            $('.typeahead').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'name_title',
                        source: name_title
                    });
        });
        document.querySelector('#registerBtn').addEventListener("click", function () {
            window.btn_clicked = true;
        });
        window.onbeforeunload = function () {
            if (!window.btn_clicked)return 'กรุณายืนยันข้อมูลเพื่อลงทะเบียน';
        };
    </script>
@endsection
