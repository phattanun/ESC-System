@extends('masterpage')

@section('title')
    @if($type=='search')ประวัติการจองห้องประชุม
    @else ออกรายงานการจองห้องประชุม
    @endif
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('conferenceNavToggle')
    active
@endsection

@section('bodyTitle')
    @if($type=='search')ประวัติการจองห้องประชุม
    @else ออกรายงานการจองห้องประชุม
    @endif
@endsection

@section('content')

    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-calendar"></i> ค้นหาข้อมูลห้องประชุม</h2>
                </div>
                <div class="panel-body">
                    </br>
                    {{--search box part--}}
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                        <div class="form-group">
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <input required id="startDate" name="startDate" required type="text" class="form-control"
                                           placeholder="วันเริ่มต้น">
                                </div>
                                <div class="col-md-2">
                                    <input required id="endDate" name="endDate" required type="text" class="form-control"
                                           placeholder="วันสิ้นสุด">
                                </div>
                                <div class="col-md-3">
                                    <select name="activity" class="form-control select2 required" id="activity">
                                        <option selected="selected" value="0">กิจกรรม</option>

                                        <option selected="selected" value="NULL">กิจกรรมอื่น ๆ</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="division" class="form-control select2 required" id="studentGroup">
                                        <option selected="selected" value="0">หน่วยงาน</option>

                                        <option selected="selected" value="NULL">หน่วยงานอื่น ๆ</option>
                                    </select>
                                </div>
                                <span class="col-md-1" id="search-student-btn">
                                    <a class="btn btn-success">ค้นหา</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    {{--end search box part--}}

                    {{--table part--}}
                    <div class="table-responsive">
                        <table class="table nomargin" id="search-result-table">
                        </table>
                    </div>
                    {{--end table part--}}

                    {{--excel button part--}}
                    <span class="pull-right hidden" id="save-excel-btn">
                        </br>
                        <a class="btn btn-success">บันทึกเป็นไฟล์ .xlsx</a>
                        </br>
                    </span>
                    {{--end excel button part--}}

                </div>
            </div>
        </div>
    </section>

@endsection

@section('css')
    <style>
        .table-responsive {
            word-break: keep-all;
        }
        .form-control,.select2 {
            margin-bottom: 10px;
            width: 100%;
        }
        @media only screen and (max-width: 768px) {
            section div.row > div {
                margin-bottom:0px;
            }
        }
        .clickrowcss:hover {
            background-color: rgb(237, 237, 237);
        }
        .clickrow:hover {
            cursor: pointer !important;

        }
    </style>

@endsection
@section('js')
    <script>

    </script>
@endsection