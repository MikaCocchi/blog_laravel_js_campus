<x-guest-layout>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
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
                <h1 class="p-10 text-5xl">{{$article->title}}</h1>
                <p class="p-10 text-2xl text-justify">{{$article->content}}</p>
            </div>
            <div class="divide-solid divide-y divide-purple-900">
                @foreach($comments as $comment)
                    <div class="p-10 place-content-between">
                        <p class="p-5 text-sm text-justify">{{$comment->content}}</p>
                        <p class="text-purple-800">commentaire fait par:
                            <strong>{{$comment->pseudo == "" ? $comment->user->name : $comment->pseudo}}</strong>,
                            date d'ajout : {{$comment->created_at}}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div>
        <form action="{{route('add_comment',$article)}}" method="POST"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            @guest
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label for="email" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Adresse
                            email</label>
                    </div>
                    <div class="md:w-2/4">
                        <input id="email" type="email" name="email"
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label for="pseudo"
                               class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Pseudo</label>
                    </div>
                    <div class="md:w-2/4">
                        <input id="pseudo" type="text" name="pseudo"
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                    </div>
                </div>
            @endguest
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label for="content"
                           class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Content</label>
                </div>
                <div class="md:w-2/4">
                    <input id="content" type="text" name="content"
                           class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-2/4">
                    <button type="submit"
                            class="shadow bg-purple-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Commenter
                    </button>
                </div>
            </div>
        </form>
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
