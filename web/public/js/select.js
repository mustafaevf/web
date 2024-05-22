$('.select-main').click(function() {
    parent = $(this).parent()
    width = parent.css('width');
    if($(parent).find(".select-options").css("display") == "none") {
        $(this).find('img').attr("src", "/images/expand_up.svg");
        $(parent).find(".select-options").slideDown(500);
        $(parent).find('.select-options').css('width', width);
    } else {
        $(this).find('img').attr("src", "/images/expand_down.svg");
        $(parent).find(".select-options").slideUp(500);
    }
});
$('.select-option').click(function () {
    if($(this).parent().css("display") != "none") {
        value = $(this).attr("value");
        if($(this).parent().parent().attr('id') == 'add-category-platform_id') {
            $('input[name="platform_id"]').val(value);
        }
        $(this).parent().parent().attr("attr-select", value);
        $(this).parent().slideUp(500);
        $(this).parent().parent().find(".select-main").find(".secondary_text").text($(this).text().trim())
        $(this).parent().parent().find('img').first().attr("src", "/images/expand_down.svg");
    }
});
$('.dropdown-main').click(function() {
    parent = $(this).parent().parent()
    if($(parent).find(".dropdown-options").css("display") == "none") {
        $(this).find('img').last().attr("src", "/images/expand_up.svg");
        $(parent).find(".dropdown-options").slideDown(500);
    } else {
        $(this).find('img').last().attr("src", "/images/expand_down.svg");
        $(parent).find(".dropdown-options").slideUp(500);
    }
});