<div class="container">
    <div class="path">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($items as $index => $item)
                    @if ($index < count($items) - 1)
                        <li class="breadcrumb-item"><a href="{{ $routes[$index] }}">{{ $item }}</a></li>

                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>
