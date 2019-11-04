@extends('layouts.app')

@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">  
                <a class="btn btn-primary" href="{{route('products.index', 'op=E')}}"><b><< Voltar</b></a>
            </div>
            <div class="pull-right">
                <h2>Editar Produto</h2>
            </div>
        </div>
    </div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> houve algum problema ao editar.<br><br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>
<form action="{{route('products.update', $product->id)}}" method="POST">
    @csrf
    @method('PUT')
    
	<input type="hidden" name="usuario" value="{{$usuario}}" />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nome" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes:</strong>
                <textarea class="form-control" style="height: 150px;" name="detalhe" placeholder="Detalhes">{{$product->detalhe}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><b>Confirmar Edição</b></button>
        </div>
    </div>
</form>

@endsection
