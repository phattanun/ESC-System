//$(".tab-button").click(function(){
//    $(this).toggleClass("action");
//});

$(".tab-button-home").click(function(){
    $(this).toggleClass("action");
});

$(".tab-button-edit").click(function(){
    var temp = $(this).attr("id").split('-');
    var id = temp[1];
    $("#activity-name-"+id).addClass("hide");
    $("#activity-content-"+id).addClass("hide");
    $("#activity-name-input-"+id).removeClass("hide");
    $("#activity-content-input-"+id).removeClass("hide");
    $("#save-button-"+id).removeClass("hide");
    $("#browse-button-"+id).removeClass("hide");
});