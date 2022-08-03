<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <h1 class="text-6xl	font-bold text-violet-800">Gérer les articles</h1>
        <form action="{{route('dashboard_add_article')}}" method="POST"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label for="title"
                           class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Title</label>
                </div>
                <div class="md:w-2/4">
                    <input id="title" type="text" name="title"
                           class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
            </div>
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
                        Ajouter un article
                    </button>
                </div>
            </div>
        </form>
        <table class="border-collapse w-full">
            <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Titre
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Description
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Status
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Titre</span>
                        {{$article->title}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Description</span>
                        {{Str::limit($article->content,500,' ...')}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                        <a href="/dashboard/articles/{{$article->id}}">Edit</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a href="/dashboard/articles/{{$article->id}}" class="text-violet-400 hover:text-violet-600 ">Edit</a>
                        <form action="{{route('dashboard_article.destroy',$article)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="divide-solid divide-y divide-violet-800">

        </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>
