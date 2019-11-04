@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>Adicionar Novo Produto</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('home')}}"><b><< Voltar</b></a>
            </div>
        </div>
    </div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> houve algum problema ao cadastrar.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif
<hr>
<form action="{{route('products.store')}}" method="POST">
    @csrf
    
	<input type="hidden" name="usuario" value="{{$usuario}}" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="name" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes:</strong>
                <textarea class="form-control" style="height: 150px;" name="detalhe" placeholder="Detalhes"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><b>Confimar Cadastro</b></button>
        </div>
    </div>
</form>

@endsection