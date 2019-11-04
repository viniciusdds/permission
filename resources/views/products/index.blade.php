@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('home')}}"><b><< Voltar</b></a>
            </div>
            <div class="pull-right">
                <h2>Lista Produtos Cadastrados</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <form action="{{route('products.index')}}" method="get">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
                <div class="pull-right">
                    <input class="form-control" type="text" name="search" />
                </div>
                    <!--<a class="btn btn-primary" href="{{route('search')}}"><i class="fa fa-search"></i></a>-->
                    <input type="hidden" value="{{$tipo}}" name="op" id="op" />
                    
            </form>
        </div>
    </div>
    <br>
        
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Nome</th>
        <th style="text-align: center;">Detalhes</th>
        <th style="text-align: center;">Usuário</th>
            @if($tipo->op == 'E')
               <th style="text-align: center;" width="300px">Ações</th>
            @endif
    </tr>
    
    @foreach($products as $product)
    <tr>
        <!--<td>{{++$i}}</td>-->
        <td style="text-align: center;">{{$product->id}}</td>
        <td style="text-align: center;">{{$product->name}}</td>
        <td style="text-align: center;">{{$product->detalhe}}</td>
        <td style="text-align: center;">{{$product->usuario}}</td>
            @if($tipo->op == 'E')
                <td style="text-align: center;">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" >
                            <a class="btn btn-info" href="{{ route('products.show', $product->id) }}"><b>Mostrar</b></a>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}"><b>Editar</b></a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><b>Deletar</b></button>        
                    </form>
                </td>
            @endif
    </tr>
    @endforeach
</table>
    {!! $products->links() !!}
</div>
@endsection