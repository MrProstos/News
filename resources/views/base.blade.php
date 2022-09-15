<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <title>Новости</title>
</head>
<body>
<div class="columns is-mobile is-centered">
    <div class="column is-10 is-half">
        <div class="up-panel">
            <article class="panel is-info">
                <p class="panel-heading">Новости</p>
                <p class="panel-tabs is-size-5">
                    @switch($page)
                        @case('news')
                            <a class="tab__news is-active" href="/">Новости</a>
                            <a class="tab__sources" href="/src">Источники</a>
                            @break
                        @case('src')
                            <a class="tab__news" href="/">Новости</a>
                            <a class="tab__sources is-active" href="/src">Источники</a>
                            @break
                    @endswitch
                </p>
                <script></script>
                <div class="panel-block">
                    <input class="input column" type="date">
                    <input class="input column" type="date">
                    <div class="select is-info">
                        <select>
                            <option>Select dropdown</option>
                            <option>With options</option>
                        </select>
                    </div>
                </div>
                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input is-primary" type="text" placeholder="Поиск">
                        <span class="icon is-left"><i class="fas fa-search" aria-hidden="true"></i></span>
                    </p>
                </div>
            </article>
        </div>
    </div>
</div>
