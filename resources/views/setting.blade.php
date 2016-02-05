@extends('masterpage')

@section('title')
    ตั้งค่าระบบ
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    ตั้งค่าระบบ
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            <input name="action" value="contact_send" type="hidden">

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>ปีการศึกษา </label>
                                        <input name="contact[first_name]" value="" class="form-control required pull-left" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>เพิ่มผู้จัดการข้อมูล</label>
                                        <input name="contact[email]" value="" class="form-control required" type="email">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Phone *</label>
                                        <input name="contact[phone]" value="" class="form-control required" type="text">
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
                                    SEND APPLICATION
                                    <span class="block font-lato">We'll get back to you within 48 hours</span>
                                </button>
                            </div>
                        </div>

                        <input name="is_ajax" value="true" type="hidden"></form>


                </div>

            </div>
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('js')
@endsection
