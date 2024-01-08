<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.css">

    <title>Information detaillees de l'article</title>
</head>
<body>
    <div class="card" style="width: 50%;">
        <img class="card-img-top" src="{{asset($article->photo)}}" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">{{$article->nom}}</h5>
        <p class="card-text">Categorie: {{$article->categorie}}</p>
        <p class="card-text">Statut: {{$article->status}}</p>
        <p class="card-text">Description: {{$article->description}}</p>
        <a href="{{route('edit',['id'=>$article->id])}}" class="btn btn-primary">Mise a jour</a>
        <a href="{{route('delete',['id'=>$article->id])}}" class="btn btn-danger">Supprimer</a>
        </div>
</body>
</html>