<?php

namespace App\Http\Controllers;

use App\Models\EntradaProduto;
use App\Models\Product;
use App\Models\SaidaProduto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Método responsável por chamar a index e exibir uma lista de registros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        // dd($products);
        return view('admin.products.index')
            ->with('products', $products);
    }

    /**
     * Método responsável por chamar o formulário de cadastro.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Método responsável por gravar os dados no DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('product.index');

    }

    /**
     * Método responsável por exibir um registro específico.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        //
        $prod_view = Product::find($product);
        return view('admin.products.show')
            ->with('product', $prod_view);
    }

    /**
     * Método responsável por chamar o formulário para edição de um registro.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        // return "Cheguei na Edição";
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Método responsável por realizar a atualização de um registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        //
        $prodUpdate = Product::find($product);
        // return $prodUpdate;
        $prodUpdate->update($request->all());

        return redirect()->route('product.index');

    }

    /**
     * Método responsável por remover um registro.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $product)
    {
        //
        $prodDelete = Product::find($product);
        $prodDelete->delete();

        return redirect()->route('product.index');
    }

    // MOVIMENTAÇÃO DE ESTOQUE

    public function transacao(){
        $products = Product::all();
        return view('admin.products.transacao')
                ->with('products', $products);
    }

    public function gravarTransacao(Request $request){

        $transacao = $request->transacao;

        if($transacao == "Entrada") {
            $produto = EntradaProduto::create($request->all());

            return redirect()->back();
        } else {
            $produto = SaidaProduto::create($request->all());

            return redirect()->back();
        }

    }

    public function enderecar(Request $product){

        $product = Product::find($product);
        return view('admin.products.enderecamento')
            ->with('produtos', $product);
    }
}
