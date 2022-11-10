@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div id="new-create-container" class="col-md-6 offset-md-3">
    <h1> Crie uma notícia</h1>
    <form action="/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem para capa:</label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>
        <div class="form-group">
            <label for="title">Notícia:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo da notícia">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Conteúdo da notícia..." ></textarea>
        </div>
        <input type="submit" class="btn btn-create-news col-md-12" value="Criar Notícia" > 
        <a href="/home" class="btn btn-primary col-md-12">Voltar</a>
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


