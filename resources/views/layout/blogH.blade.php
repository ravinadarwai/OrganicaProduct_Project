<section class="section blog ">
    <div class="container my-5">
        <p class="section-subtitle"> -- News And Blog --</p>
        <h2 class="h2 section-title">Bright Side Vegetarianism</h2>
        <ul class="blog-list">
            @foreach ($products5 as $post)
                <li>
                    <div class="blog-card">
                        <figure class="card-banner">
                            <img src="{{ asset($post->image) }}" width="451" height="310" style="object-fit: cover;" loading="lazy" alt="{{ $post->title }}" class="w-100">
                        </figure>
                        <div class="card-content">
                            <div class="card-wrapper">
                                <div class="wrapper-item">
                                    <ion-icon name="calendar-clear-outline"></ion-icon>
                                    <time class="text" datetime="{{ $post->published_at }}">
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('d F, Y') }}
                                    </time>
                                </div>
                                <div class="wrapper-item">
                                    <ion-icon name="heart-outline"></ion-icon>
                                    <span class="text">{{ $post->likes }} Million</span>
                                </div>
                            </div>
                            <h3 class="h3 card-title">
                                <a href="{{ route('blog', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h3>
                            <a href="{{ route('blog', ['id' => $post->id]) }}">
                                <span>Read More</span>

                                <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
