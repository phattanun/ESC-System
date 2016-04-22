@extends('masterpage')

@section('title')
    @if($type=='search')ประวัติการยืมพัสดุ
    @else ออกรายงานสรุปข้อมูลการยืมพัสดุ
    @endif
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('suppliesNavToggle')
    active
@endsection

@section('bodyTitle')
    @if($type=='search')ประวัติการยืมพัสดุ
    @else ออกรายงานสรุปข้อมูลการยืมพัสดุ
    @endif
@endsection

@section('content')

    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-briefcase"></i> ค้นหาข้อมูลการยืมพัสดุ</h2>
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
                                <div class="col-md-4">
                                    <select name="activity" class="form-control select2 required" id="activity">
                                        <option selected="selected" value="0">กิจกรรม</option>
                                        @foreach($activity as $act)
                                            <option value="{{$act['act_id']}}">{{$act['name']}}</option>
                                        @endforeach
                                        <option value=NULL>กิจกรรมอื่น ๆ</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
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
            $.post(URL_ROOT + '/supplies/result',
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
                    $('#search-result-table').append('<div class = \'text-center\'>ไม่พบข้อมูลรายการยืมพัสดุที่ต้องการ</div>');
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
                            '<th style="vertical-align:middle" rowspan="1">พัสดุ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">จำนวน</th>' +
                            '<th style="vertical-align:middle" rowspan="1">วันเริ่มต้น</th>' +
                            '<th style="vertical-align:middle" rowspan="1">วันสิ้นสุด</th>' +
                            '<th style="vertical-align:middle" rowspan="1">สถานะ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">เหตุผลที่ไม่อนุมัติ</th>';

                    @if($type == 'report')
                            tableHeader += '<th style="vertical-align:middle" rowspan="1">ชื่อผู้ขอยืม</th>' +
                            '<th style="vertical-align:middle" rowspan="1">นามสกุล</th>' +
                            '<th style="vertical-align:middle" rowspan="1">รหัสนิสิต</th>' +
                            '<th style="vertical-align:middle" rowspan="1">หมายเลขโทรศัพท์</th>';
                    @endif
                    $('#search-result-table').append(tableHeader);

                    //--row data--
                    for (var counter = 0; counter < input.length; counter++) {

                        var tabledata = '<tr class = "clickrowcss" >'+
                                '<td>' + (counter + 1) + '</td>'+
                                '<td>' + (input[counter]["act_name"]==null?(input[counter]["other_act"]==null?"-":input[counter]["other_act"]):input[counter]["act_name"]) + '</td>'+
                                '<td>' + (input[counter]["div_name"]==null?input[counter]["other_div"]:input[counter]["div_name"]) + '</td>' +
                                '<td>' + input[counter]["inv_name"] + '</td>' +
                                '<td>' + (input[counter]["borrow_actual_amount"]==null?"-":input[counter]["borrow_actual_amount"]) + '/' + input[counter]["borrow_request_amount"] + '</td>' +
                                '<td>' + input[counter]["borrow_date"].substring(0,11) + '</td>' +
                                '<td>' + input[counter]["return_date"].substring(0,11) + '</td>' +
                                '<td>' + (input[counter]["status"]==null?"รอการอนุมัติ":(input[counter]["status"]==1?"อนุมัติ":"ไม่อนุมัติ")) + '</td>' +
                                '<td>' + (input[counter]["reason_if_not_approve"]==null?"-":input[counter]["reason_if_not_approve"]) + '</td>';

                        @if($type == 'report')
                                tabledata +=
                                '<td>' +  input[counter]["name"]  + '</td>' +
                                '<td>' +  input[counter]["surname"]  + '</td>' +
                                '<td>' +  input[counter]["student_id"]  + '</td>' +
                                '<td>' +  input[counter]["phone_number"]  + '</td>';
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