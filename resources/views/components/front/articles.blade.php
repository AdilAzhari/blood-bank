<div class="articles">
    <div class="container title">
        <div class="head-text">
            <h2>Articles</h2>
        </div>
    </div>
    <div class="view">
        <div class="container">
            <div class="row">
                <div class="owl-carousel articles-carousel">
                    @foreach ($articles as $article)
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('article-details',$article) }}" class="click">more</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->excerpt }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
