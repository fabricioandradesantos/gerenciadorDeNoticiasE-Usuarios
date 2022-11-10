@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Usuário') }}</h5>
                </div>
              
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <p>{{ __('Nome') }}</p>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name', auth()->user()->name) }}">
                                
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <p>{{ __('Email') }}</p>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}">
                                
                            </div>
                             
                            </div>
                            <a href="/index" class="btn btn-primary col-md-12">Voltar</a>
                    </div>

                    
        </div> 
@endsection
