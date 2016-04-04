@extends('masterpage')

@section('title')
    จัดการการยืมพัสดุ
@endsection
@section('body-attribute')
@endsection
@section('suppliesNavToggle')
    active
@endsection
@section('bodyTitle')
    จัดการการยืมพัสดุ
@endsection
@section('content')
    <section style="margin-top: -40px">
        <div class = "container">
            <div class = "panel panel-default">
                {{--<div class="panel-heading panel-heading-transparent">--}}
                {{--<h2 class="panel-title">เพิ่มกิจกรรม</h2>--}}
                {{--</div>--}}
                <div class = "panel-body">
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" id="activity-table" width="100%">
                            <tr>
                                <th style="vertical-align:middle;text-align: center;width:15%">ใบยืมพัสดุลำดับที่</th>
                                <th style="vertical-align:middle;text-align: center;width:30%">กิจกรรม</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">หน่วยงาน</th>
                                <th style="vertical-align:middle;text-align: center;width:20%">ผู้ขอยืม</th>
                                <th style="vertical-align:middle;text-align: center;width:15%"></th>
                            </tr>
                            <tr>
                                <td style="vertical-align:middle;text-align: center">35012</td>
                                <td style="vertical-align:middle;text-align: center">ค่ายลานเกียร์ครั้งที่ 15</td>
                                <td style="vertical-align:middle;text-align: center">ชมรมค่ายลานเกียร์</td>
                                <td style="vertical-align:middle;text-align: center">นายปฏิพล เจียมมั่นจิต</td>
                                <td style="vertical-align:middle;text-align: center">
                                    <button type="button" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target=".act_detail">
                                        <i class="fa fa-edit"></i>
                                        <span>แก้ไข</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')

@endsection

@section('js')
@endsection