<x-front.master bodyClass="article-details">
    <!--inside-article-->
    <div class="inside-article">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Articles']" :routes="['/', '/articles']" />
            <div class="article-image">
                <img src="{{ asset('front/imgs/p1.jpg') }}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>{{ $Article->title }}</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    {{ $Article->content }}
                </p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>Related articles</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach ($articles as $article)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{ asset('front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                        <a href="{{ route('article-details', $article) }}" class="click">more</a>
                                    </div>
                                    <form method="POST" action="{{ route('favorite.toggle', $article) }}"
                                        class="favourite-form">
                                        @csrf
                                        <button type="submit" class="favourite">
                                            @if (Auth::guard('client')->check() &&
                                                    Auth::guard('client')->user()->favorites->contains($article->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text">{{ Str::limit($article->content, 50) }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--inside-article-->
</x-front.master>
