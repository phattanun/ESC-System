@extends('masterpage')

@section('title')
    ข้อมูลนิสิต
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('studentsNavToggle')
    active
@endsection

@section('bodyTitle')
    ข้อมูลนิสิต
@endsection

@section('content')

    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-user"></i> ค้นหาข้อมูลนิสิต</h2>
                </div>
                <div class="panel-body">
                    {{--search box part--}}
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                            <div class="form-group">
                                <div class="row text-center">
                                <div class="col-md-2">
                                    <input required id="studentID" name="studentID" required type="text" class="form-control"
                                           placeholder="รหัสนิสิต">
                                </div>
                                <div class="col-md-2">
                                    <input required id="studentFName" name="studentFName" required type="text" class="form-control"
                                           placeholder="ชื่อ">
                                </div>
                                <div class="col-md-2">
                                    <input required id="studentLName" name="studentLName" required type="text" class="form-control"
                                           placeholder="นามสกุล">
                                </div>
                                <div class="col-md-1">
                                    <input required id="studentNName" name="studentNName" required type="text" class="form-control"
                                           placeholder="ชื่อเล่น">
                                </div>
                                <div class="col-md-1">
                                    <input required id="studentGen" name="studentGen" required type="text" class="form-control"
                                           placeholder="รุ่น">
                                </div>
                                <div class="col-md-1">
                                    <input required id="studentGroup" name="studentGroup" required type="text" class="form-control"
                                           placeholder="กรุ๊ป">
                                </div>
                                <div class="col-md-2">
                                    <input required id="studentDept" name="StudentDept" required type="text" class="form-control"
                                           placeholder="ภาควิชา">
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
                    <span class="btn pull-right hidden" id="save-excel-btn">
                        <a class="btn btn-success">บันทึกเป็นไฟล์ .xlsx</a>
                        </br></br>
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
        input {
            margin-bottom: 10px;
        }
        @media only screen and (max-width: 768px) {
            section div.row > div {
                 margin-bottom:0px;
            }
        }
    </style>

@endsection
@section('js')
    <script>
        $('#save-excel-btn').click(function(){
            window.location="{{url('/students/getExcelFile?studentID=')}}"+history['studentID']+"&studentFName="+history['studentFName']+"&studentLName="+history['studentLName']+"&studentNName="+history['studentNName']+"&studentGroup="+history['studentGroup']+"&studentDept="+history['studentDept']+"";
        });
        var history;
        $('#search-student-btn').click(function () {
            history['studentID']= $('#studentID').val();
            history['studentFName']=$('#studentFName').val();
            history['studentLName']=$('#studentLName').val();
            history['studentNName']=$('#studentNName').val();
            history['studentGen']=$('#studentGen').val();
            history['studentGroup']=$('#studentGroup').val();
            history['studentDept']=$('#studentDept').val();
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT + '/students/search',
                    {
                        studentID: history['studentID'],
                        studentFName: history['studentFName'],
                        studentLName: history['studentLName'],
                        studentNName: history['studentNName'],
                        studentGen: history['studentGen'],
                        studentGroup: history['studentGroup'],
                        studentDept: history['studentDept'],
                        _token: '{{csrf_token()}}'
                    }).done(function (input) {
                if (input == 'fail') {
                    //_toastr("ไม่พบนิสิตในระบบ", "top-right", "error", false);
                    $('#search-result-table').html('');
                    $('#search-result-table').append('<div class = \'text-center\'>ไม่พบข้อมูลนิสิตที่ต้องการ</div>');
                    $('#save-excel-btn').addClass('hidden');
                    return false;
                }
                else {



                    $('#search-result-table').html('');
                    //--table header part--

                    var tableHeader = '</br>' +
                            '<tr>' +
                            '<th style="vertical-align:middle" rowspan="1">ลำดับ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">รหัสนิสิต</th>' +
                            '<th style="vertical-align:middle" rowspan="1">คำนำหน้า</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ชื่อ</th>' +
                            '<th style="vertical-align:middle" rowspan="1">นามสกุล</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ชื่อเล่น</th>' +
                            '<th style="vertical-align:middle" rowspan="1">รุ่น</th>' +
                            '<th style="vertical-align:middle" rowspan="1">กรุ๊ป</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ภาควิชา</th>';
                    @if($permission&&$permission->student)
                            tableHeader += '<th style="vertical-align:middle" rowspan="1">ที่อยู่</th>' +
                            '<th style="vertical-align:middle" rowspan="1">วันเกิด</th>' +
                            '<th style="vertical-align:middle" rowspan="1">หมายเลขโทรศัพท์</th>' +
                            '<th style="vertical-align:middle" rowspan="1">อีเมล</th>' +
                            '<th style="vertical-align:middle" rowspan="1">Facebook</th>' +
                            '<th style="vertical-align:middle" rowspan="1">Line</th>' +
                            '<th style="vertical-align:middle" rowspan="1">หมายเลขโทรศัพท์ฉุกเฉิน</th>' +
                            '<th style="vertical-align:middle" rowspan="1">อาหารที่แพ้</th>' +
                            '<th style="vertical-align:middle" rowspan="1">โรคประจำตัว</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ศาสนา</th>' +
                            '<th style="vertical-align:middle" rowspan="1">กรุ๊ปเลือด</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ขนาดเสื้อ</th>';
                    @endif
                    $('#search-result-table').append(tableHeader);

                    //--row data--
                    for (var counter = 0; counter < input.length; counter++) {
                        var tabledata = '<tr>' +
                                '<td>' + (counter + 1) + '</td>' +
                                '<td>' + input[counter]["student_id"] + '</td>' +
                                '<td>' + (input[counter]["sex"] == 0 ? 'นาย' : 'นางสาว') + '</td>' +
                                '<td>' + input[counter]["name"] + '</td>' +
                                '<td>' + input[counter]["surname"] + '</td>' +
                                '<td>' + input[counter]["nickname"] + '</td>' +
                                '<td>' + input[counter]["generation"] + '</td>' +
                                '<td>' + input[counter]["group"][0]['name'] + '</td>' +
                                '<td>' + input[counter]["department"][0]['name'] + '</td>';

                        @if($permission&&$permission->student)
                                tabledata +=
                                '<td>' +  input[counter]["address"]  + '</td>' +
                                '<td>' +  input[counter]["birthdate"]  + '</td>' +
                                '<td>' +  input[counter]["phone_number"]  + '</td>' +
                                '<td>' +  input[counter]["email"]  + '</td>' +
                                '<td><a href="//' + input[counter]["facebook_link"]  + '">logo</a></td>' +
                                '<td>' +  input[counter]["line_id"]  + '</td>' +
                                '<td>' +  input[counter]["emergency_contact"]  + '</td>' +
                                '<td>' +  input[counter]["allergy"]  + '</td>' +
                                '<td>' +  input[counter]["anomaly"]  + '</td>' +
                                '<td>' +  input[counter]["religion"]  + '</td>' +
                                '<td>' +  input[counter]["blood_type"]  + '</td>' +
                                '<td>' +  input[counter]["clothing_size"]  + '</td>';
                        @endif
                        tabledata += '</tr>';
                        $('#search-result-table').append(tabledata);
                    }

                    //--excel button part--
                    $('#save-excel-btn').removeClass('hidden');
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                return false;
            });
        });
    </script>
@endsection