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
        console.log(response)
        
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert('Ошибка при отправке данных на сервер!');
      }
    });
}