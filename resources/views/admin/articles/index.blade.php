@extends('layouts.app')

@section('content')

<page length="12">


  @if($errors->all())

  <div class="alert alert-danger alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    @foreach($errors->all() as $key => $value)
    <li><strong>{{$value}}</strong></li>
    @endforeach
  </div>
  @endif

  <pannel title="Lista de Artigos">

    <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>


    <table-list v-bind:titles="['#', 'Título', 'Descrição', 'Data']" v-bind:itens="{{$articlesList}}"
     ordem="asc" ordemcol="1" criar="#criar" detalhes="/admin/articles/" editar="/admin/articles/" 
     deletar="#deletar" token="{{csrf_token()}}" modal="yes">

    </table-list>

  </pannel>
</page>
<modal name="add" title="Adicionar">

  <formulary id="form-add" css="" action="{{route('articles.store')}}" method="post" enctype="" token="{{csrf_token()}}">
    <div class="form-group">
      <label for="title">Título</label>
      <input type="text" class="form-control" id="titulo" name="title" placeholder="Título" value="{{old('title')}}">
    </div>
    <div class="form-group">
      <label for="description">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="description" placeholder="Descrição" value="{{old('description')}}">
    </div>
    <div class="form-group">
      <label for="content">Conteudo</label>
      <textarea id="content" name="content" class="form-control">{{old('description')}}</textarea>

    </div>
    <div class="form-group">
      <label for="datePublish">Data</label>
      <input type="datetime-local" class="form-control" id="datePublish" name="datePublish" value="{{old('datePublish')}}">
    </div>
  </formulary>
  <span slot="buttons">
    <button form="form-add" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal name="edit" title="Editar">

  <formulary id="form-edit" v-bind:action="'/admin/articles/' + $store.state.item.id"  method='put' enctype="" token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="title" v-model="$store.state.item.title" placeholder="Título">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="description" v-model="$store.state.item.description" placeholder="Descrição">
    </div>
    <div class="form-group">
      <label for="conteudo">Conteúdo</label>
      <textarea class="form-control" id="conteudo" name="content" v-model="$store.state.item.content"></textarea>
    </div>

    <div class="form-group">
      <label for="data">Data</label>
      <input type="datetime-local" class="form-control" id="data" name="datePublish" v-model="$store.state.item.datePublish">
    </div>

  </formulary>
  <span slot="buttons">
    <button form="form-edit" class="btn btn-info">Atualizar</button>
  </span>
</modal>

<modal name="details" v-bind:titulo="$store.state.item.title">
  <p>@{{$store.state.item.description}}</p>
  <p>@{{$store.state.item.content}}</p>
</modal>

@endsection