@extends('layouts.app')

@section('content')

<page length="12">
    <pannel title="Lista de Artigos">

        <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>
        <table-list v-bind:titles="['#', 'Título', 'Descrição']" v-bind:itens="[['1', 'PHP', 'Curso Php'],
        ['2', 'VueJs', 'Curso Vuejs']
        ]" ordem="asc" ordemcol="1" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="432809">

        </table-list>

    </pannel>
</page>


@endsection