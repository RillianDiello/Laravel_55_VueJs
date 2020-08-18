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

  <pannel title="Lista de Administradores">

    <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>


    <table-list v-bind:titles="['#', 'Nome', 'Email']" v-bind:itens="{{json_encode($modelList)}}" ordem="asc" ordemcol="1" criar="#criar" detalhes="/admin/adm/" editar="/admin/adm/" modal="yes">

    </table-list>
    <div align="center">
      {{$modelList->links()}}
    </div>
  </pannel>
</page>
<modal name="add" title="Adicionar">

  <formulary id="form-add" css="" action="{{route('adm.store')}}" method="post" enctype="" token="{{csrf_token()}}">
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
    </div>

    <div class="form-group">
      <label for="admin">Admin</label>  
      <select class="form-control" id="admin" name="admin">
        <option {{(old('admin') && old('admin') == '0' ? 'selected' : '' )}} value="0"> Não</option>
        <option {{(old('admin') && old('admin') == '1' ? 'selected' : '' )}} {{(!old('admin') ? 'selected' : '')}} value="1"> Sim</option>
      </select>
    </div>


  </formulary>
  <span slot="buttons">
    <button form="form-add" class="btn btn-info">Adicionar</button>
  </span>
</modal>

<modal name="editar" title="Editar">
  <formulary id="form-edit" v-bind:action="'/admin/adm/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>


    <div class="form-group">
      <label for="admin">Admin</label>  
      <select class="form-control" id="admin" name="admin" v-model="$store.state.item.admin">
        <option value="0"> Não</option>
        <option value="1"> Sim</option>
      </select>
    </div>
     
  </formulary>
  <span slot="buttons">
    <button form="form-edit" class="btn btn-info">Atualizar</button>
  </span>
</modal>

<modal name="details" v-bind:title="$store.state.item.name">
  <p>@{{$store.state.item.email}}</p>
</modal>

@endsection