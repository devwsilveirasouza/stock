@extends('layouts.principal')

@section('conteudo-principal')

<h5>Endereçamento de Materias</h5>

<form action="#" method="post">
    <input type="text" name="description" id="description" value="{{$product->description}}">
    <input type="text" name="address" id="address">
</form>

@endsection

