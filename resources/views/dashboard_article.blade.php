<x-guest-layout>
    <div>
        <button type="button"
                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 m-4">
            <a href="{{route('dashboard_articles')}}">Retour</a></button>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="divide-double divide-y-2 divide-purple-900">

            <div>
                <form action="{{route('dashboard_article.update', $article)}}" method="POST"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @method('put')
                    @csrf

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label for="title"
                                   class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Titre</label>
                        </div>
                        <div class="md:w-2/4">
                            <input value="{{$article->title}}" id="title" type="text" name="title"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label for="content"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Contenu</label>
                        </div>
                        <div class="md:w-2/4">
                            <textarea name="content" id="content" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$article->content}}</textarea>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/4"></div>
                        <div class="md:w-2/4">
                            <button type="submit"
                                    class="shadow bg-purple-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div>
                @foreach($comments as $comment)
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <form action="{{route('dashboard_comment.update', $comment)}}" method="POST">

                            @method('put')
                            @csrf
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/4">
                                    <label for="content"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Contenu
                                        du commentaire</label>
                                </div>
                                <div class="md:w-2/4">
                            <textarea name="content" id="content" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$comment->content}}</textarea>
                                </div>
                            </div>
                            <p class="text-purple-800">commentaire fait par:
                                <strong>{{$comment->pseudo == "" ? $comment->user->name : $comment->pseudo}}</strong>,
                                date d'ajout : {{$comment->created_at}}</p>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/4"></div>
                                <div class="md:w-2/4">
                                    <button type="submit"
                                            class="shadow bg-purple-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        Modifier le commentaire
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('dashboard_comment.destroy',$comment)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-guest-layout>
