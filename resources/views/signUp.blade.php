<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <title>Регистрация</title>
</head>
<body>
<div class="sign-up box">
    <div class="content title">
        <h1 class="has-text-centered">Регистрация</h1>
    </div>
    <form class="sign-up__form block" name="sign_up" method="POST" action="/signUp/registration/">
        @csrf
        <div class="username item block">
            <div class="username">Ваш логин</div>
            <label>
                <input class="input username__input" type="text" name="username">
            </label>
        </div>
        <div class="email item block">
            <div class="email">Ваш email</div>
            <label>
                <input class="input email__input" type="email" name="email">
            </label>
        </div>
        <div class="password item block">
            <div>Пароль</div>
            <label>
                <input class="input password__input" type="password" name="password" data-rule-password="true">
            </label>
        </div>
        <div class="password_confirm item block">
            <div>Подтвердите пароль</div>
            <label>
                <input class="input password_confirm__input" type="password" name="password_confirm"
                       data-rule-password="true" data-rule-equalTo=".password__input">
            </label>
        </div>
        <div class="block">
            <input class="send button is-success" type="submit" name="submit_btn" value="Регистрация">
        </div>
    </form>
</div>
</body>
