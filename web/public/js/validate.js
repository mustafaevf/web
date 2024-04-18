

$("input").blur(function(){
    result = $(this).val();

    if($(this).attr("type") == "text") {
        min_length = $(this).attr("min-length");
        max_length = $(this).attr("max-length");
        if(result.length < min_length || result.length > max_length) {
            $(this).parent().parent().find(".danger").css("display", "block");
            $(this).parent().parent().find(".danger").text("Ошибка, количество символов от " + min_length + " до " + max_length);
        } else {
            $(this).parent().parent().find(".danger").css("display", "none");
        }
    } 
    else if($(this).attr("type") == "number") {
        min_number = Number($(this).attr("min-number"));
        max_number = Number($(this).attr("max-number"));
        result = Number(result);
        if(result > max_number || result < min_number) {
            $(this).parent().parent().find(".danger").css("display", "block");
            $(this).parent().parent().find(".danger").text("Ошибка, цена должна быть в " + String(min_number) + " ₽ - " + String(max_number) + " ₽")
        } else {
            $(this).parent().parent().find(".danger").css("display", "none");
        }
    }
});