<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Produit</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <form action="{{route('enregistre')}}" method="post" enctype="multipart/form-data">
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
                placeholder="Ex : Studio Duplex" type="text" name="nom">
            {{-- Selection du types de Bien --}}
            <select id="countries" class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" name="categorie">
                <option selected class="text-slate-400" aria-placeholder="ok">Type de Bien</option>
                <option value="duplex">Duplex</option>
                <option value="villa">Villa</option>
            </select>
            {{-- Description --}}
            <textarea class="description bg-gray-100 sec  p-3 h-60 border border-gray-300 outline-none"
                spellcheck="false" placeholder="Décrivez tout ce qu’il faut savoir sur cet article ici..."
                name="description"></textarea>

            {{-- Adresse du Bien --}}
            {{-- <input class="title bg-gray-100 border border-gray-300 p-2 my-4 outline-none" spellcheck="false"
                placeholder="Adresse : Ouest-Foire ..." type="text" name="adresse"> --}}

            {{-- Disponibilité du Bien --}}
            <select id="status" class="bg-gray-100 border border-gray-300 p-2 my-4 outline-none" name="status">
                <option selected class="text-slate-400" aria-placeholder="">Status</option>
                <option value="disponible">Disponible</option>
                <option value="indisponible">Indisponible</option>
            </select>

            {{-- Date --}}
            <input class="date bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="date" name="date">

            {{-- <!-- icons -->
            <div class="icons flex text-gray-500 m-2">
                <label id="select-image">
                    <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </label>
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div> --}}
            <div class="buttons flex justify-end">
                <input
                    class="btn border border-stne-900 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-stone-900"
                    type="submit" value="Creer l'Article">

            </div>
        </div>

    </form>



    {{-- .................................. --}}
    {{-- <div class="container">
        <form method="POST" action="{{route('enregistre')}}" enctype="multipart/form-data">
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
                <input type="file" class="form-control" id="image" name="photo">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRIb2UFzC6pvAw2u0Y6KjPsij3P0N6UV1yJwlJO/uTQWQnvGQzZFVwOw=="
        crossorigin="anonymous"></script> --}}
</body>

</html>