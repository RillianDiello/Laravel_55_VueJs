@extends('layouts.app')

@section('content')

<page length="12">
    <pannel title="Artigos">
        <div class="row">
            <card-article
            title = "Titulo Teste"
            description = "descrição de teste"
            link = "#"
            imageDest = ""
            dateArticle = "02/08/20120"
            author = "Rillian"
            sm="6"
            md="4">
        </card-article>
           
        </div>
        
    </pannel>
    
</page>


@endsection