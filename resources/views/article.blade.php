@extends('layouts.app')

@section('content')

<page length="12">
    <pannel>

    <h2 align="center">{{$article->title}}</h2>
    <h4 align="center">{{$article->description}}</h4>

    <p>
        {{!!$article->content   }}
    </p>

    <p align="center">
            <small>{{$article->user->name}} - {{date('d/m/Y', strtotime($article->datePublish))}}</small>
    </p>
        
        
    </pannel>    
</page>


@endsection