@extends('layouts.principal')


{{-- Script Bootstrap DataTable CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Script Datatable CSS --}}
<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />

@section('conteudo-principal')
    <div class="center-align mt-2">
        <div class="row col-md-2 float-end">
            <a class="btn btn-primary" href="{{ route('product.create') }}">+ Produto</a>
        </div>
    </div>

    <section class="section">

        <h3 class="text-center">Produtos</h3>

        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table id="datatable" class="table">
                                <thead>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Opções</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>35</td>
                                        <th>Arroz Tio Joao 5kg</th>
                                        <th><a class="btn btn-warning">Editar</a>
                                            <a class="btn btn-danger">Deletar</a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scripts DataTable Js --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            $('#datatable').DataTable({});
        </script>

    </section>
@endsection
