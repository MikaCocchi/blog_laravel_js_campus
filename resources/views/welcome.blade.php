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
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div>
        <h1 class="text-6xl	font-bold text-violet-800">Voici la liste des articles</h1>
        <div class="divide-solid divide-y divide-violet-800">
        @foreach($articles as $article)
            <div class=" my-10 hover:text-violet-600 place-content-center">
                <a href="/articles/{{$article->id}}">

                <h2 class="text-2xl	font-bold ">{{$article->title}}</h2>
                <p>{{Str::limit($article->content,500,' ...')}}</p>
                    <h4>écrit le : {{$article->created_at}}</h4>
                    <p> par {{$article->user->name}}</p>
                </a>
            </div>
        @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</div>
</x-guest-layout>
