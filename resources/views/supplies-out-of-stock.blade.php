@extends('masterpage')

@section('title')
    พัสดุหมด/เหลือน้อย
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('suppliesNavToggle')
    active
@endsection

@section('bodyTitle')
    พัสดุหมด/เหลือน้อย
@endsection

@section('content')

    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-briefcase"></i> พัสดุหมด/เหลือน้อยุ</h2>
                </div>
                <div class="panel-body">
                    </br>

                    {{--table part--}}
                    <div class="table-responsive">
                        <table class="table nomargin" id="search-result-table">
                        </table>
                    </div>
                    {{--end table part--}}

                    {{--excel button part--}}
                    <span class="pull-right" id="save-excel-btn">
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

    </script>
@endsection