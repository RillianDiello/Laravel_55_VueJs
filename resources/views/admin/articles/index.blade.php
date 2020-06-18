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
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </pannel>

  </modal>
@endsection