<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <title>Вход</title>
</head>
<body>
<div class="sign-in box">
    <div class="title content">
        <h1 class="has-text-centered">Вход</h1>
    </div>
    <form class="sign-in__form block" name="sign_in" method="POST" action="/signIn/check">
        @csrf
        {{--        <script>ValidateSignIn()</script>--}}
        <div class="email block">
            <div class="email">Ваш email</div>
            <label>
                <input class="input email__input" type="email" name="email">
            </label>
        </div>
        <div class="password block">
            <div>Пароль</div>
            <label>
                <input class="input password__input" type="password" name="password">
            </label>
        </div>
        <div class="block">
            <input class="button is-success" type="submit" name="submit_btn" value="Войти">
        </div>
    </form>
    <div class="block">
        <p>Новый пользователь? <a class="tag is-link is-light is-rounded" href="/signUp/"> Регистрация</a></p>
    </div>
</div>
</body>
