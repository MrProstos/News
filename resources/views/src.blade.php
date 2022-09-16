@extends('base')

@section('body')
    <div class="card">
        @foreach ($rss as $item)
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-128x128">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="hello">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="button is-info is-size-5">{{ $item->creator }}</div>
                        <div>Количество статей {{ $item->cnt }}</div>
                        <div>Дата последней публикации: {{ $item->lastPubDate }}</div>
                        <div><a href="{{ $item->rssLink }}">{{ $item->rssLink }}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $rss->links('pagination/custom')  }}
    </div>
@endsection
