@extends('layouts.app')

@section('content')

<page length="10">
    <pannel title="Dashboard">
    <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>

        <div class="row">
            <div class="col-md-4">
                <box qtd="80" title="Artigos" url="{{route('articles.index')}}" color="orange" icon="ion ion-pie-graph"></box>
            </div>
            <div class="col-md-4">
                <box qtd="150" title="Usuarios" url="{{route('users.index')}}" color="blue" icon="ion ion-person-stalker"></box>
            </div>
            <div class="col-md-4">
                <box qtd="3" title="Autores" url="{{route('authors.index')}}" color="red" icon="ion ion-person"></box>
            </div>

        </div>

    </pannel>
</page>


@endsection