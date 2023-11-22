<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5v5zvUfGsVXlxFyKrXbGlhOQlKhG4H0hFuLWxCqM82B0wP2rHn+F2g" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-5">Formulaire Produit</h1>
        <form method="POST" action="{{route('enregistre')}}" >
             @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label><br>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Categorie</label><br>
                <input type="text" class="form-control" id="categorie" name="categorie">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label><br>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label><br>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br>
                <select class="form-select" id="status" name="status">
                    <option value="disponible">Disponible</option>
                    <option value="indisponible">Indisponible</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label><br>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <button>Creer l'article</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRIb2UFzC6pvAw2u0Y6KjPsij3P0N6UV1yJwlJO/uTQWQnvGQzZFVwOw==" crossorigin="anonymous"></script>
</body>
</html>