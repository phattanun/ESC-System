@extends('masterpage')

@section('title')
    ข้อมูลนิสิต
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
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
                            <div class="col-md-12 col-sm-2">
                                <label class="margin-bottom-20 ">ค้นหาข้อมูลนิสิต</label>
                                <div class="input-group" data-minLength="1">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <span class="input-group-btn">
                                                <input id="studentID" name="studentID" class="form-control typeahead"
                                                       placeholder="รหัสนิสิต" type="text">
                                            </span>
                                            <span class="input-group-btn">
                                                <input id="studentFName" name="studentFName"
                                                       class="form-control typeahead" placeholder="ชื่อ" type="text">
                                            </span>
                                            <span class="input-group-btn">
                                                <input id="studentLName" name="studentLName"
                                                       class="form-control typeahead" placeholder="นามสกุล" type="text">
                                            </span>
                                            <span class="input-group-btn">
                                                <input id="studentNName" name="studentNName"
                                                       class="form-control typeahead" placeholder="ชื่อเล่น"
                                                       type="text">
                                            </span>
                                            <span class="input-group-btn">
                                                <input id="studentGroup" name="studentGroup"
                                                       class="form-control typeahead" placeholder="กรุ๊ป" type="text">
                                            </span>
                                            <span class="input-group-btn">
                                                <input id="studentDept" name="studentDept"
                                                       class="form-control typeahead" placeholder="ภาควิชา" type="text">
                                            </span>
                                            <span class="input-group-btn" id="search-student-btn">
                                                <a class="btn btn-success">ค้นหา</a>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--end search box part--}}

                    {{--table part--}}
                    <table class="table nomargin" id="search-result-table">
                    </table>

                    <div id="save-to-excel-button">
                    </div>
                    {{--end table part--}}

                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $('#search-student-btn').click( function () {
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
                    $('#search-result-table').append(

                            //--table header part--
                            '</br>'+
                            '<tr>'+
                                '<th style="vertical-align:middle" rowspan="1">ลำดับ</th>'+
                                '<th style="vertical-align:middle" rowspan="1">รหัสนิสิต</th>'+
                                '<th style="vertical-align:middle" rowspan="1">คำนำหน้า</th>'+
                                '<th style="vertical-align:middle" rowspan="1">ชื่อ</th>'+
                                '<th style="vertical-align:middle" rowspan="1">นามสกุล</th>'+
                                '<th style="vertical-align:middle" rowspan="1">ชื่อเล่น</th>'+
                                '<th style="vertical-align:middle" rowspan="1">ชั้นปี</th>'+
                                '<th style="vertical-align:middle" rowspan="1">กรุ๊ป</th>'+
                                '<th style="vertical-align:middle" rowspan="1">ภาควิชา</th>'+
                            '</tr>'
                            //--end table header part--
                    );
                    for(var counter=0;counter<input.length;counter++)
                        $('#search-result-table').append(

                                //--row data--
                                '<tr>'+
                                '<td>'+(counter+1)+'</td>'+
                                '<td>'+input[counter]["student_id"]+'</td>'+
                                '<td>'+input[counter]["sex"]+'</td>'+
                                '<td>'+input[counter]["surname"]+'</td>'+
                                '<td>'+input[counter]["name"]+'</td>'+
                                '<td>'+input[counter]["nickname"]+'</td>'+
                                '<td>'+input[counter]["generation"]+'</td>'+
                                '<td>'+input[counter]["group"]+'</td>'+
                                '<td>'+input[counter]["department"]+'</td>'+
                                '</tr>'
                                //--end row data--
                        );
                    $('#save-to-excel-button').append(

                            //--excel button part--
                            '<span class="btn pull-right" id="save-ecxel-btn">'+
                            '<a class="btn btn-success">บันทึกเป็นไฟล .xlsx์</a>'+
                            '</span>'+
                            '</br></br>'
                            //--end excel button part--
                    );
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                return false;
            });
        });
    </script>
@endsection