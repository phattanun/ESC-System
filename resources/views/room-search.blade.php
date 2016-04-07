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
                    <h2 class="panel-title"><i class="fa fa-calendar"></i> ค้นหาข้อมูลการจองห้องประชุม</h2>
                </div>
                <div class="panel-body">
                    </br>
                    {{--search box part--}}
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                        <div class="form-group">
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <input required id="startDate" name="startDate" required type="text" class="form-control datepicker text-center "
                                           placeholder="วันเริ่มต้น">
                                </div>
                                <div class="col-md-2">
                                    <input required id="endDate" name="endDate" required type="text" class="form-control datepicker text-center "
                                           placeholder="วันสิ้นสุด">
                                </div>
                                <div class={{$type=='report'?"col-md-3":"col-md-4"}}>
                                    <select name="activity" class="form-control select2 required" id="activity">
                                        <option selected="selected" value="0">กิจกรรม</option>
                                        @foreach($activity as $act)
                                            <option value="{{$act['act_id']}}">{{$act['name']}}</option>
                                        @endforeach
                                        <option value=NULL>กิจกรรมอื่น ๆ</option>
                                    </select>
                                </div>
                                <div class={{$type=='report'?"col-md-2":"col-md-3"}}>
                                    <select name="division" class="form-control select2 required" id="division">
                                        <option selected="selected" value="0">หน่วยงาน</option>
                                        @foreach($generation as $generations)
                                            <option value="{{$generations['div_id']}}">รุ่น {{$generations['name']}}</option>
                                        @endforeach
                                        @foreach($group as $groups)
                                            <option value="{{$groups['div_id']}}">กรุ๊ป {{$groups['name']}}</option>
                                        @endforeach
                                        @foreach($department as $departments)
                                            <option value="{{$departments['div_id']}}">{{$departments['short_name']}}</option>
                                        @endforeach
                                        @foreach($club as $clubs)
                                            <option value="{{$clubs['div_id']}}">{{$clubs['name']}}</option>
                                        @endforeach
                                        <option value=NULL>หน่วยงานอื่น ๆ</option>
                                    </select>
                                </div>
                                @if($type=='report')
                                <div class="col-md-2">
                                    <select name="userType" class="form-control select2 required" id="userType">
                                        <option selected="selected" value="0">ประเภทผู้ใช้</option>
                                        <option value='user'>นิสิตภายในคณะ</option>
                                        <option value='guest'>ผู้ใช้ภายนอก</option>
                                    </select>
                                </div>
                                @endif
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
        /*
        $('#save-excel-btn').click(function(){
            window.location="{{url('/students/getExcelFile?studentID=')}}"+history['studentID']+"&studentFName="+history['studentFName']+"&studentLName="+history['studentLName']+"&studentNName="+history['studentNName']+"&studentGroup="+history['studentGroup']+"&studentDept="+history['studentDept']+"";
        });
        */

        /*
        $(document).on('click','.clickrow',function(){
            window.location="{{url('/profile')}}"+"/"+ this.id;
        });
        */

        var history;
        $('#search-student-btn').click(function () {
            history['startDate']= $('#startDate').val();
            history['endDate']=$('#endDate').val();
            history['activity']=$('#activity').val();
            history['division']=$('#division').val();
            history['userType']=$('#userType').val();
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT + '/room/result',
                    {
                        startDate: history['startDate'],
                        endDate: history['endDate'],
                        activity: history['activity'],
                        division: history['division'],
                        userType: history['userType'],
                        _token: '{{csrf_token()}}',
                        type: '{{$type}}'
                    }).done(function (input) {
                if (input == 'fail') {
                    //_toastr("ไม่พบข้อมูลการจองห้องประชุมที่ต้องการ", "top-right", "error", false);
                    $('#search-result-table').html('');
                    $('#search-result-table').append('<div class = \'text-center\'>ไม่พบข้อมูลการจองห้องประชุมที่ต้องการ</div>');
                    $('#save-excel-btn').addClass('hidden');
                    return false;
                }
                else {

                    $('#search-result-table').html('');
                    //--table header part--

                    var tableHeader = '</br>' +
                            '<tr>' +
                            '<th style="vertical-align:middle" rowspan="1">ลำดับ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">กิจกรรม</th>' +
                            '<th style="vertical-align:middle" rowspan="1">หน่วยงาน</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เหตุผลการจอง</th>' +
                            '<th style="vertical-align:middle" rowspan="1">จำนวนคน</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เวลาเริ่ม</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เวลาสิ้นสุด</th>' +
                            '<th style="vertical-align:middle" rowspan="1">สถานะ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ห้องที่อนุมัติ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เหตุผลที่ไม่อนุมัติ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เครื่องฉาย</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ปลั๊กไฟ</th>';

                    @if($type == 'report')
                            tableHeader += '<th style="vertical-align:middle" rowspan="1">ชื่อผู้จอง</th>' +
                            '<th style="vertical-align:middle" rowspan="1">นามสกุล</th>' +
                            '<th style="vertical-align:middle" rowspan="1">รหัสนิสิต</th>' +
                            '<th style="vertical-align:middle" rowspan="1">คณะ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">หมายเลขโทรศัพท์</th>';
                    @endif
                    $('#search-result-table').append(tableHeader);

                    //--row data--
                    for (var counter = 0; counter < input.length; counter++) {

                        var tabledata = '<tr class = "clickrowcss" >'+
                        '<td>' + (counter + 1) + '</td>'+
                        '<td>' + (input[counter]["act_id"]==null?input[counter]["other_act"]:input[counter]["act_id"]) + '</td>'+
                        '<td>' + (input[counter]["div_id"]==null?input[counter]["other_div"]:input[counter]["div_id"]) + '</td>' +
                        '<td>' + input[counter]["reason"] + '</td>' +
                        '<td>' + input[counter]["number_of_people"] + '</td>' +
                        '<td>' + input[counter]["request_start_time"] + '</td>' +
                        '<td>' + input[counter]["request_end_time"] + '</td>' +
                        '<td>' + input[counter]["status"] + '</td>' +
                        '<td>' + input[counter]["allow_room_id"] + '</td>' +
                        '<td>' + input[counter]["reason_if_not_approve"] + '</td>' +
                        '<td>' + input[counter]["allow_projector"] + '/' + input[counter]["request_projector"] + '</td>' +
                        '<td>' + input[counter]["allow_plug"] + '/' + input[counter]["request_plug"] + '</td>';

                        @if($type == 'report')
                                tabledata +=
                                '<td>' +  input[counter]["student_id"]  + '</td>' +
                                '<td>' +  input[counter]["student_id"]  + '</td>' +
                                '<td>' +  input[counter]["student_id"]  + '</td>' +
                                '<td>' +  input[counter]["student_id"]  + '</td>' +
                                '<td>' +  input[counter]["student_id"]  + '</td>';
                        @endif
                                tabledata += '</tr>';

                        $('#search-result-table').append(tabledata);
                    }

                    //--excel button part--
                    @if($type=='report')
                        $('#save-excel-btn').removeClass('hidden');
                    @endif
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                return false;
            });
        });
    </script>
@endsection