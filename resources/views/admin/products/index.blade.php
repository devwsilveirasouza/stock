@extends('layouts.principal')

<style>
    table {
        font-size: 12px;
    }
</style>

@section('conteudo-principal')
    <h4>Produtos Cadastrados</h4>
    <div class="right-align">
        <a class="btn-flat waves-effect light-blue darken-2" href="{{ route('product.create') }}">Novo</a>
    </div>

    <section class="section">

        <table class="highlight">
            <thead>
                <tr>
                    <th>Código:</th>
                    {{-- <th>PN:</th> --}}
                    <th>Descrição:</th>
                    <th>Marca:</th>
                    <th>Model:</th>
                    <th>UM:</th>
                    {{-- <th>Categoria:</th> --}}
                    {{-- <th>Sub-Categoria:</th> --}}
                    <th>Local:</th>
                    {{-- <th>Est. Min:</th> --}}
                    <th>Ação:</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->code }}</td>
                        {{-- <td>{{ $product->partNumber }}</td> --}}
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->um }}</td>
                        {{-- <td>{{ $product->category }}</td> --}}
                        {{-- <td>{{ $product->subCategory }}</td> --}}
                        <td>{{ $product->address }}</td>
                        {{-- <td>{{ $product->minQuantity }}</td> --}}
                        <td class="right-align">{{-- Ver --}}
                            <a href="{{ route('product.show', [$product->id]) }}" title="View">
                                <span>
                                    <i class="material-icons blue-text text-accent-3">remove_red_eye</i>
                                </span>
                            </a>
                            {{-- Endereçar --}}
                            <a href="{{ route('produto.enderecamento', [$product->id]) }}" title="View">
                                <span>
                                    <i class="material-icons blue-text text-accent-3">remove_red_eye</i>
                                </span>
                            </a>
                             {{-- Excluir --}}
                             <form action="{{ route('product.delete', [$product->id]) }}" method="POST"
                                style="display: inline;" title="Delete">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit">
                                    <span style="cursor: pointer;">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há produtos cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
            {{-- PAGINAÇÃO --}}
            {{ $products->links() }}

    </section>
@endsection
