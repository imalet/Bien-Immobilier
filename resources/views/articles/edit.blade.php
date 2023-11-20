<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification Bien</title>
</head>
<body>
    <h2>Modifier un bien</h2><br/>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="nom" value="{{ $article->nom }}">
        <input type="text" name="categorie" value="{{ $article->categorie }}">
        <input type="file" name="image">
        <textarea name="description">{{ $article->description }}</textarea>
        <input type="text" name="statut" value="{{ $article->statut }}">
        <button type="submit">Modifier</button>
    </form>
</body>
</html>