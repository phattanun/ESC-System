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
                    @if($count['sport']+$count['volunteer']+$count['academic']+$count['culture']+$count['ethics'] > 0)
                    <div class = "row">
                        <div class="col-md-6 col-sm-6">
                            <label>กราฟแสดงจำนวนกิจกรรมที่สอดคล้องกับกรอบมาตรฐาน TQF ใน  5 ด้าน</label>
                            <div id="tqf-chart"></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>กราฟแสดงจำนวนกิจกรรมในแต่ละประเภทของกิจกรรม</label>
                            <div id="activity-chart"></div>
                        </div>
                    </div>
                    @else
                        <div class="heading-title heading-dotted text-center">
                            <h1>ยังไม่พบกิจกรรมในปีการศึกษานี้</h1>
                        </div>
                    @endif
                </div>
            </div>
            @if($count['sport']+$count['volunteer']+$count['academic']+$count['culture']+$count['ethics'] > 0)
                <div class = "panel panel-default">
                    <div class = "panel-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>ปีการศึกษา</label>
                                <select class="form-control select2" name="year" id="year">
                                    @foreach($act_year as $year)
                                        <option value="{{$year}}">ปีการศึกษา {{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="table-responsive margin-bottom-30">
                                <table class="table" id="activity-table">
                                    <tr>
                                        <th class="text-center" style="vertical-align:middle" rowspan="2">ชื่อกิจกรรม</th>
                                        <th class="text-center" style="vertical-align:middle" rowspan="2">ประเภทของกิจกรรม</th>
                                        <th class="text-center" style="vertical-align:middle" colspan="5">TQF<br></th>
                                        <th class="text-center" style="vertical-align:middle" rowspan="2">หน่วยงาน</th>
                                        <th class="text-center" style="vertical-align:middle" rowspan="2">สถานะ</th>
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
                                            <td>@if($act['tqf_knowledge']) <i class="fa fa-check"></i> @endif</td>endif
                                            <td>@if($act['tqf_cognitive']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_interpersonal']) <i class="fa fa-check"></i> @endif</td>
                                            <td>@if($act['tqf_communication']) <i class="fa fa-check"></i> @endif</td>
                                            <td class="text-center" style="vertical-align:middle" >97</td>
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
            @endif
        </div>
    </section>
@endsection

@section('css')
    <link href="/assets/css/c3.min.css" rel="stylesheet" type="text/css">
@endsection

@section('js-top')
    <script src="/js/d3.min.js" charset="utf-8"></script>
    <script src="/js/c3.min.js"></script>
@endsection

@section('js')
    <script>
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
                }
            }).fail(function () {
                _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                return false;
            });
        })
    </script>
@endsection
