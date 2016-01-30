
/* ----------------------------------------------------------------------*/
/* Modal   ------------------------------------------------------------- */
/* ----------------------------------------------------------------------*/
var prev_url;

$(".news-box").click(function(e){
    var content_id=$(this).attr("content");
    //alert(content_id);
    if($(e.target).is('.tab-button-edit') ){
        window.location.href = "/news/content/edit/"+content_id;
    }
    else{
        prev_url=document.URL;
        window.history.replaceState("object or string", "Title", "/news/content/"+content_id);
        open_modal(content_id);
    }
});

$(".content-modal").click(function(e){
    if($(e.target).is('.content-modal') ){
        window.history.replaceState("object or string", "Title", prev_url);
    }
});

function open_modal(content_id){
    var URL_ROOT = '{{Request::root()}}';
 alert(content_id);
    $.post(URL_ROOT + '/open_modal',
        { id: id ,_token:'{{csrf_token()}}'  } ).done(function( input ) {

        alert("555");

    });
}

/* ----------------------------------------------------------------------*/
/* respondsive  -------------------------------------------------------- */
/* ----------------------------------------------------------------------*/

$( document ).ready(function() {
    checkRespond();

});

$(window).resize(function() {
    checkRespond();
});

function checkRespond(){
    var $windowSize = $(window).width();

    if ($windowSize < 768 ){
        $(".tab-button-edit").removeClass("col-xs-offset-10");
        $(".tab-button-edit").addClass("col-xs-offset-9");
        $(".tab-button-edit").removeClass("col-xs-2");
        $(".tab-button-edit").addClass("col-xs-3");
    }
    else{
        $(".tab-button-edit").removeClass("col-xs-offset-9");
        $(".tab-button-edit").addClass("col-xs-offset-10");
        $(".tab-button-edit").removeClass("col-xs-3");
        $(".tab-button-edit").addClass("col-xs-2");
    }
}