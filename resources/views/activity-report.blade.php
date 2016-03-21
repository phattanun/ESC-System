@extends('masterpage')

@section('title')
    รายงานกิจกรรม
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('bodyTitle')
    รายงานกิจกรรม
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                <div class = "panel-body">
                    <div class = "row @if($count['sport']+$count['volunteer']+$count['academic']+$count['culture']+$count['ethics'] <= 0) hidden @endif" id="graphzone">
                        <div class="col-md-6 col-sm-6">
                            <label>กราฟแสดงจำนวนกิจกรรมที่สอดคล้องกับกรอบมาตรฐาน TQF ใน  5 ด้าน</label>
                            <div id="tqf-chart"></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>กราฟแสดงจำนวนกิจกรรมในแต่ละประเภทของกิจกรรม</label>
                            <div id="activity-chart"></div>
                        </div>
                    </div>
                    <div class="heading-title heading-dotted text-center @if($count['sport']+$count['volunteer']+$count['academic']+$count['culture']+$count['ethics'] > 0) hidden @endif" id="noact">
                        <h1>ยังไม่พบกิจกรรมในปีการศึกษานี้</h1>
                    </div>
                </div>
            </div>
                <div class = "panel panel-default">
                    <div class = "panel-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>ปีการศึกษา</label>
                                <select class="form-control select2" name="year" id="year">
                                    @foreach($act_year as $year)
                                        <option value="{{$year}}" @if($year == $this_year)selected @endif>ปีการศึกษา {{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6"></div>
                            <div class="col-md-3 col-sm-3 @if($count['sport']+$count['volunteer']+$count['academic']+$count['culture']+$count['ethics'] <= 0) hidden @endif" id="getExcel">
                                <span class="pull-right" id="save-excel-btn">
                                    <br>
                                        <a class="btn btn-success" id="getExcel-btn">บันทึกเป็นไฟล์ .xlsx</a>
                                    </br>
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="table-responsive margin-bottom-30">
                                <table class="table nomargin" id="activity-table">
                                    <tr>
                                        <th class="text-center" style="vertical-align:middle;width: 25%" rowspan="2">ชื่อกิจกรรม</th>
                                        <th class="text-center" style="vertical-align:middle;width: 25%" rowspan="2">ประเภทของกิจกรรม</th>
                                        <th class="text-center" style="vertical-align:middle;width: 10%" colspan="5">TQF<br></th>
                                        <th class="text-center" style="vertical-align:middle;width: 20%" rowspan="2">หน่วยงาน</th>
                                        <th class="text-center" style="vertical-align:middle;width: 20%" rowspan="2">สถานะ</th>
                                    </tr>
                                    <tr class="text-center">
                                        <td>E</td>
                                        <td>K</td>
                                        <td>C</td>
                                        <td>I<br></td>
                                        <td>N</td>
                                    </tr>
                                    @foreach($act_this_year as $act)
                                        <tr class='act_tuple'>
                                            <td class="text-center" style="vertical-align:middle" >{{$act['name']}}</td>
                                            <td class="text-center" style="vertical-align:middle" >
                                                @if($act['category']=='sport')
                                                    กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ
                                                @elseif($act['category']=='volunteer')
                                                    กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม
                                                @elseif($act['category']=='academic')
                                                    กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์
                                                @elseif($act['category']=='culture')
                                                    กิจกรรมส่งเสริมศิลปวัฒนธรรม
                                                @elseif($act['category']=='ethics')
                                                    กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม
                                                @endif
                                            </td>
                                            <td>@if($act['tqf_ethics']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_knowledge']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_cognitive']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_interpersonal']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_communication']) <i class="fa fa-check"></i> @endif</td>
                                            <td class="text-center" style="vertical-align:middle">{{$division_name[$act['div_id']]}}</td>
                                            @if($act['status']==0)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-orange">รอเปิดโครงการ</span></td>
                                            @elseif($act['status']==1)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-olive">กวศ อนุมัติ</span></td>
                                            @elseif($act['status']==2)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-green">คณบดี อนุมัติ</span></td>
                                            @elseif($act['status']==3)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-red">รอปิดโครงการ</span></td>
                                            @elseif($act['status']==4)
                                                <td style="vertical-align: middle;text-align: center"><span class="text-black">ปิดโครงการ</span></td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection

