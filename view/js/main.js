/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    const login = $('input[name="login"]').val();
    const password = $('input[name="password"]').val();
    const isLoginEmpty = login === '';
    const isPasswordEmpty = password === ''; 
    
    if (isLoginEmpty) {
        $('.msglog').text('Введите Логин');
    } else {
        $('.msglog').text('');
    }

    if (isPasswordEmpty) {
        $('.msgpas').text('Введите Пароль');
    } else {
        $('.msgpas').text('');
    }

    if (isLoginEmpty || isPasswordEmpty) {
        return;
    }

function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}

    $.ajax({
        url: 'connect/loginConnect.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {
            if (data.status) {
                document.location.href = '/profile.php';
            } else {         
                $('.msg').removeClass('none').text(data.message);     
            }

        }
    });

});


/*
    Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    const login = $('input[name="login"]').val();
    const password = $('input[name="password"]').val();
    const name = $('input[name="name"]').val();
    const email = $('input[name="email"]').val();
    const passwordConfirm = $('input[name="passwordConfirm"]').val();
    const isLoginEmpty = login === '';
    const isPasswordEmpty = password === ''; 
    const isNameEmpty = name === '';
    const isEmailEmpty = email === ''; 
    const isPasswordConfirmEmpty = passwordConfirm === '';
    var z = false;


    if (isNameEmpty) {
        $('.msgname').text('Поле Name не должно быть пустым');
    } else {
        $('.msgname').text('');
    }

    if (isLoginEmpty) {
        $('.msglog').text('Поле Login не должно быть пустым');
    } else {
        $('.msglog').text('');
    }

    if (isPasswordEmpty) {
        $('.msgpas').text('Поле Password не должно быть пустым');
    } else {
        $('.msgpas').text('');
    }

    if (isPasswordConfirmEmpty) {
        $('.msgCpas').text('Поле Password Confirm не должно быть пустым');
    } else {
        $('.msgCpas').text('');
    }

    if (isEmailEmpty) {
        $('.msgemail').text('Поле Email не должно быть пустым');
    } else {
        $('.msgemail').text('');
    }




console.log(name.length);


    for (var i = 0, n = name.length; i < n; i++) {
        if (name.charCodeAt(i) >= 65 && name.charCodeAt(i) <= 90 || name.charCodeAt(i) >= 97 && name.charCodeAt(i) <= 122 ) { 
            $('.msgname').text('');
        } else {
                $('.msgname').text('Поле с именем должно состоять из латинских букв');
                }
        }

    for (var i = 0, n = login.length; i < n; i++) {
        if (login.charCodeAt(i) >= 65 && login.charCodeAt(i) <= 90 || login.charCodeAt(i) >= 97 && login.charCodeAt(i) <= 122 || login.charCodeAt(i) >= 48 && login.charCodeAt(i) <= 57) { 
            $('.msglog').text('');
        } else {
                $('.msglog').text('Поле с логином не должно иметь пробелов');
                }
        }

    for (var i = 0, n = password.length; i < n; i++) {
        if (password.charCodeAt(i) >= 65 && password.charCodeAt(i) <= 90 || password.charCodeAt(i) >= 97 && password.charCodeAt(i) <= 122 || password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57) { 
            $('.msgpas').text('');
        } else {
                $('.msgpas').text('Поле с паролем должно состоять из латинских букв и цифр');
                }
        }
    for (var i = 0, n = passwordConfirm.length; i < n; i++) {
        if (passwordConfirm.charCodeAt(i) >= 65 && passwordConfirm.charCodeAt(i) <= 90 || passwordConfirm.charCodeAt(i) >= 97 && passwordConfirm.charCodeAt(i) <= 122 || passwordConfirm.charCodeAt(i) >= 48 && passwordConfirm.charCodeAt(i) <= 57) { 
            $('.msgCpas').text('');
        } else {
                $('.msgCpas').text('Поле с подтверждением пароля должно cостоять из латинских букв и цифр');
                }
        }



    for (var i = 0, n = email.length; i < n; i++) {
        if (email.charCodeAt(i) >= 64 && email.charCodeAt(i) <= 90 || email.charCodeAt(i) >= 97 && email.charCodeAt(i) <= 122 || email.charCodeAt(i) >= 48 && email.charCodeAt(i) <= 57 || email.charCodeAt(i) == 46 || email.charCodeAt(i) == 45) { 
            $('.msgemail').text('');
        } else {
                $('.msgemail').text('Не правильно введен Email');
                } 
                if (email.charCodeAt(i) == 64) {
                   z = true; 
                }
        }

        if (z == false) {
            $('.msgemail').text('Не правильно введен Email');
        }

        if (name.length < 2 ) {
            $('.msgname').text('Поле с именем должно иметь не мение 2 букв, но не более 3');
        }

        if (name.length > 3 ) {
            $('.msgname').text('Поле с именем должно иметь не мение 2 букв, но не более 3');
        }

        if (login.length < 6) {
            $('.msglog').text('Поле с логином должно иметь не мение 6 символов');
        }

        if (password.length < 6) {
            $('.msgpas').text('Поле с паролем должно иметь не мение 6 символов');
        }

        if (password == passwordConfirm) {

        } else {
            $('.msg').text('Пароли не совпадают');
        }

    if (isLoginEmpty || isPasswordEmpty || isNameEmpty || isEmailEmpty || isPasswordConfirmEmpty) {
        return;
    }

function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}

    $.ajax({
        url: 'connect/registerConnect.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            login: login,
            password: password,
            passwordConfirm: passwordConfirm,
            email: email
        },
        success (data) {
            if (data.status) {
                document.location.href = '/login.php';
            } else {
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});