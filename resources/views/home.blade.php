@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <pannel title="DashBoard">
                Teste conteudo 0
                <div class="row">
                    <div class="col-md-4">
                        <pannel title="Painel 1" color="blue">
                            Teste conteudo 1
                        </pannel>
                    </div>
                    <div class="col-md-4">
                        <pannel title="Painel 2" color="orange">
                            Teste conteudo 2
                        </pannel>
                    </div>
                    <div class="col-md-4">
                        <pannel title="Painel 3" color="green">
                            Teste conteudo 3
                        </pannel>
                    </div>
                </div>
            </pannel>
        </div>
    </div>
</div>
</div>
@endsection