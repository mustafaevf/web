// const { redirect } = require("express/lib/response");

// const { param } = require("express/lib/request");

function href(link) {
  window.location.href = link;
}

$('img').click(function () {
  if($(this).parent().attr('class') == 'modal-header') {
    $(this).parent().parent().parent().parent().css('display', 'none')
  }
})

$('.select-main').click(function() {
  el = $(this).find('.select_opened')
  if(el.hasClass("hide")) {
    el.removeClass("hide");
    $(this).find(".select").find("img").attr("src", "http://127.0.0.1:8000/images/expand_up.svg")
  } else {
    el.addClass("hide");
    $(this).find(".select").find("img").attr("src", "http://127.0.0.1:8000/images/expand_down.svg")
  }
})

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

function editCategory(id) {
  category_name = $("#admin_edit_category-name").val()
  alert(category_name)
  category_id = id
  if(category_id == '' || category_name == '') {
    alert("Заполините все поля")
    return
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'name': category_name,
    'id': category_id
  } 
  $.ajax({
    url: '/admin/editCategory', 
    type: 'POST',
    data: data,
    success: function(response) {
      alert(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}



function openModal(type, id) {
  if(type == "editCategory") {
    $(".modal-wrapper").last().css('display', 'flex');
    $(".modal-header").last().find('h3').html("Редактирование")
    $(".modal-body").last().html("<div class='form'><div class='input'><input type='text' id='admin_edit_category-name' placeholder='Название'></div><button onclick='editCategory(" + id +")'>Сохранить</button></div>")
  }

  if(type == "addPlatform") {
    $('#modal_add').css('display', 'flex');
  }  // if(type == "addCategory") {
  //   $(".modal-wrapper").css('display', 'flex');
  //   $(".modal-header").find('h3').html("Добавление")
  //   $(".modal-body").html("<div class='form'><div class='input'><input type='text'></div><button onclick='editCategory(" + id +")'>Сохранить</button></div>")
  // }
  if(type == "addCategory") {
    $('#modal_add').css('display', 'flex');
  }
  if(type == "sell") {
    $("#modal_sell").css('display', 'flex');
    // $(".modal-header").find('h3').html("Выберите платформу")
    // $(".modal-body").html("<div class='form'><div class='select'></div><div class='select_opened hide'><ul></ul></div><button>Выбрать</button></div>")
  
  }
}

$("li").click(function() {
  var findedClass = $(this).parent().parent();
  
  console.log($(this).parent().parent().parent().parent().parent().parent().parent().attr('id'))
  if(findedClass.attr("class") == "select_opened") {
    var text = $(this).text();
    var elementsWithSelectClass = $('.select');
    elementsWithSelectClass.find("span").html(text);
    findedClass.addClass("hide")
    $(".select").find("img").attr("src", "http://127.0.0.1:8000/images/expand_down.svg")
    console.log(findedClass.parent())
    if(findedClass.attr('id') == "select_for_sell") {
      href('http://127.0.0.1:8000/sell/' + $(this).find('span').text());
    }
  }
  var el = $(this).parent().parent().parent().parent().parent().parent().parent()
  if(el.attr('id') == "modal_sell") {
    href('http://127.0.0.1:8000/sell/' + $(this).find('span').text());
  }
});

function sell_confirm(platform_id) {
  title = $("#sell-title").val();
  description = $("#sell-description").val();
  price = $("#sell-price").val();
  category = $(".select").first().find("span").text();
  alert(category)
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

function admin_delete_category(category_id) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'category_id': category_id
  } 
  $.ajax({
    url: '/admin/deleteCategory', 
    type: 'POST',
    data: data,
    success: function(response) {
      alert(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}  



function admin_add_platform() {
  platform_title = $('#admin_add_platform-name').val();

  if(platform_title == '') {
    alert('12312')
    return
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'platform_title': platform_title
  } 
  $.ajax({
    url: '/admin/addPlatform', 
    type: 'POST',
    data: data,
    success: function(response) {
      alert(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });

}

function admin_delete_platform(platform_id) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'platform_id': platform_id
  } 
  $.ajax({
    url: '/admin/deletePlatform', 
    type: 'POST',
    data: data,
    success: function(response) {
      alert(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}  


function admin_add_category() {
  category_title = $("#admin_add_category-name").val()
  platform_title = $("#admin_add_category-platform_id").find('span').text()
  if(category_title == '' || platform_title == '') {
    alert("заполните все поля")
    return
  }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'category_title': category_title,
    'platform_title': platform_title
  } 
  $.ajax({
    url: '/admin/addCategory', 
    type: 'POST',
    data: data,
    success: function(response) {
      alert(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}