@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Menu Principal</b></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('isAdmin')
                        <div class="row">    
                            <div class="col-md-6">
                                <a href="{{route('products.index', 'op=V' )}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                    <h2>Visualizar Produtos</h2>
                                    <i class="fa fa-list-alt fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                            
                            <div class="col-md-6">
                                <a href="{{route('products.create')}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                   <h2>Novo Produto</h2>
                                    <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('products.index', 'op=E' )}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                   <h2>Editar Produto</h2>
                                    <i class="fa fa-edit fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('permission')}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                    <h2>Alterar Permissão</h2>
                                     <i class="fa fa-exchange fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>    
                    @endcan

                    @can('isEditor')
                        <div class="row">    
                            <div class="col-md-4">
                                <a href="{{route('products.index', 'op=V' )}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                    <h2 style="margin-left: -20px;">Visualizar Produtos</h2>
                                    <i class="fa fa-list-alt fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('products.create')}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                   <h2>Novo Produto</h2>
                                    <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('products.index', 'op=E' )}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                   <h2>Editar Produto</h2>
                                    <i class="fa fa-edit fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    @endcan

                    @can('isAuthor')
                         <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a href="{{route('products.index', 'op=V' )}}" class="btn btn-success" style="padding: 50px; width: 100%; height: 100%;">
                                    <h2 style="margin-left: -20px;">Visualizar Produtos</h2>
                                    <i class="fa fa-list-alt fa-5x" aria-hidden="true"></i>
                                </a>
                            </div>
                         </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
