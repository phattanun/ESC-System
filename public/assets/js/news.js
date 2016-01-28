//$(".tab-button").click(function(){
//    $(this).toggleClass("action");
//});

$(".tab-button-home").click(function(){
    $(this).toggleClass("action");
});

$(".tab-button-edit").click(function(){
    $(this).addClass("action");
    var temp = $(this).attr("id").split('-');
    var id = temp[1];
    $("#activity-name-"+id).addClass("hide");
    $("#activity-content-"+id).addClass("hide");
    $("#activity-name-input-"+id).removeClass("hide");
    $("#activity-content-input-"+id).removeClass("hide");
    $("#cancel-button-"+id).removeClass("hide");
    $("#save-button-"+id).removeClass("hide");
    $("#browse-bar-"+id).removeClass("hide");
});

$(".cancel-button").click(function(){
    var temp = $(this).attr("id").split('-');
    var id = temp[2];
    $("#edit-"+id).removeClass("action");
    $("#activity-name-"+id).removeClass("hide");
    $("#activity-content-"+id).removeClass("hide");
    $("#activity-name-input-"+id).addClass("hide");
    $("#activity-content-input-"+id).addClass("hide");
    $("#cancel-button-"+id).addClass("hide");
    $("#save-button-"+id).addClass("hide");
    $("#browse-bar-"+id).addClass("hide");
});

/* ----------------------------------------------------------------------*/
/* Modal   ------------------------------------------------------------- */
/* ----------------------------------------------------------------------*/

$(".news-box").click(function(){
    window.history.pushState("object or string", "Title", "/new-url");
    //alert(document.URL);
});

$(".content-modal").click(function(e){
    if($(e.target).is('.modal-news-image') || $(e.target).is('.modal-news-box-card')){
        alert("bbb");
    }/*
    else {
        alert("aa");
        window.history.back();
    }*/
});

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
        $(".browse-save-button").removeClass("col-xs-offset-10");
        $(".browse-save-button").addClass("col-xs-offset-8");
        $(".browse-save-button").removeClass("col-xs-2");
        $(".browse-save-button").addClass("col-xs-4");
        $(".cancel-button").removeClass("col-xs-offset-8");
        $(".cancel-button").addClass("col-xs-offset-4");
        $(".cancel-button").removeClass("col-xs-2");
        $(".cancel-button").addClass("col-xs-4");
        $(".save-button").removeClass("col-xs-2");
        $(".save-button").addClass("col-xs-4");
        $(".tab-button-trash").removeClass("col-xs-offset-9");
        $(".tab-button-trash").addClass("col-xs-offset-6");
        $(".tab-button-trash").removeClass("col-xs-1");
        $(".tab-button-trash").addClass("col-xs-2");
        $(".tab-button-edit").removeClass("col-xs-1");
        $(".tab-button-edit").addClass("col-xs-2");
        $(".tab-button-home").removeClass("col-xs-1");
        $(".tab-button-home").addClass("col-xs-2");
    }
    else{
        $(".browse-save-button").removeClass("col-xs-offset-8");
        $(".browse-save-button").addClass("col-xs-offset-10");
        $(".browse-save-button").removeClass("col-xs-4");
        $(".browse-save-button").addClass("col-xs-2");
        $(".cancel-button").removeClass("col-xs-offset-4");
        $(".cancel-button").addClass("col-xs-offset-8");
        $(".cancel-button").removeClass("col-xs-4");
        $(".cancel-button").addClass("col-xs-2");
        $(".save-button").removeClass("col-xs-4");
        $(".save-button").addClass("col-xs-2");
        $(".tab-button-trash").removeClass("col-xs-offset-6");
        $(".tab-button-trash").addClass("col-xs-offset-9");
        $(".tab-button-trash").removeClass("col-xs-2");
        $(".tab-button-trash").addClass("col-xs-1");
        $(".tab-button-edit").removeClass("col-xs-2");
        $(".tab-button-edit").addClass("col-xs-1");
        $(".tab-button-home").removeClass("col-xs-2");
        $(".tab-button-home").addClass("col-xs-1");
    }

    if($windowSize < 512){
        $(".browse-save-button").removeClass("col-xs-offset-8");
        //$(".browse-save-button").addClass("col-xs-offset-8");
        $(".browse-save-button").removeClass("col-xs-4");
        $(".browse-save-button").addClass("col-xs-12");
        $(".cancel-button").removeClass("col-xs-offset-4");
        //$(".cancel-button").addClass("col-xs-offset-4");
        $(".cancel-button").removeClass("col-xs-4");
        $(".cancel-button").addClass("col-xs-6");
        $(".save-button").removeClass("col-xs-4");
        $(".save-button").addClass("col-xs-6");
        $(".tab-button-trash").removeClass("col-xs-offset-6");
        $(".tab-button-trash").addClass("col-xs-offset-3");
        $(".tab-button-trash").removeClass("col-xs-2");
        $(".tab-button-trash").addClass("col-xs-3");
        $(".tab-button-edit").removeClass("col-xs-2");
        $(".tab-button-edit").addClass("col-xs-3");
        $(".tab-button-home").removeClass("col-xs-2");
        $(".tab-button-home").addClass("col-xs-3");
    }else if ($windowSize < 768 ){
        //$(".browse-save-button").removeClass("col-xs-offset-8");
        $(".browse-save-button").addClass("col-xs-offset-8");
        $(".browse-save-button").removeClass("col-xs-12");
        $(".browse-save-button").addClass("col-xs-4");
        //$(".cancel-button").removeClass("col-xs-offset-4");
        $(".cancel-button").addClass("col-xs-offset-4");
        $(".cancel-button").removeClass("col-xs-6");
        $(".cancel-button").addClass("col-xs-4");
        $(".save-button").removeClass("col-xs-6");
        $(".save-button").addClass("col-xs-4");
        $(".tab-button-trash").removeClass("col-xs-offset-3");
        $(".tab-button-trash").addClass("col-xs-offset-6");
        $(".tab-button-trash").removeClass("col-xs-3");
        $(".tab-button-trash").addClass("col-xs-2");
        $(".tab-button-edit").removeClass("col-xs-3");
        $(".tab-button-edit").addClass("col-xs-2");
        $(".tab-button-home").removeClass("col-xs-3");
        $(".tab-button-home").addClass("col-xs-2");
    }
}