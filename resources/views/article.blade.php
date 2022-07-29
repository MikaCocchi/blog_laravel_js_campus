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
                            date d'ajout :  {{$comment->created_at}}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div>
        <form action="{{route('add_comment',$article)}}" method="POST">
        @csrf

            @guest
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email">
                <label for="pseudo">Pseudo</label>
                <input id="pseudo" type="text" name="pseudo">
            @endguest
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <label for="content">Content</label>
            <input id="content" type="text" name="content">
            <button type="submit">Commenter</button>
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
