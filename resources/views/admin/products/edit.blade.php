@extends('layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ route('product.update', $product)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <!-- CÓDIGO -->
                <div class="input-field col s1">
                    <input type="text" name="code" id="code" value="{{$product->code}}" />
                    <label for="code">CÓDIGO</label>
                </div>
                <!-- PARTNUMBER -->
                <div class="input-field col s2">
                    <input type="text" name="partNumber" id="partNumber" value="{{$product->partNumber}}" />
                    <label for="partNumber">PARTNUMBER</label>
                </div>

                <!-- DESCRIPTION -->
                <div class="input-field col s8">
                    <input type="text" name="description" id="description" value="{{$product->description}}" />
                    <label for="description">DESCRIÇÃO</label>
                </div>

                <!-- UM -->
                <div class="input-field col s1">
                    <input type="text" name="um" id="um" value="{{$product->um}}" />
                    <label for="um">UM</label>
                </div>
            </div>

            <div class="row">
                <!-- MARCA -->
                <div class="input-field col s2">
                    <input type="text" name="brand" id="brand" value="{{$product->brand}}" />
                    <label for="brand">MARCA</label>
                </div>

                <!-- MODELO -->
                <div class="input-field col s3">
                    <input type="text" name="model" id="model" value="{{$product->model}}" />
                    <label for="model">MODELO</label>
                </div>

                <!-- CATEGORIA -->
                <div class="input-field col s3">
                    <input type="text" name="category" id="category" value="{{$product->category}}" />
                    <label for="category">CATEGORIA</label>
                </div>

                <!-- SUBCATEGORIA -->
                <div class="input-field col s4">
                    <input type="text" name="subCategory" id="subCategory" value="{{$product->subCategory}}" />
                    <label for="subCategory">SUB-CATEGORIA</label>
                </div>
            </div>

            <div class="row">
                <!-- ESTOQUE MINIMO -->
                <div class="input-field col s2">
                    <!-- NAÕ ACEITA VALOR NEGATIVO -->
                    <input type="number" min="0" name="minQuantity" id="minQuantity" value="{{$product->minQuantity}}" />
                    <label for="minQuantity">ESTOQUE MÍNIMO</label>
                </div>
                <!-- ENDEREÇO -->
                <div class="input-field col s2">
                    <input type="text" name="address" id="address" value="{{$product->address}}" />
                    <label for="address">ENDEREÇO</label>
                </div>
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect light-blue darken-2" href="{{ url()->previous() }}">Cancelar</a>
                <button class="btn waves-effect waves-light red lighten-1" type="submit">Editar</button>
            </div>

        </form>
    </section>
@endsection
