@extends('layouts.app')

@section('content')

<page length="12">
  <pannel title="Lista de Artigos">

    <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>


    <table-list v-bind:titles="['#', 'Título', 'Descrição']" v-bind:itens="{{$articlesList}}" ordem="asc" ordemcol="1" criar="#criar" detalhes="#detalhes" editar="#editar" deletar="#deletar" token="432809" modal="yes">

    </table-list>

  </pannel>
</page>
<modal name="add" title="Adicionar">

  <formulary id="form-add" css="" action="#" method="put" enctype="multipart/form-data" token="12345">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
    </div>
  </formulary>
  <span slot="buttons">
    <button form="form-add" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal name="edit" title="Editar">
  
    <formulary id="form-edit" css="" action="#" method="put" enctype="multipart/form-data" token="12345">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.title" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.description" placeholder="Descrição">
      </div>
      
    </formulary>
    <span slot="buttons">
    <button form="form-edit" class="btn btn-info">Atualizar</button>
  </span>
</modal>

<modal name="details" v-bind:title="$store.state.item.title">  
    <p>@{{$store.state.item.description}}</p>  
</modal>

@endsection