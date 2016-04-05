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
                                    <button type="button" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target="#act-detail" onclick="loadData('id')">
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
    <div id="act-detail" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div id="header" class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 id="title" class="modal-title">Title</h4>
          </div>
          <div id="content" class="modal-body">
            <p id="detail">Content<p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script type="text/javascript">
        function replace(data, postCallback) {
            var modal = $("#act-detail");
            console.log(data);

            var infoTabs = Object.getOwnPropertyNames(data);
            for(i in infoTabs) {
                var names = Object.getOwnPropertyNames(data[infoTabs[i]]);
                for(j in names) {
                    //console.log("#"+infoTabs[i]+" *[id="+names[j]+"]");
                    modal.find("#"+infoTabs[i]+" *[id="+names[j]+"]:not(input)").html(data[infoTabs[i]][names[j]]);
                    modal.find("#"+infoTabs[i]+" input[id="+names[j]+"]").val(data[infoTabs[i]][names[j]]);
                    if(postCallback != null)
                        postCallback(names[j],modal.find("#"+infoTabs[i]+" *[id="+names[j]+"]"),data[infoTabs[i]][names[j]]);
                }
            }
        }
        function loadData(id) {
            replace({
                'header' : { 'title': 'Replaced Title'},
                'content' : { 'detail' : 'Replaced Content' }
            });
        }
    </script>
@endsection
