$(document).ready(function(){
    $(".form-item input,.form-item textarea").on("focus",function(){
        $(this).css({
            "border": "1.5px solid rgba(118, 226, 146, 0.6)",
            "box-shadow" : "0 0 7px rgba(118, 226, 146, 0.6)"
        });
    });
    $(".form-item input, .form-item textarea").on("blur",function(){
        $(this).css({
            "border": "1px solid #CCC",
            "box-shadow" : "0 0 0"
        });
    });

    $(".alert-danger .close").on("click", function(){
        $(this).parent().fadeOut();
    });
});