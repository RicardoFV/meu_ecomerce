@extends('layouts.app')

@section('content')

<div class="container">
    <!-- colocando a mensagem de erro -->
    @include('mensagens.erro_cadastro')
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alterar Usuário') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.atualizar', $usuario->id) }}">
                        @csrf
                        <input type="hidden" id="ativo" value="{{$usuario->ativo}}" name="ativo" value="1">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$usuario->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label for="permissao" class="col-md-4 col-form-label text-md-right">{{ __('Permissao') }}</label>

                            <div class="col-md-6">
                                
                                <select id="permissao" name="permissao" class="form-control">
                                    <option value="administrador" <?= ($usuario->permissao =='administrador')? 'selected' : '' ?> >Administrador</option> 
                                    <option value="vendedor" <?= ($usuario->permissao == 'vendedor')? 'selected' : '' ?> >Vendedor</option>
                                    <option value="cliente" <?= ($usuario->permissao == 'cliente')? 'selected' : '' ?> >Cliente</option>
                                </select>
                            </div>
                            
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" value="{{$usuario->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection