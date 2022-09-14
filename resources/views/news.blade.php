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
                    <a class="is-active">Новости</a>
                    <a>Источники</a>
                </p>
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
                {{--        <a class="panel-block"><span class="panel-icon"><i class="fas fa-book" aria-hidden="true"></i></span>jgthms.github.io</a>--}}
            </article>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-128x128">
                            <img src="https://www.interfax.ru/ftproot/textphotos/2022/09/14/vo700.jpg" alt="hello">
                        </figure>
                    </div>
                    <div class="media-content">
                        <a href="https://www.interfax.ru/russia/862148"><p class="_title is-size-5 is-striped">В РФ
                                планируют за 8 лет снизить на 15% годовое
                                потребление спирта
                                на человека</p></a>
                        <p class="description">Минздрав РФ разработал концепцию сокращения потребления алкоголя в РФ на
                            период
                            до 2030 года, в рамках которой планируется снизить количество выпитого в пересчете на чистый
                            спирт
                            до 7,7 литров в год на человека.</p>
                        <div class="level">
                            <div class="level-left">
                                <p class="category">В России</p>
                            </div>
                            <div class="level-right">
                                <time class="is-justify-content-flex-end" datetime="2016-1-1"> Wed, 14 Sep 2022 16:58:00
                                    +0300
                                </time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
