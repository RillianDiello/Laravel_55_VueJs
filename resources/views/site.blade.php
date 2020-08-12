@extends('layouts.app')

@section('content')

<page length="12">
    <pannel title="Artigos">
        <div class="row">

            @foreach ($list as $key => $value)
                
            
            <card-article
                title = "{{$value->title}}"
                description = "{{$value->description}}"
                link = "{{route('article',[$value->id, str_slug($value->title)])}}"
                imageDest = ""
                data = "{{$value->data}}"
                author = "{{$value->author}}"
                sm="6"
                md="4">
            </card-article>
        @endforeach
           
        </div>
        <div align="center">
            {{$list}}
        </div>
        
    </pannel>
    
</page>


@endsection