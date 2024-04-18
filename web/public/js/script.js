function href(link) {
  window.location.href = link;
}

$('#auth-login-submit').click(function() {
  const username = $('#auth-login').val();
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
      CreateNotify(response)
      
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
})
    

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

function CreateNotify(text) {
  $('.popup').find('.main_text').text(text);
  $('.popup').fadeIn();
  setTimeout(function() {
    $('.popup').fadeOut();
  }, 2000);
}


$('#edit-user-submit').click(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'login': $("#edit-user-login").val(),
    'balance': $("#edit-user-balance").val(),
    'status':  $("#edit-user-status").val(),
    'user_id': $("#edit-user-submit").attr("attr-user-id")
  } 
  $.ajax({
    url: '/admin/editUser', 
    type: 'POST',
    data: data,
    success: function(response) {
      CreateNotify(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
});

$('#add-params-submit').click(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'title': $("#add-params-title").val(),
    'type': $("#add-params-type").attr("attr-select"),
    'attr':  $("#add-params-attr").val(),
    'category_id': $(this).attr("attr-category-id")
  } 
  $.ajax({
    url: '/admin/addParams', 
    type: 'POST',
    data: data,
    success: function(response) {
      console.log(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
});

$('.open-modal-add-params').click(function() {
  var category_id = $(this).attr("attr-category-id");
  $('#add-params-submit').attr("attr-category-id", category_id);
  $('#modal-add-params').parent().fadeIn();
});

$('.open-modal-edit-user').click(function() {
  var user_id = $(this).attr("attr-user-id");
  var td = $(this).find("td");
  var user_login = td[0].innerText
  var balance = td[1].innerText
  var status = td[2].innerText

  $("#edit-user-login").val(user_login);
  $("#edit-user-balance").val(balance);
  alert(balance)
  $("#edit-user-status").val(status);
  $("#edit-user-submit").attr("attr-user-id", user_id);
  $('#modal-edit-user').parent().fadeIn();
});

$('#open-modal-auth').click(function() {
  $('#modal-auth').parent().fadeIn();
});

$('#open-modal-buy').click(function () {
  $('#modal-buy').parent().fadeIn();
});

$('.close').click(function() {
  if($(this).parent().parent().parent().attr("class") == "modal-wrapper") {
    $(this).parent().parent().parent().fadeOut();
  }
})


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
      console.log(response)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert('Ошибка при отправке данных на сервер!');
    }
  });
}  

function send_message(getter_id) {
  message_text = $('#message_text').val();

  if(message_text == '') {
    alert('fill')
    return
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  const data = {
    'message': message_text,
    'getter_id': getter_id
  } 
  $.ajax({
    url: '/message', 
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
      console.log(response)
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

$(".choose_btn").click(function () {
  parent = $(this).parent()
  parent.find(".choose_btn").removeClass("active");
  $(this).addClass("active");
});