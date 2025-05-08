@extends('base')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Ajouter un article</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->price }}</td>
                <td>
                    <a href="{{route('articles.edit', $article->id )}}" class="btn btn-warning">Modifier</a>
                    <a href="{{route('articles.show', $article->id )}}" class="btn btn-primary, btn-rounded">Details</a>
                    <form action="{{route('articles.destroy', $article->id )}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
</div>
<script>
    $(document).ready(function() {
        // Code JavaScript ici
    });
</script>
<script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>