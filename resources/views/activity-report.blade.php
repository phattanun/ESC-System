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
                    <div class = "row">
                        <div class="col-md-10">
                            <div id="tqf-chart"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div id="activity-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
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
            data : {
                columns: [
                    ['จำนวนกิจกรรม', {{$tqf['ethics']}}, {{$tqf['knowledge']}}, {{$tqf['cognitive']}}, {{$tqf['interpersonal']}}, {{$tqf['communication']}}]
                ],
                type: 'bar'
            },
            axis: {
                x: {
                    height: 50,
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
                    }
                }
            },
            legend: {
                show: false
            }
        });
    </script>
@endsection
