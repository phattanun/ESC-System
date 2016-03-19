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
    <div id="chart"></div>
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


    </script>
@endsection
