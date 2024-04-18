function SwitchSteps(parent_class) {
    str = parent_class.toString();
    str = str.slice(-1);
    $(".step_" + str).css("display", "none");
    if(str != 5) {
        $(".step_" + String(Number(str) + 1)).css("display", "block");
    }
};

$(".box_type2").click(function() {
    parent = $(this).parent().parent().attr("class")
    text_inside_box = $(this).find(".main_text").text()
    SwitchSteps(parent)
    if(parent == "step_1") 
    {
        $("#result-platform-title").text(text_inside_box);
    } 
    else if(parent == "step_2") {
        $("#result-category-title").text(text_inside_box);
    }
});

$("button").click(function () {
    parent = $(this).parent().parent().parent().attr("class");
    if(parent = "step_3") {
        if($("#product-title").val().length != 0) {
            $("#result-product-title").text($("#product-title").val());
        }
        if($("#product-description").val().length != 0) {
            $("#result-product-description").text($("#product-description").val());
        }
        if($("#product-price").val().length != 0) {
            $("#result-product-price").text($("#product-price").val());
        }
    }
    SwitchSteps(parent);
});

