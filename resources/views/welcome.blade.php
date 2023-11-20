<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5v6lCt/cL9mfWJxrEc/aBx2VK" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Creer un article</h1>
        <form @submit.prevent="submitForm" >
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" class="form-control" v-model="article.nom">
            </div>
            <div class="form-group">
                <label for="categorie">Categorie</label>
                <input type="text" id="categorie" class="form-control" v-model="article.categorie">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" id="photo" class="form-control" v-model="article.photo">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" v-model="article.description"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" v-model="article.status">
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" class="form-control" v-model="article.date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>