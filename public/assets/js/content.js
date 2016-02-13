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
        $(".tab-button-trash").removeClass("col-xs-offset-10");
        $(".tab-button-trash").addClass("col-xs-offset-8");
        $(".tab-button-edit").removeClass("col-xs-offset-10");
        $(".tab-button-edit").addClass("col-xs-offset-8");
        $(".tab-button-trash").removeClass("col-xs-1");
        $(".tab-button-trash").addClass("col-xs-2");
        $(".tab-button-edit").removeClass("col-xs-2");
        $(".tab-button-edit").addClass("col-xs-4");
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
        $(".tab-button-trash").removeClass("col-xs-offset-8");
        $(".tab-button-trash").addClass("col-xs-offset-10");
        $(".tab-button-edit").removeClass("col-xs-offset-8");
        $(".tab-button-edit").addClass("col-xs-offset-10");
        $(".tab-button-trash").removeClass("col-xs-2");
        $(".tab-button-trash").addClass("col-xs-1");
        $(".tab-button-edit").removeClass("col-xs-4");
        $(".tab-button-edit").addClass("col-xs-2");
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
        $(".tab-button-trash").removeClass("col-xs-offset-8");
        $(".tab-button-trash").addClass("col-xs-offset-6");
        $(".tab-button-edit").removeClass("col-xs-offset-8");
        $(".tab-button-edit").addClass("col-xs-offset-6");
        $(".tab-button-trash").removeClass("col-xs-2");
        $(".tab-button-trash").addClass("col-xs-3");
        $(".tab-button-edit").removeClass("col-xs-4");
        $(".tab-button-edit").addClass("col-xs-6");
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
        $(".tab-button-trash").removeClass("col-xs-offset-6");
        $(".tab-button-trash").addClass("col-xs-offset-8");
        $(".tab-button-edit").removeClass("col-xs-offset-6");
        $(".tab-button-edit").addClass("col-xs-offset-8");
        $(".tab-button-trash").removeClass("col-xs-3");
        $(".tab-button-trash").addClass("col-xs-2");
        $(".tab-button-edit").removeClass("col-xs-6");
        $(".tab-button-edit").addClass("col-xs-4");
        $(".tab-button-home").removeClass("col-xs-3");
        $(".tab-button-home").addClass("col-xs-2");
    }
}
