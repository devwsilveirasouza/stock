@extends('layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <h4>Movimentação de Estoque</h4>
        <form action="{{route('produto.movimentacao')}}" method="POST">
            @csrf
            <div class="row">

                <!-- DOCUMENTO -->
                <div class="input-field col s2">
                    <input type="text" name="documento" id="documento"/>
                    <label for="documento">Documento:</label>
                </div>

                <!-- TRANSACAO -->
                <div class="input-field col s2">
                    <select name="transacao" id="transacao">
                        <option value="">Selecione</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Saida">Saída</option>
                    </select>
                </div>

                <!-- OBSERVACAO -->
                <div class="input-field col s8">
                    <input type="text" name="observacao" id="observacao"/>
                    <label for="observacao">Observação:</label>
                </div>

            </div>

            <div class="row">

                <!-- DESCRIPTION -->
                <div class="input-field col s8">
                    <select name="product_id" id="product">
                        <option value="">Selecione um produto</option>

                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->description }}</option>
                        @endforeach

                    </select>
                </div>

                <!-- QUANTIDADE ENTRADA -->
                <div class="input-field col s2">
                    <input type="number" min="1" name="qtd" id="qtd"/>
                    <label for="qtd">Quantidade:</label>
                </div>

                <!-- PRECO -->
                <div class="input-field col s2">
                    <input type="text" name="preco" id="preco"/>
                    <label for="preco">Preço:</label>
                </div>
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect light-blue darken-2" href="{{ url()->previous() }}">Cancelar</a>
                <button class="btn waves-effect waves-light red lighten-1" type="submit">Gravar</button>
            </div>

        </form>
    </section>
@endsection
