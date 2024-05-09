function SwitchSteps(parent_class, step_Num=0) {
    if(step_Num == 0) {
        str = parent_class.toString();
        str = str.slice(-1);
        $(".step_" + str).css("display", "none");
        if(str != 5) {
            $(".step_" + String(Number(str) + 1)).css("display", "block");
        }
    } else {
        $(".step_" + String(step_Num)).css("display", "block");
    }
};

 

$(document).delegate( ".box_type2", "click", function() {
    parent = $(this).parent().parent().attr("class")
    text_inside_box = $(this).find(".main_text").text()
    if(parent == "step_1") 
    {
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const data = {
            'platform_title': text_inside_box
        } 
        $.ajax({
            url: '/api/getCategories', 
            type: 'GET',
            data: data,
            success: function(response) {
                response.forEach(function(category) {
                    $('.step_2').find(".platforms").append('<div class="platform box box_type2 flex"><div class="main_text">'+ category.name +'</div></div>')

                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert('Ошибка при отправке данных на сервер!');
            }
        });
        $("#result-platform-title").text(text_inside_box);
    } 
    else if(parent == "step_2") {
        $("#result-category-title").text(text_inside_box);
    }
    SwitchSteps(parent)
});

$('.step').click(function() {
    parent = $(this).parent()
    parent.find(".step").removeClass("active");
    $(this).addClass("active");
    if($(this).text().trim() == "Дополнительная информация") {
        SwitchSteps(parent, 4);
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

