@extends('layouts.app')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Tela de Gerenciamento do Sistema</b></div>


                <div class="card-body">

                    <form method="GET" action="{{url('permissionupdate')}}" >
                        {!! csrf_field() !!}
                        
                        <label><b>Usuários:</b></label>
                        <select class="form-control" name="name" id="name">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        <br>

                        <label><b>Permissões:</b></label>
                        <select class="form-control" name="user_type" id="user_type">
                            <option value="admin">ADMINISTRADOR</option>
                            <option value="editor">MODERADOR</option>
                            <option value="user">USUÁRIO</option>
                        </select>

                        <br>
                        <a href="{{route('home')}}" class="btn btn-primary"><b><< Voltar</b></a>
                        <button type="submit" class="btn btn-primary"><b>Alterar Permissão</b></button>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection