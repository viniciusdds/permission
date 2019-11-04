@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('products.index', 'op=E')}}"><b><< Voltar</b></a>
            </div>
            <div class="pull-right">
                 <h2>Detalhes do Produto</h2>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 border alert alert-warning">
            <div class="form-group">
                <strong>Nome:</strong>
                {{$product->name}}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 border alert alert-warning">
            <div class="form-group">
                <strong>Detalhes:</strong>
                {{$product->detalhe}}
            </div>
        </div>
    </div>
</div>
@endsection
