$(document).ready(function(){
    $(".small_fore").hide();
    $(".small_after").hide();
    $("#big_sort").change(function(){
        var a=document.getElementById("big_sort").value;
        if (a=="") {
            $(".small_after").hide();$(".small_fore").hide();
            $(".small_fore").val("");
            $(".small_after").val("");
        }
        if (a=="fore_end") {
            $(".small_after").hide();$(".small_fore").show();
            $(".small_fore").val("");
            $(".small_after").val("");
        }
        if (a=="after_end") {
            $(".small_after").show();$(".small_fore").hide();
            $(".small_fore").val("");
            $(".small_after").val("");
        }
        if (a=="other") {
            $(".small_after").hide();$(".small_fore").hide();
            $(".small_fore").val("");
            $(".small_after").val("");
        }
    });
});