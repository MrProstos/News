@include('base')

<div class="card">
    @foreach ($news as $item)
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-128x128">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="hello">
                    </figure>
                </div>
                <div class="media-content">
                    <a href="{{ $item->link }}"><p
                            class="_title is-size-5 is-striped">{{ $item->title }}</p></a>
                    <p class="description">{{ $item->desc }}</p>
                    <div class="level">
                        <div class="level-left">
                            <p class="category">{{ $item->category }}</p>
                        </div>
                        <div class="level-right">
                            <time class="is-justify-content-flex-end"
                                  datetime="2016-1-1">{{ $item->pubDate }}</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $news->links('pagination/custom')  }}
</div>


