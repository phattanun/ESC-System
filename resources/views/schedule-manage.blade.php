@extends('masterpage')

@section('title')
    อนุมัติการจอง
@endsection
@section('content')
  <div class="schedule-container">
    <div id="drop-table" class="bold"></div>
    <div class="box resize-grid draggable">
      <div class="box-header box-dragger">>> Drag <<</div>
    </div>
  </div>
@endsection

@section('css')
  <style>
    .header {
        text-align: center;
        display: table-cell;
        vertical-align: top;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 96px;
    }

    .box {
      /* Custom */
      position: absolute;
      top: 500px;
      left: 1000px;

      width: 100px;
      height: 60px;

      box-shadow: inset 0px 0px 0px 2px black;
      background: aliceblue;
      overflow: hidden;
    }

    .box-header {
      display: flex;
      height: 30px;
      width: 100%;
      justify-content: center;
      align-items: center;

      /* Custom */
      color: white;
      background: gray;
      font-weight: bold;
    }
    .bold {
      font-weight: bold;
    }

    .schedule-container {
      height: 1000px;
    }

    table {
      border-collapse:collapse;
      border: solid 2px;
    }
    table td {
      margin: 0px;
      padding: 0px;
      height: 30px;
      width:100px;
      box-shadow: inset 0px 0px 0px 1px black;
    }

    table tr:first-child, table tr td:first-child {
      text-align: center;
    }

    #drop-table {
      position:absolute;
      top:150px;
      left:300px;
    }
  </style>
@endsection

@section('js')
  <link href="{{url('assets/plugins/jquery/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{url('assets/plugins/jquery/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/schedule.js')}}"></script>
@endsection
