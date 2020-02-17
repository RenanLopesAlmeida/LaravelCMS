@extends('adminlte::page')

@section('title', 'Usuários')

@section('content')

    @if($errors->any())
        <div class="callout callout-danger">
            <ul>
                <h4>Erro ao Cadastrar</h4>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Novo Usuário</h3>
        </div>

        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" class="form-horizontal">

                @csrf

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Nome Completo</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Confirme sua Senha</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="Cadastrar" class="btn btn-md btn-success">
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>


@endsection
