@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content')

    @if($errors->any())
        <div class="callout callout-danger">
            <ul>
                <h4>Erro ao Editar</h4>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Editar Usuário</h3>
        </div>

        <div class="card-body">
            <form action="{{route('users.update', ['user' => $user->id])}}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Nome Completo</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Nova Senha</label>
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
                            <input type="submit" value="Salvar" class="btn btn-md btn-success">
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>


@endsection
