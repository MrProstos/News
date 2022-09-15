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
                        <a href="{{ $item->rssLink }}"><p
                                class="_title is-size-5 is-striped">{{ $item->creator }}</p></a>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $rss->links('pagination/custom')  }}
    </div>
@endsection
