@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<a href="/news/create" class="btn btn-create-news col-md-12"> Criar Notícia </a> 

<div id="search-container" class="col-md-12">

        <table class="table-news">
                <tr>
                    <th class="th-news-search">
                        <form action="/home" method="GET">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar uma notícia...">
                            <input type="submit" class="btn btn-primary col" value="Buscar">
                        </form>
                    </th>
                </tr>
        </table>  
</div>

<div id="news-container" class="col-md-12">
    @if($search)
        <h3> Resultado da busca por: {{ $search }} </h3>
    @endif
    <div id="cards-container" class="row">
        @foreach($news as $new)
        <div class="card col-md-3">
            
            <img src="/img/news/{{ $new->image }}" alt="{{ $new->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $new->title }}</h5>
                
                <a href="/news/{{ $new->id }}" class="btn btn-view-news"> Visualizar</a>
                <table class="table-news" >
                <tr>
                    <th class="th-news">
                    
                        <a href="/news/edit/{{ $new->id }}" class="btn btn-edit-news col"> Editar </a>
                        <form action="/news/{{ $new->id}}" method="POST" > 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">
                                Deletar
                            </button>
                        </form>
                    </th>
                    
                </tr>
            </table>

            </div>
        </div>
        @endforeach
        @if(count($news) == 0 && $search)
            <p>Não foi possível encontrar uma noticia sobre {{ $search}} <a href="/home">Ver todas</a></p>
        @elseif(count($news) == 0)
            <p>Não há notícias cadastradas <a href="/news/create">Criar uma Notícia</a></p>
        @endif
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
