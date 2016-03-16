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
                <div class="panel-body">
                    {{--search box part--}}
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label class="margin-bottom-20 "><i class="fa fa-user"></i> ค้นหาข้อมูลนิสิต</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-sm-2">
                                    <input required id="studentID" name="studentID" required type="text" class="form-control"
                                           placeholder="รหัสนิสิต">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input required id="studentFName" name="studentFName" required type="text" class="form-control"
                                           placeholder="ชื่อ">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input required id="studentLName" name="studentLName" required type="text" class="form-control"
                                           placeholder="นามสกุล">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input required id="studentNName" name="studentNName" required type="text" class="form-control"
                                           placeholder="ชื่อเล่น">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <input required id="studentGroup" name="studentGroup" required type="text" class="form-control"
                                           placeholder="กรุ๊ป">
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input required id="StudentDept" name="StudentDept" required type="text" class="form-control"
                                           placeholder="ภาควิชา">
                                </div>
                                 <span id="search-student-btn">
                                     <a class="btn btn-success">ค้นหา</a>
                                 </span>
                            </div>
                        </div>
                    </div>
                    {{--end search box part--}}

                    {{--table part--}}
                    <div class="table-responsive margin-bottom-30">
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
    </style>

@endsection
@section('js')
    <script>
        $('#search-student-btn').click(function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT + '/students/search',
                    {
                        studentID: $('#studentID').val(),
                        studentFName: $('#studentFName').val(),
                        studentLName: $('#studentLName').val(),
                        studentNName: $('#studentNName').val(),
                        studentGroup: $('#studentGroup').val(),
                        studentDept: $('#studentDept').val(),
                        _token: '{{csrf_token()}}'
                    }).done(function (input) {
                if (input == 'fail') {
                    _toastr("ไม่พบนิสิตในระบบ", "top-right", "error", false);
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
                            '<th style="vertical-align:middle" rowspan="1">ชั้นปี</th>' +
                            '<th style="vertical-align:middle" rowspan="1">กรุ๊ป</th>' +
                            '<th style="vertical-align:middle" rowspan="1">ภาควิชา</th>';
                    @if($permission->student)
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
                        $('#search-result-table').append(
                                '<tr>' +
                                '<td>' + (counter + 1) + '</td>' +
                                '<td>' + input[counter]["student_id"] + '</td>' +
                                '<td>' + (input[counter]["sex"] == 0 ? 'นาย' : 'นางสาว') + '</td>' +
                                '<td>' + input[counter]["name"] + '</td>' +
                                '<td>' + input[counter]["surname"] + '</td>' +
                                '<td>' + input[counter]["nickname"] + '</td>' +
                                '<td>' + input[counter]["generation"] + '</td>' +
                                '<td>' + input[counter]["group"][0]['name'] + '</td>' +
                                '<td>' + input[counter]["department"][0]['name'] + '</td>'
                        );
                        @if($permission->student)
                        $('#search-result-table').append(
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>' +
                                '<td>' + '' + '</td>'
                        );
                        @endif
                        $('#search-result-table').append('</tr>');
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