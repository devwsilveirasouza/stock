@extends('layouts.principal')

<style>
    section {
        font-size: 12px;
    }
</style>

@section('conteudo-principal')
    <section class="section">

        <div class="row">
            {{-- CÓDIGO --}}
            <span class="col s1">
                <h6>Código:</h6>
                <p>{{ $product->code }}</p>
            </span>
            {{-- PARTNUMBER --}}
            <span class="col s2">
                <h6>PartNumber:</h6>
                <p>{{ $product->partNumber }}</p>
            </span>
            {{-- DESCRIÇÃO --}}
            <span class="col s8">
                <h6>Descrição:</h6>
                <p>{{ $product->description }}</p>
            </span>
            {{-- UNIDADE DE MEDIDA --}}
            <span class="col s1">
                <h6>UM:</h6>
                <p>{{ $product->um }}</p>
            </span>
        </div>
        <hr>
        <div class="row">
            {{-- MARCA --}}
            <span class="col s2">
                <h6>Marca:</h6>
                <p>{{ $product->brand }}</p>
            </span>
            {{-- MODELO --}}
            <span class="col s3">
                <h6>Modelo:</h6>
                <p>{{ $product->model }}</p>
            </span>
            {{-- CATEGORIA --}}
            <span class="col s3">
                <h6>Categoria:</h6>
                <p>{{ $product->category }}</p>
            </span>
            {{-- SUBCATEGORIA --}}
            <span class="col s4">
                <h6>Sub-categoria:</h6>
                <p>{{ $product->subCategory }}</p>
            </span>
        </div>
        <hr>
        <div class="row">
            {{-- ESTOQUE MINIMO --}}
            <span class="col s3">
                <h6>Est. Minimo:</h6>
                <p>{{ $product->minQuantity }}</p>
            </span>
            {{-- ENDEREÇO --}}
            <span class="col s3">
                <h6>Endereço:</h6>
                <p>{{ $product->address }}</p>
            </span>
        </div>
        <hr>
        <div class="right-align">
            <a href="{{ route('product.index') }}" class="btn-flat waves-effect light-blue darken-2">Produtos</a>
            {{-- Editar --}}
            <a href="{{ route('product.edit', [$product->id]) }}" class="btn-flat waves-effect yellow darken-2">
                Editar
            </a>
        </div>
    </section>
@endsection
