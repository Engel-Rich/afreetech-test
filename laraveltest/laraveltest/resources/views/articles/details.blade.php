@extends('base')

@section('content')

<div class="contaner p-5">
    <div class="row">
        <div class="col-md-5">
            <h1>Article Details</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->name }}</h5>
                    <p class="card-text">Description: {{ $article->description }}</p>
                    <p class="card-text">Price: {{ $article->price }}</p>
                    <p class="card-text">Created At: {{ $article->created_at }}</p>
                    <p class="card-text">Updated At: {{ $article->updated_at }}</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h1>Article Images </h1>
                    <div class="form">

                        <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @endif
                            <div class="mb-3">
                                <label for="image" class="form-label">Ajouter une image</label>
                                <input type="file" class="form-control" id="image" name="image" required accept="image/*">
                            </div>
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <button type="submit" class="btn btn-primary">Ajouter une image</button>
                        </form>

                        <div class="row">
                            @foreach ($article->images as $image)
                            <div class="col-md-4">
                                <img src="{{ $image->path }}" alt="Image" class="img-fluid">
                                <form action="{{route('images.destroy', $image)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>