@extends('base')

@section('content')

<form action="{{$article!=null? route('articles.update', $article?->id ) :route('articles.store') }}" class="form" method="POST">
    <div class="container mt-5 border p-5">
        <h2>Creation d'un article</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($article != null)
        @method('PUT')
        @endif
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'article</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $article?->name)}}" required>
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Prix de l'article</label>
            <input type="number" class="form-control" id="price" name="price" value="{{old('price', $article?->price)}}" required>
        </div>
        <div class=" mb-3">
            <label for="message" class="form-label">Description de l'article</label>
            <textarea class="form-control" id="description" name="description" rows="5" required value="{{old('description', $article?->description)}}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>

    </div>
</form>