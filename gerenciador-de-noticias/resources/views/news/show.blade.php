@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<a href="/home" class="btn btn-primary col-md-12">Voltar</a>
<div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-12">
                <img src="/img/news/{{ $new->image }}" class="img-fluid" alt="{{ $new->title }}">
            </div>
        <div id="info-container" class="col-md-12 new-text">
            <h1>{{ $new->title }}</h1>
        </div>
            <div class="col-md-12 new-text" id="description-container">
                <h3>Conteúdo:</h3>
                <p class="new-description">{{ $new->description }}</p>
            </div>
        </div>
  </div>
<a href="/home" class="btn btn-primary col-md-12">Voltar</a>









@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush