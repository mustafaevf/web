$('.select-main').click(function() {
    parent = $(this).parent().parent()
    if($(parent).find(".select-options").css("display") == "none") {
        $(this).find('img').attr("src", "/images/expand_up.svg");
        $(parent).find(".select-options").slideDown(500);
    } else {
        $(this).find('img').attr("src", "/images/expand_down.svg");
        $(parent).find(".select-options").slideUp(500);
    }
});
$('.select-option').click(function () {
    if($(this).parent().css("display") != "none") {
        value = $(this).attr("value");
        $(this).parent().parent().attr("atr-select", value);
        $(this).parent().slideUp(500);
        $(this).parent().parent().find(".select-main").find(".secondary_text").text($(this).text().trim())
        $(this).parent().parent().find('img').attr("src", "/images/expand_down.svg");
    }
});