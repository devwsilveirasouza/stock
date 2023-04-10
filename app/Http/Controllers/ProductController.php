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
        // $products = Product::paginate();
        // dd($products);
        return view('admin.products.index');

    }
    // --- EM DESENVOLVIMENTO - / 15/03/2023 - WELLINGTON
    // CARREGAR O DATATABLE COM PAGINAÇÃO AJAX
    public function getData(Request $request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        $totalRecords = Product::select('count(*) as allcount')->count();

        $totalRecordsWithFilter = Product::select('count(*) as allcount')
            ->where('description', 'like', '%'. $searchValue .'%')
            ->orWhere('address', 'like', '%' . $searchValue . '%')
            ->count();

        $records = Product::orderBy($columnName, $columnSortOrder)
        ->where('description', 'like', '%'. $searchValue .'%')
        ->orWhere('address', 'like', '%' . $searchValue . '%')
        ->select('products.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();
        foreach($records as $product){
            $id = $product->id;
            $description = $product->description;

        $data_arr[] = array(
            "id" => $id,
            "description => $description"
        );

        }

        $response = array(
            "draw"                  => intval($draw),
            "iTotalRecords"         => $totalRecords,
            "iTotalDisplayRecords"  => $totalRecordsWithFilter,
            "aaData"                => $data_arr
        );
        echo json_encode($response);
        exit;
    }
    // --- FIM DO METODO ---

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

            return redirect()->route('product.index')
                ->with('produto', $produto);
        } else {
            $produto = SaidaProduto::create($request->all());

            return redirect()->route('product.index')
                ->with('produto', $produto);
        }

    }

    public function enderecar(Request $product){

        $product = Product::find($product);
        return view('admin.products.enderecamento')
            ->with('produtos', $product);
    }
}
