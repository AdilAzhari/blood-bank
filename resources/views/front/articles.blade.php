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
                    <h4>{{ $article->title }}</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    {{ $article->content }}
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
                                        <a href="{{ route('inside.article', $article) }}" class="click">more</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text">
                                            {{ $article->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">more</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">Method of disease prevention</h5>
                                    <p class="card-text">
                                        This text is an example of text that can be replaced in the same space. This
                                        text was generated.
                                    </p>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front.master>
