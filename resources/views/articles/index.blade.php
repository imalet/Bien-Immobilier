<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5v6lCt/cL9mfWJxrEc/aBx2VK" crossorigin="anonymous">
    <title>Gestion Immobiliere</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Liste des articles</h3>
                <a href="{{ url('articles/create') }}" class="btn btn-primary">Ajouter un article</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Categorie</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date à quoi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->nom }}</td>
                                <td>{{ $article->categorie }}</td>
                                <td>{{ $article->description }}</td>
                                <td>{{ $article->status }}</td>
                                <td>{{ $article->date_a_quoi }}</td>
                                <td>
                                    <a href="{{ url('articles/'.$article->id) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ url('articles/'.$article->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>
</html>