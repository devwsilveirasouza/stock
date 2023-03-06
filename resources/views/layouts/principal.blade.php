<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- Fonts -->
     <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
     <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- MATERIALIZE --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>WS</title>
</head>
<body>

    {{-- MENU TOPO --}}
    <nav class="light-blue darken-2">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo right">WS</a>
                <ul class="left">
                    <li><a href="{{route('produto.transacao')}}">Movimentação</a></li>
                    <li><a href="{{ route('product.index') }}">Produtos</a></li>
                    <li><a href="#">Estoque</a></li>
                    <li><a href="#">Serviços</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTEUDO PRINCIPAL --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    {{-- SCRIPT JAVASCRIPT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script>
        @if(session('sucesso'))
        M.toast({
            html: "{{ session('sucesso')}}"
        });
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
