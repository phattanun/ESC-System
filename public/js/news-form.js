var ajaxDebugData;
$("#upload_form").change(function() {
  console.log("Update!!");
  var formData = new FormData($("#upload_form")[0]);
  $.ajax({
      url:  '{{url("/news/upload/image")}}',
      type: 'POST',
      headers: { "X-CSRF-Token" : "{{ csrf_token() }}" },
      data: formData,
      processData: false,
      contentType: false
  }).done(function(data) {
      console.log(data);
      ajaxDebugData = data;
      if(data.hasOwnProperty('image')) {
        $('#news-image-{{$news[0]->id}}').css( 'background-image', 'url("' + data.image + '")' );
      }
      else {
        alert("รูปไม่ผ่านนะจ๊ะ..!!");
      }
  });
});
