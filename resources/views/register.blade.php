@extends('masterpage')

@section('title')
    ลงทะเบียน
@endsection

@section('body-attribute')
    style ="background-color:#222;"
@endsection

@section('bodyTitle')
    ลงทะเบียน
@endsection
@section('bodyTitle-attribute')
    style ="color:#FFF;font-weight:bold;"
@endsection

@section('content')
  <div class="container" style="margin-top:50px;margin-bottom:50px;">
    <form action="{{url().'/register'}}" method="post" id="">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
      <div class="row col-sm-offset-2">
          <div class="form-group col-md-2 col-sm-5">
            <label class="control-label">รหัสนิสิต</label>
            <p class="form-control-static col-xs-offset-1" name="faculty">{{$user['student_id']}}</p>
          </div>
          <div class="form-group col-md-4 col-sm-5">
            <label class="control-label">ชื่อ</label>
            <input class="form-control" name="name"    type="text" placeholder="ชื่อ" value="{{$user['name']}}">
          </div>
          <div class="form-group col-md-4 col-sm-5">
            <label class="control-label" >นามสกุล</label>
            <input class="form-control" name="surname" type="text" placeholder="นามสกุล" value="{{$user['surname']}}">
          </div>
      </div>

      <div class="row col-sm-offset-2">
          <div class="form-group col-md-3 col-sm-3">
            <label class="control-label" >ชื่อเล่น</label>
            <input class="form-control" name="nickname" type="text" placeholder="ชื่อเล่น" value="{{$user['nickname']}}">
          </div>
          <div class="form-group col-md-3 col-sm-5">
            <label class="control-label" >วันเกิด</label>
            <input class="form-control" name="birthdate" type="date" value="{{$user['birthdate']}}">
          </div>
      </div>


      <div class="row col-sm-offset-2">
          <div class="form-group col-sm-3">
            <label class="control-label" >ศาสนา</label>
            <input class="form-control" name="religion" type="text" placeholder="ศาสนา" value="{{$user['religion']}}">
          </div>
          <div class="form-group col-sm-3">
            <label class="control-label" >กรุ๊ปเลือด</label>
            <input class="form-control" name="blood" type="text" placeholder="กรุ๊ปเลือด" value="{{$user['blood_type']}}">
          </div>
      </div>

      <div class="row col-sm-offset-2">
          <div class="form-group col-md-3 col-sm-5">
            <label class="control-label" >คณะ</label>
            <p class="form-control-static col-xs-offset-1" name="faculty">วิศวกรรมศาสตร์</p>
          </div>
          <div class="form-group col-md-3 col-sm-5">
            <label class="control-label" >ภาควิชา</label>
            <input class="form-control" name="department" type="text" placeholder="ภาควิชา" value="{{$user['department']}}">
          </div>
          <div class="form-group col-md-3 col-sm-10">
            <label class="control-label" >กรุ๊ป</label>
            <input class="form-control" name="group" type="text" placeholder="กรุ๊ป" value="{{$user['group']}}">
          </div>
      </div>

      <div class="row col-sm-offset-2">
          <div class="form-group col-md-7 col-sm-10">
            <label class="control-label" >อีเมล์</label>
            <input class="form-control" name="email" type="text" placeholder="อีเมล์" value="{{$user['email']}}">
          </div>
          <div class="form-group col-md-3 col-sm-10">
            <label class="control-label" >เบอร์ติดต่อ</label>
            <input class="form-control" name="phone" type="text" placeholder="เบอร์โทรศัพท์มือถือ" value="{{$user['phone_number']}}">
          </div>
      </div>

      <div class="row col-sm-offset-2">
          <div class="form-group col-md-7 col-sm-10">
            <label class="control-label" >ที่อยู่</label>
            <input class="form-control" name="address" type="text" placeholder="ที่อยู่" value="{{$user['address']}}">
          </div>
          <div class="form-group col-md-3 col-sm-10">
            <label class="control-label" >เบอร์ติดต่อกรณีฉุกเฉิน</label>
            <input class="form-control" name="emergency" type="text" placeholder="เบอร์ผู้ปกครอง" value="{{$user['emergency_contact']}}">
          </div>
      </div>


      <div class="row col-sm-offset-2">
          <div class="form-group col-md-5 col-sm-10">
            <label class="control-label" >ภูมิแพ้</label>
            <input class="form-control" name="allergy" type="text" placeholder="อาหารและยาที่แพ้" value="{{$user['allergy']}}">
          </div>
          <div class="form-group col-md-3 col-sm-10">
            <label class="control-label" >โรคประจำตัว</label>
            <input class="form-control" name="anomaly" type="text" placeholder="โรคประจำตัว" value="{{$user['anomaly']}}">
          </div>
          <div class="form-group col-md-2 col-sm-10">
            <label class="control-label" >ขนาดเสื้อ</label>
            <input class="form-control" name="size" type="text" placeholder="ขนาดเสื้อ" value="{{$user['clothing_size']}}">
          </div>
      </div>

      <div class="row col-sm-offset-2">
          <div class="form-group col-md-5 col-sm-10">
            <label class="control-label" >เฟสบุ๊ค</label>
            <input class="form-control" name="facebook" type="text" placeholder="Facebook Link" value="{{$user['facebook_link']}}">
          </div>
          <div class="form-group col-md-5 col-sm-10">
            <label class="control-label" >ไลน์</label>
            <input class="form-control" name="line" type="text" placeholder="Line ID" value="{{$user['line_id']}}">
          </div>
      </div>

      <div class="row" style="margin-top:50px">
          <button type="submit" class="btn btn-primary btn-lg col-xs-4 col-xs-offset-4"><i class="fa fa-check"></i> ยืนยันข้อมูล</button>
      </div>
    </form>
  </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
