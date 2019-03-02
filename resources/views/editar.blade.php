@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id" id="id">
                        <div class="form-group row">
                            <label for="nif" class="col-md-4 col-form-label text-md-right">{{ __('NIF') }}</label>

                            <div class="col-md-6">
                                <input id="nif" type="text" class="form-control" name="nif" value="{{$user->nif}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                                
                                <input type="file" id="file" class="form-control" style="margin-left: 240px">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control" name="nick" value="{{$user->nick}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono Movil') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_movil" type="text" class="form-control" name="telefono_movil" value="{{$user->telefono_movil}}" required>
                            </div>
                        </div>

                        @if(Auth::User()->rol == 'Admin')
                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <input id="rol" type="text" class="form-control" name="rol" value="{{$user->rol}}" required>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="departamento" class="col-md-4 col-form-label text-md-right">{{__('Departamento')}}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="departamento" name="departamento">
                                    <option>Informática</option>
                                </select>
                            </div>                       
                        </div>

                        <div class="form-group row">
                            <label for="blog" class="col-md-4 col-form-label text-md-right">{{ __('Blog') }}</label>

                            <div class="col-md-6">
                                <input id="blog" type="text" class="form-control" name="blog" value="{{$user->blog}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('Github') }}</label>

                            <div class="col-md-6">
                                <input id="github" type="text" class="form-control" name="github" value="{{$user->github}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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

