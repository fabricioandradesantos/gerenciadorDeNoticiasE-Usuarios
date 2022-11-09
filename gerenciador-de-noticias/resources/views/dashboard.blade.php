@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')


<div id="search-container" class="col-md-6">
    <h1>Busque uma notícia</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Busca...">
    </form>
</div>

<div id="news-container" class="col-md-12">
    <div id="cards-container" class="row">
        @foreach($news as $new)
        <div class="card col-md-3">
            <a href="/news/{{ $new->id }}" class="btn btn-primary"> Visualizar</a>
            <img src="/img/news/{{ $new->image }}" alt="{{ $new->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $new->title }}</h5>
                <h6 class="card-description">{{ $new->description }}</h6>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
