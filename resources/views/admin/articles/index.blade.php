@extends('layouts.app')

@section('content')

<page length="12">
  <pannel title="Lista de Artigos">

    <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>

    <modallink type="link" name="meuModalTeste" title="Criar" css="">
    </modallink>
    <table-list v-bind:titles="['#', 'Título', 'Descrição']" v-bind:itens="[['1', 'PHP', 'Curso Php'],
        ['2', 'VueJs', 'Curso Vuejs']
        ]" ordem="asc" ordemcol="1" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="432809">

    </table-list>

  </pannel>
</page>
<modal name="meuModalTeste">
  <pannel title="Adicionar">  
    <formulary css="" action="#" method="put" enctype="multipart/form-data" token="12345">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
      </div>
      <button class="btn btn-info">Adicionar</button>
    </formulary>
  </pannel>

</modal>
@endsection