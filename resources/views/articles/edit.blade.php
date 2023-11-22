<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.css">

    <title>Modification Bien</title>
</head>
<body>
    <div class="container">
        <h1 class="my-5">Modification</h1>
        <form method="POST" action="{{route('update',['id'=>$article->id])}}" enctype="multipart/form-data" >
             @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label><br>
                <input type="text" class="form-control" id="nom" name="nom" value="{{$article->nom}}">
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Categorie</label><br>
                <input type="text" class="form-control" id="categorie" name="categorie" value="{{$article->categorie}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label><br>
                <input type="file" class="form-control" id="image" name="photo" value="">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label><br>
                <textarea class="form-control" id="description"  name="description" rows="3">{{$article->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br>
                <select class="form-select" id="status" name="status" >
                    <option selected value="{{$article->status}}" >{{$article->status}}</option>
                    <option value="disponible">Disponible</option>
                    <option value="indisponible">Indisponible</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label><br>
                <input type="date" class="form-control" id="date" name="date" value="{{$article->date}}">
            </div>

            <button>Je valide mes modification</button>
        </form>
    </div>
</body>
</html>