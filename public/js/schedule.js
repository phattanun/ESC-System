var resizeGridStep = 30;

$(function() {
  $( ".resize-grid" ).resizable({
    grid: resizeGridStep,
    minHeight: resizeGridStep,
    handles: "n,s"
  });
  $( ".draggable" ).draggable({
    handle: ".box-dragger",
    snap: ".dropable",
    snapMode: "inner",
    snapTolerance: resizeGridStep
  });

  var startHour = 7, endHour = 18;
  var roomName = ["","A","B","C","D","E"];
  var table = $('<table></table>').addClass('drop-container');
  var row = $('<tr></tr>').addClass('drop-row-container');
  for(room=0;room<roomName.length;room++) {
    row.append('<td>' + roomName[room] + '</td>');
  }
  table.append(row);
  for(hour = startHour; hour <= endHour;hour++) {
    for(minute=0;minute<60;minute+=30) {
      var row = $('<tr></tr>').addClass('drop-row-container');
      row.append('<td>' + (hour < 10? '0':'') + hour + ':' + (minute < 10? '0':'') + minute + '</td>');
      for(room=1;room<roomName.length;room++)
          row.append($('<td></td>').addClass('dropable'));
      table.append(row);
    }
  }
  $( "#drop-table" ).append(table);
});
