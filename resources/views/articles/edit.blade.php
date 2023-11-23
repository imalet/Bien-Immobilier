<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Modification Bien</title>
</head>
<body>


    <form action="{{route('update',['id'=>$article->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">

            {{-- Image --}}
            <div class="border border-gray-300 bg-gray-50 p-4 mb-4">
                <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-gray-600 font-medium">Upload file</span>
                </label>
                <input id="upload" type="file" name="photo" class="hidden" />
            </div>

            {{-- nom du Bien --}}
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                placeholder="Ex : Studio Duplex" type="text" name="nom" value="{{$article->nom}}">

            {{-- Categorie du types de Bien --}}
            <select id="countries" class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" name="categorie">
                <option selected class="text-slate-400" value="{{$article->categorie}}">{{$article->categorie}}</option>
                <option value="duplex">Duplex</option>
                <option value="villa">Villa</option>
            </select>
            {{-- Description --}}
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                spellcheck="false" placeholder="Décrivez tout ce qu’il faut savoir sur cet article ici..."
                name="description">{{$article->description}}</textarea>

            {{-- Disponibilité du Bien --}}
            <select id="status" class="bg-gray-100 border border-gray-300 p-2 my-4 outline-none" name="status">
                <option selected class="text-slate-400" value="{{$article->status}}">{{$article->status}}</option>
                <option value="disponible">Disponible</option>
                <option value="indisponible">Indisponible</option>
            </select>

            {{-- Date --}}
            <input class="date bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="date" name="date" value="{{$article->date}}">

            <div class="buttons flex justify-end">
                <input
                    class="btn border border-stne-900 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-stone-900"
                    type="submit" value="Modifier l'Article">

            </div>
        </div>

    </form>



    {{-- ........................ --}}
    {{-- <div class="container">
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
    </div> --}}
</body>
</html>