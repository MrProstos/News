<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script src="/js/script.js"></script>
    <title>{{ $page }}</title>
</head>
<body>
<div class="columns is-mobile is-centered">
    <div class="column is-10 is-half">
        <div class="up-panel">
            <article class="panel is-info">
                <p class="panel-heading">{{ $page }}</p>
                <p class="panel-tabs is-size-5">
                    @switch($page)
                        @case('Новости')
                            <a class="tab__news is-active" href="/news/">Новости</a>
                            <a class="tab__sources" href="/src/">Источники</a>
                            @break
                        @case('Источники')
                            <a class="tab__news" href="/news/">Новости</a>
                            <a class="tab__sources is-active" href="/src/">Источники</a>
                            @break
                    @endswitch
                    <a class="is-info" href="/rss/">общий RSS поток</a>
                </p>
                @if($page === 'Новости')
                    <div class="panel-block">
                        <input class="input input__startDate column" type="date">
                        <input class="input input__endDate column" type="date">
                        <div class="select is-info">
                            <select class="select__source" id="selector">
                                <option class="default__select">Выберите источник</option>
                                @php
                                    $src = new \App\Http\Controllers\Src();
                                    $srcList = $src->scrList()
                                @endphp
                                @foreach($srcList as $item)
                                    <option>{{ $item['creator'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-block">
                        <p class="control has-icons-left">
                            <input class="input is-primary" type="text" placeholder="Поиск">
                            <span class="icon is-left"><i class="fas fa-search" aria-hidden="true"></i></span>
                        </p>
                        <button class="button search__button is-info" type="submit">Поиск</button>
                    </div>
                @endif
            </article>
            <script>searchAction()</script>
        </div>
        @yield('body')
    </div>
</div>
