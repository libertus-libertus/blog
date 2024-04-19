@php
    $blog = App\Models\Blog::latest()->limit(3)->get();
@endphp

<section class="blog">
    <div class="container">
        <div class="row gx-1 justify-content-center">
            @foreach ($blog as $item)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('details.blog.page', $item->id) }}"><img
                                    src="{{ asset($item->blog_image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">{{ $item['category']['category'] }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                            <h3 class="title">
                                <a href="{{ route('details.blog.page', $item->id) }}">{{ $item->blog_title }}</a>
                                </h3>
                            <a href="{{ route('details.blog.page', $item->id) }}" class="read__more">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>
