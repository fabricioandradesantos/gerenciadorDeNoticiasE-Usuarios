@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div id="new-create-container" class="col-md-6 offset-md-3">
    <h1> Crie uma notícia</h1>
    <form action="/news" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Notícia:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo da notícia">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Conteúdo da notícia..." ></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Notícia">
    </form>
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


