<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($items as $item)
                        @if (isset($item['route']) && $item['route'])
                            <li class="breadcrumb-item {{ $item['isActive'] }}">
                                <a href="{{ $item['route'] }}">{{ $item['name'] }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item {{ $item['isActive'] }}">{{ $item['name'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
