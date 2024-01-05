// const { redirect } = require("express/lib/response");

function href(link) {
  window.location.href = link;
}


function login() {
    const username = $('#auth-username').val();
    const password = $('#auth-password').val();
  
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: '/login', 
      type: 'POST',
      data: {
        username: username,
        password: password
      },
      success: function(response) {
        if(response == 'ok') {
          href('/');
        }
        console.log(response)
        
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert('Ошибка при отправке данных на сервер!');
      }
    });
}

function register() {
    const username = $('#auth-login').val();
    const email = $('#auth-email').val();
    const password = $('#auth-password').val();
    const rePassword = $('#auth-re-password').val();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const data = {
      'username': username,
      'password': password,
      'email': email,
      'repassword': rePassword
    } 
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/register', 
      type: 'POST',
      data: data,
      success: function(response) {
        if(response == 'ok') {
          href('/login');
        }
        console.log(response)
        
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert('Ошибка при отправке данных на сервер!');
      }
    });
}
$('#choose-category').click(function() {
  if($(".select_opened").hasClass("hide")) {
    $(".select_opened").removeClass("hide");
    $(this).find("img").attr("src", "http://127.0.0.1:8000/images/expand_up.svg")
  } else {
    $(".select_opened").addClass("hide");
    $(this).find("img").attr("src", "http://127.0.0.1:8000/images/expand_down.svg")
  }
});

$("li").click(function() {
  var findedClass = $(this).parent().parent().attr("class");
  if(findedClass == "select_opened") {
    var text = $(this).text();
    var elementsWithSelectClass = $('.select');
    elementsWithSelectClass.find("span").html(text);
    $("." + findedClass).addClass("hide");
    $(".select").find("img").attr("src", "http://127.0.0.1:8000/images/expand_down.svg")
  }
  alert(myClass);
});

function sell_confirm(platform_id) {
  title = $("#sell-title").val();
  description = $("#sell-description").val();
  price = $("#sell-price").val();
  category = $(".select").find("span").text();
  info = $("#sell-info").val();
  
  if(category == "Выберите") {
    alert("Выберите категорию товара")
    return;
  }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'title': title,
    'description': description,
    'price': price,
    'category': category,
    'info': info,
    'platform_id': platform_id
  } 
  $.ajax({
    url: '/addProduct', 
    type: 'POST',
    data: data,
    success: function(response) {
      console.log(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}
