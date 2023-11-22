<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de bien immobilier</title>
</head>
<body>
  <h1>Liste des articles.</h1>
  <div class="row">
    @foreach($articles as $article )
    <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{asset($article->photo)}}" alt="Card image cap">
          <div class="card-body">
          <h5 class="card-title">{{$article->nom}}</h5>
          <p class="card-text">Categorie: {{$article->categorie}}</p>
          <p class="card-text">Statut: {{$article->status}}</p>
          <a href="#" class="btn btn-primary">Voir plus</a>
          </div>
    </div>
      @endforeach
  </div>
   
</body>
</html>