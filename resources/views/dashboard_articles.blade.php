<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <h1 class="text-6xl	font-bold text-violet-800">Gérer les articles</h1>
        <div class="divide-solid divide-y divide-violet-800">
            @foreach($articles as $article)
                <div class=" my-10 hover:text-violet-600 place-content-center">
                    <a href="/dashboard/articles/{{$article->id}}">

                        <h2 class="text-2xl	font-bold ">{{$article->title}}</h2>
                        <p>{{Str::limit($article->content,500,' ...')}}</p>
                        <h4>écrit le : {{$article->created_at}}</h4>

                    </a>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>
