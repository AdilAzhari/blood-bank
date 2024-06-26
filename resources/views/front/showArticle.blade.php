<x-front.master>

    <div class="inside-article">
        <div class="container">
            <div class="path">
                <x-breadcrumb :items="['Home', 'Article:' . $article->title]" :routes="['/', '']" />
            </div>
            <div class="article-image">
                <img src="{{ asset('front/imgs/p1.jpg') }}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>Method of disease prevention</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    {{ $article->content }}
                </p> <br>
                <p>
                    This text is an example of text that can be replaced in the same space, this text has been generated
                    from the Arabic text generator, where you can generate such text or many other texts in addition to
                    increasing the number of characters that the application generates. If you need a larger number of
                    paragraphs, the Arabic text generator allows you to increase the number of paragraphs as you want,
                    the text will not appear divided and does not contain linguistic errors, the Arabic text generator
                    is useful for web designers in particular, as the client often needs to see a real picture For
                    website design. Hence, the designer must put temporary texts on the design to show the customer the
                    complete form, the role of the Arabic text generator is to spare the designer the trouble of
                    searching for an alternative text that has nothing to do with the topic the design is talking about.
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

                                {{-- <div class="card">
                                    <div class="photo">
                                        <img src="{{ asset('front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                        <a href="{{ route('article-details', $article) }}" class="click">more</a>
                                    </div>
                                    <form method="POST" action="{{ route('favorite.toggle', $article) }}"
                                        class="favourite-form">
                                        @csrf
                                        <button type="submit" class="favourite">
                                            @if (Auth::check() && Auth::user()->favorites->contains($article->id))
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
                                </div> --}}
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front.master>
