<!DOCTYPE html>
<html>
  <head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./js/schedule.js"></script>
    <style>
      html, body {
          height: 100%;
      }

      body {
          margin: 0;
          padding: 0;
          width: 100%;
          display: table;
          font-weight: 100;
          font-family: 'Lato';
      }

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
  </head>
  <body>
    <div class="header">
      <div class="content">
        <div class="title">Schedule</div>
      </div>
    </div>

    <div id="drop-table" class="bold"></div>
    <div class="box resize-grid draggable">
      <div class="box-header box-dragger">>> Drag <<</div>
    </div>
  </body>
</html>
