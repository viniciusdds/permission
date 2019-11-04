<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tipo;
use App\User;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function index(Request $request) {

        $btn = $request->query();
        $page = $request->query('page');
        $valor = new Tipo();
        if ($page == null) {

            if (array_key_exists("search", $btn)) {
                $search = $request->get('search');
                $products = DB::table('products')->when($search, function ($query) use ($search ) {
                            return $query->where('name', 'like', '%' . $search . '%')
                                            ->orWhere('detalhe', 'like', '%' . $search . '%')
                                            ->orWhere('id', 'like', '%' . $search . '%')
											->orWhere('usuario', 'like', '%' . $search . '%');
                        })->paginate(5);
                $tipo = Tipo::find(1);
                             
                return view('products.index', compact('products', 'tipo'))
                                ->with('i', (request()->input('page', 1) - 1) * 5);
            } else {

                
                if ($valor->count() > 0) {
                    $valor = DB::table('tipos')->where('id', 1)->update($btn);
                    $tipo = Tipo::find(1);
                } else {
                    $valor->create($btn);
                    $tipo = $valor->find(1);
                }
            }
        } else {
            $tipo = Tipo::find(1);
            $request->op = null;
        }
        
        $search = $request->get('search');
        $products = DB::table('products')->when($search, function ($query) use ($search ) {
                    return $query->where('name', 'like', '%' . $search . '%')
                                    ->orWhere('detalhe', 'like', '%' . $search . '%')
                                    ->orWhere('id', 'like', '%' . $search . '%');
                })->paginate(5);

        return view('products.index', compact('products', 'tipo'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() {
		
		$usuario = auth()->user()->name;
		
        return view('products.create', compact('usuario'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'detalhe' => 'required',
        ]);
		
        Product::create($request->all());

        return redirect()->route('products.create')
                        ->with('success', 'Produto cadastrado com sucesso.');
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) {
		
		$usuario = auth()->user()->name;
		
        return view('products.edit', compact('product','usuario'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'detalhe' => 'required',
        ]);


        $product->update($request->all());

        return redirect()->route('products.index', 'op=E')
                        ->with('success', 'Produto alterado com sucesso.');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('products.index', 'op=E')
                        ->with('success', 'Produto deletado com sucesso.');
    }

}