@section('css')
    <link href="{{Request::root()}}/assets/css/c3.min.css" rel="stylesheet" type="text/css">
@endsection

@section('js-top')
    <script src="{{Request::root()}}/js/d3.min.js" charset="utf-8"></script>
    <script src="{{Request::root()}}/js/c3.min.js"></script>
@endsection

@section('js')
    <script>
        var division = {!! json_encode($division_name) !!};
        var chart = c3.generate({
            bindto: '#activity-chart',
            data: {
                columns: [
                    ["กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ", {{$count['sport']}}],
                    ["กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม", {{$count['volunteer']}}],
                    ["กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์", {{$count['academic']}}],
                    ["กิจกรรมส่งเสริมศิลปวัฒนธรรม",{{$count['culture']}}],
                    ["กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม", {{$count['ethics']}}],
                ],
                type : 'pie',
            },
            legend: {
                position: 'right'
            }
        });
        var chart2 = c3.generate({
            bindto: '#tqf-chart',
            padding: {
                top: 25,
                bottom: 25
            },
            data : {
                columns: [
                    ['จำนวนกิจกรรม', {{$tqf['ethics']}}, {{$tqf['knowledge']}}, {{$tqf['cognitive']}}, {{$tqf['interpersonal']}}, {{$tqf['communication']}}]
                ],
                type: 'bar'
            },
            axis: {
                x: {
                    height: 65,
                    label: {
                        text: 'กรอบมาตรฐาน TQF ใน  5 ด้าน',
                        position: 'outer-center',
                    },
                    type: 'category',
                    categories: ['Ethics and Moral', 'Knowledge', 'Cognitive Skills', 'Interpersonal Skills and Responsibility', 'Numerical Analysis, Communication and Information Technology Skills'],
                    tick: {
                        centered: true
                    }
                },
                y: {
                    label: {
                        text: 'จำนวนกิจกรรม (หน่วย)',
                        position: 'outer-middle'
                    },
                    padding: {
                        top: 0,
                        bottom: 0
                    },
                    tick: {
                        format: function (d) {
                            return (parseInt(d) == d) ? d : null;
                        }
                    },
                }
            },
            legend: {
                show: false
            }
        });
        $('#year').change(function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/activity/report',
                    {year:  $('#year').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                if(input=='fail'){
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                    return false;
                }
                else {
                    var report = JSON.parse(input);
                    if(report.count.sport+report.count.volunteer+report.count.academic+report.count.culture+report.count.ethics>0) {
                        $('#graphzone').removeClass('hidden');
                        $('#getExcel').removeClass('hidden');
                        if(!$('#noact').hasClass('hidden')) $('#noact').addClass('hidden');
                    }
                    else {
                        $('#noact').removeClass('hidden');
                        if(!$('#graphzone').hasClass('hidden')) $('#graphzone').addClass('hidden');
                        if(!$('#getExcel').hasClass('hidden')) $('#getExcel').addClass('hidden');
                    }
                    max_y_axis = Math.max(report.tqf.ethics, report.tqf.knowledge, report.tqf.cognitive, report.tqf.interpersonal, report.tqf.communication);
                    chart.load({
                        columns: [
                            ["กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ",report.count.sport],
                            ["กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม",report.count.volunteer],
                            ["กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์",report.count.academic],
                            ["กิจกรรมส่งเสริมศิลปวัฒนธรรม",report.count.culture],
                            ["กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม",report.count.ethics],
                        ]

                    });
                    chart2.load({
                        columns: [
                            ['จำนวนกิจกรรม', report.tqf.ethics, report.tqf.knowledge, report.tqf.cognitive, report.tqf.interpersonal, report.tqf.communication]
                        ]
                    });
                    $('.act_tuple').remove();
                    for(i=0;i<report.act_select_year.length;i++){
                        $('#activity-table').append(
                            '<tr class="act_tuple" id="act-tuple-'+report.act_select_year[i].act_id+'">'
                            +'<td class="text-center" style="vertical-align:middle" >'+report.act_select_year[i].name+'</td>'
                        );
                        switch(report.act_select_year[i].category){
                            case 'sport':$('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">กิจกรรมกีฬาหรือการส่งเสริมสุขภาพ</td>');break;
                            case 'volunteer':$('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">กิจกรรมบำเพ็ญประโยชน์และรักษาสิ่งแวดล้อม</td>');break;
                            case 'academic':$('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">กิจกรรมวิชาการที่ส่งเสริมคุณลักษณะบัณฑิตที่พึงประสงค์</td>');break;
                            case 'culture':$('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">กิจกรรมส่งเสริมศิลปวัฒนธรรม</td>');break;
                            case 'ethics':$('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">กิจกรรมเสริมสร้างคุณธรรมและจริยธรรม</td>');break;
                        }
                        report.act_select_year[i].tqf_ethics? $('#act-tuple-'+report.act_select_year[i].act_id).append('<td><i class="fa fa-check"></i></td>'):$('#act-tuple-'+report.act_select_year[i].act_id).append('<td></td>');
                        report.act_select_year[i].tqf_knowledge? $('#act-tuple-'+report.act_select_year[i].act_id).append('<td><i class="fa fa-check"></i></td>'):$('#act-tuple-'+report.act_select_year[i].act_id).append('<td></td>');
                        report.act_select_year[i].tqf_cognitive? $('#act-tuple-'+report.act_select_year[i].act_id).append('<td><i class="fa fa-check"></i></td>'):$('#act-tuple-'+report.act_select_year[i].act_id).append('<td></td>');
                        report.act_select_year[i].tqf_interpersonal? $('#act-tuple-'+report.act_select_year[i].act_id).append('<td><i class="fa fa-check"></i></td>'):$('#act-tuple-'+report.act_select_year[i].act_id).append('<td></td>');
                        report.act_select_year[i].tqf_communication? $('#act-tuple-'+report.act_select_year[i].act_id).append('<td><i class="fa fa-check"></i></td>'):$('#act-tuple-'+report.act_select_year[i].act_id).append('<td></td>');
                        $('#act-tuple-'+report.act_select_year[i].act_id).append('<td class="text-center" style="vertical-align:middle">'+division[report.act_select_year[i].div_id]+'</td>');
                        switch(report.act_select_year[i].status){
                            case 0:$('#act-tuple-'+report.act_select_year[i].act_id).append('<td style="vertical-align: middle;text-align: center"><span class="text-orange">รอเปิดโครงการ</span></td>');break;
                            case 1:$('#act-tuple-'+report.act_select_year[i].act_id).append('<td style="vertical-align: middle;text-align: center"><span class="text-olive">กวศ อนุมัติ</span></td>');break;
                            case 2:$('#act-tuple-'+report.act_select_year[i].act_id).append('<td style="vertical-align: middle;text-align: center"><span class="text-green">คณบดี อนุมัติ</span></td>');break;
                            case 3:$('#act-tuple-'+report.act_select_year[i].act_id).append('<td style="vertical-align: middle;text-align: center"><span class="text-red">รอปิดโครงการ</span></td>');break;
                            case 4:$('#act-tuple-'+report.act_select_year[i].act_id).append('<td style="vertical-align: middle;text-align: center"><span class="text-black">ปิดโครงการ</span></td>');break;
                        }
                    }
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                return false;
            });
        })

        $('#getExcel-btn').click(function () {
            var URL_ROOT = '{{Request::root()}}';
            $.post(URL_ROOT+'/activity/report/getxlsx',
                    {year:  $('#year').val(), _token: '{{csrf_token()}}'}).done(function (input) {

            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                return false;
            });
        })
    </script>
@endsection
