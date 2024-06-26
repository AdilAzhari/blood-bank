<x-front.master>
    <div class="profile">
        <div class="container">
            <h2>{{ Auth()->guard('client')->user()->name }}'s Profile</h2>
            <h3>Favorite Articles</h3>
            <div class="favorites">
                @foreach ($favorites as $favorite)
                    <div class="favorite-item">
                        <h4>{{ $favorite->title }}</h4>
                        <p>{{ Str::limit($favorite->content, 100) }}</p>
                        <a href="{{ route('article-details', $favorite) }}">Read more</a>
                        <form method="POST" action="{{ route('favorite.toggle', $favorite) }}">
                            @csrf
                            <button type="submit" class="favorite-btn">
                                <i class="fas fa-heart"></i> Unfavorite
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-front.master>
