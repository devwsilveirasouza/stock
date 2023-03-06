@extends('layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ route('product.store')}}" method="POST">
            @csrf
            <div class="row">

                <!-- CÓDIGO -->
                <div class="input-field col s1">
                    <input type="text" name="code" id="code" />
                    <label for="code">CÓDIGO</label>
                </div>
                <!-- PARTNUMBER -->
                <div class="input-field col s2">
                    <input type="text" name="partNumber" id="partNumber" />
                    <label for="partNumber">PARTNUMBER</label>
                </div>

                <!-- DESCRIPTION -->
                <div class="input-field col s8">
                    <input type="text" name="description" id="description" />
                    <label for="description">DESCRIÇÃO</label>
                </div>

                <!-- UM -->
                <div class="input-field col s1">
                    <input type="text" name="um" id="um" />
                    <label for="um">UM</label>
                </div>
            </div>

            <div class="row">
                <!-- MARCA -->
                <div class="input-field col s2">
                    <input type="text" name="brand" id="brand" />
                    <label for="brand">MARCA</label>
                </div>

                <!-- MODELO -->
                <div class="input-field col s3">
                    <input type="text" name="model" id="model" />
                    <label for="model">MODELO</label>
                </div>

                <!-- CATEGORIA -->
                <div class="input-field col s3">
                    <input type="text" name="category" id="category" />
                    <label for="category">CATEGORIA</label>
                </div>

                <!-- SUBCATEGORIA -->
                <div class="input-field col s4">
                    <input type="text" name="subCategory" id="subCategory" />
                    <label for="subCategory">SUB-CATEGORIA</label>
                </div>
            </div>

            <div class="row">
                <!-- ESTOQUE MINIMO -->
                <div class="input-field col s2">
                    <!-- NAÕ ACEITA VALOR NEGATIVO -->
                    <input type="number" min="0" name="minQuantity" id="minQuantity" />
                    <label for="minQuantity">ESTOQUE MÍNIMO</label>
                </div>
                <!-- ENDEREÇO -->
                <div class="input-field col s2">
                    <input type="text" name="address" id="address" />
                    <label for="address">ENDEREÇO</label>
                </div>
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect light-blue darken-2" href="{{ url()->previous() }}">Cancelar</a>
                <button class="btn waves-effect waves-light red lighten-1" type="submit">Salvar</button>
            </div>

        </form>
    </section>
@endsection
