<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Information detaillees de l'article</title>
</head>

<body>

    @include('components.navbar')

    <div class="sm:mx-auto sm:w-full my-14">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Detail de l'Article : {{ $article->nom }}
        </h2>
    </div>

    <main class="container mx-auto mt-8">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-8/12 px-4 mb-8">
                <img src="{{asset($article->photo)}}" alt="Featured Image" class="w-full h-64 object-cover rounded">
                <div class="flex flex-wrap justify-between items-center my-4">
                    <h2 class="text-4xl font-bold ">{{ $article->nom }}</h2>
                    <button
                        class="bg-green-200 font-bold text-stone-800 rounded-lg text-xs text-center self-center px-3 py-2 mx-2">
                        {{ $article->status }}
                    </button>

                </div>

                <p class="text-gray-700 mb-4 font-bold">{{$article->description}}</p>
                <p class="text-gray-700 mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore
                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
                <p class="text-gray-700 mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo.</p>

                {{-- Comment Section --}}
                <div class="w-full bg-white">

                    <h2 class="font-bold mt-24 text-2xl">Commentaires</h2>

                    {{-- Comments --}}
                    <div class="flex flex-col">
                        @foreach ($comments as $comment )
                         <div class="border rounded-md p-3  my-3">
                            <div class="flex gap-3 items-center">
                                <img src="https://avatars.githubusercontent.com/u/22263436?v=4" class="object-cover w-8 h-8 rounded-full 
                                            border-2 border-emerald-400  shadow-emerald-400
                                            ">

                                <h3 class="font-bold">
                                    {{ $comment->user->name }}
                                </h3>
                            </div>
                            <p class="text-gray-600 my-4">
                                {{ $comment->commentaire }}
                            </p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="{{ route('comment.edit',['article'=>$article->id,'comment'=>$comment->id]) }}" class="text-gray-500 hover:text-gray-700 mr-4"><i class="far fa-thumbs-up"></i> Modifier</a>
                                    <a href="#" class="text-gray-500 hover:text-gray-700"><i class="far fa-comment-alt"></i> Supprimer</a>
                                </div>
                                <div class="flex items-center">
                                    <a href="#" class="text-gray-500 hover:text-gray-700 mr-4"><i class="far fa-flag"></i> Report</a>
                                    <a href="#" class="text-gray-500 hover:text-gray-700"><i class="far fa-share-square"></i> Share</a>
                                </div>
                            </div>
                        </div> 
                        
                        @endforeach

                        {{-- <div class="border rounded-md p-3  my-3">
                            <div class="flex gap-3 items-center">
                                <img src="https://avatars.githubusercontent.com/u/22263436?v=4" class="object-cover w-8 h-8 rounded-full 
                                        border-2 border-emerald-400  shadow-emerald-400
                                        ">

                                <h3 class="font-bold">
                                    User name
                                </h3>
                            </div>
                            <p class="text-gray-600 mt-2">
                                this is sample commnent
                            </p>
                        </div> --}}
                    </div>

                    <form method="post" action="{{ route('comment.update',['id'=>$commentSp->id]) }}">
                        @csrf
                        <input type="number" name="article_id" value="{{$article->id}}" hidden>
                        <div class="w-full my-2">
                            <textarea
                                class=" rounded border leading-normal resize-none w-full h-20 py-2 px-3 font-medium  focus:outline-none"
                                name="commentaire" placeholder='Type Your Comment'
                                required>{{ $commentSp->commentaire }}</textarea>
                        </div>

                        <div class="w-full flex justify-start ">
                            <input type='submit' class="px-2.5 py-1.5 rounded text-white text-sm bg-stone-950"
                                value='Post Comment'>
                        </div>
                    </form>


                </div>
                {{-- End of the Comment Section --}}

            </div>

            {{-- Aside Part --}}
            <div class="w-full md:w-4/12 px-4 mb-8">
                <div class=" px-4 py-6 rounded">
                    <h3 class="text-lg font-bold mb-2">Categories</h3>
                    <div class="flex  gap-2 flex-wrap ">
                        <span
                            class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">#photography</span>
                        <span
                            class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">#travel</span>
                        <span
                            class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">#winter</span>
                        <span
                            class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">#chill</span>
                    </div>
                </div>
                <div class="mt-5">

                    <a href="{{route('edit',['id'=>$article->id])}}"
                        class="bg-green-500  text-white font-bold py-2 px-4 rounded mr-3">
                        Modifier l'article
                    </a>

                    <a href="{{route('delete',['id'=>$article->id])}}"
                        class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                        Supprimer l'article
                    </a>

                </div>
            </div>
        </div>
    </main>

</body>

</html>