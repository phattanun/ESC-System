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
                    <div class="row">
                        <div class="col-md-6">
                            <div id="activity-chart"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="tqf-chart"></div>
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
            }
        });
        var chart = c3.generate({
            bindto: '#tqf-chart',
            data: {
                columns: [
                    ["ด้านคุณธรรม จริยธรรม (Ethics and Moral)", {{$tqf['ethics']}}],
                    ["ด้านความรู้ (Knowledge)", {{$tqf['knowledge']}}],
                    ["ด้านทักษะทางปัญญา (Cognitive Skills)", {{$tqf['cognitive']}}],
                    ["ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)",{{$tqf['interpersonal']}}],
                    ["ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ (Numerical Analysis, Communication and Information Technology Skills)", {{$tqf['communication']}}],
                ],
                type : 'bar',
                axis: {
                    x: {
                        show : true,
                        categories: ['ด้านคุณธรรม จริยธรรม (Ethics and Moral)',
                            'ด้านความรู้ (Knowledge)',
                            'ด้านทักษะทางปัญญา (Cognitive Skills)',
                            'ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ (Interpersonal Skills and Responsibility)',
                            'ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ <br> (Numerical Analysis, Communication and Information Technology Skills)']
                    }
                }
            }

        });
    </script>
@endsection
