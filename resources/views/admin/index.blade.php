<x-layout>
    <x-slot name="content">
        <h1 class="text-4xl px-10 mb-5 uppercase text-center">Admin Dashboard</h1>
        <div class="container mx-auto p-6 pb-0 grid grid-cols-1 md:grid-cols-[3fr,1fr]">
            <h2 class="text-xl px-10 uppercase">Projects</h2>
        </div>
        <div class="container mx-auto p-6 grid grid-cols-1 gap-2 md:grid-cols-[3fr,1fr]">
            <section class="px-10">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <header class="text-right mb-2">
                        <a href="/admin/projects/create" class="">
                            <div class="bg-teal-200 rounded-lg text-center">
                                Create Project
                            </div>
                        </a>
                    </header>
                    <table class="w-full">
                        @foreach ($projects as $project)
                            <tr class="odd:bg-gray-100 flex w-full justify-between">
                                <td>
                                    <a href="/projects/{{ $project->slug }}">{!! $project->title !!}</a>
                                </td>
                                <td>
                                    <a href="/admin/projects/{{ $project->id }}/edit"
                                        class="hover:text-green-400">Edit</a> |
                                    <form method="POST" action="admin/projects/{{ $project->id }}/delete"
                                        class="inline hover:text-red-500">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>
            <section class=" px-10 h-full">
                <div
                    class="p-6 bg-white overflow-hidden shadow sm:rounded-lg max-w-2xl h-full flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center ">
                        <h2 class="text-6xl">{{ count($projects) }}</h2>
                        <p class="text-gray-600">projects</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="container mx-auto p-6 pb-0 grid grid-cols-1 md:grid-cols-[3fr,1fr]">
            <h2 class="text-xl px-10 uppercase">Users</h2>
        </div>
        <div class="container mx-auto p-6 grid grid-cols-1 gap-2 md:grid-cols-[3fr,1fr]">
            <section class="px-10">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <header class="text-right mb-2">
                        <a href="/admin/users/create" class="">
                            <div class="bg-teal-200 rounded-lg text-center">
                                Create User
                            </div>
                        </a>
                    </header>
                    <table class="w-full">
                        @foreach ($users as $user)
                            <tr class="odd:bg-gray-100 flex w-full justify-between">
                                <td>
                                    {!! $user->name !!}
                                </td>
                                <td>
                                    <a href="/admin/users/{{ $user->id }}/edit"
                                        class="hover:text-green-400">Edit</a> |
                                    <form method="POST" action="admin/users/{{ $user->id }}/delete"
                                        class="inline hover:text-red-500"> @csrf @method('delete') <button
                                            type="submit">Delete</button></form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>
            <section class="px-10 h-full">
                <div
                    class="p-6 bg-white overflow-hidden shadow sm:rounded-lg max-w-2xl h-full flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center ">
                        <h2 class="text-6xl">{{ count($users) }}</h2>
                        <p class="text-gray-600">users</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="container mx-auto p-6 pb-0 grid grid-cols-1 md:grid-cols-[3fr,1fr]">
            <h2 class="text-xl px-10 uppercase">Categories</h2>
        </div>
        <div class="container mx-auto p-6 grid grid-cols-1 gap-2 md:grid-cols-[3fr,1fr]">
            <section class="px-10">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <header class="text-right mb-2">
                        <a href="/admin/categories/create" class="">
                            <div class="bg-teal-200 rounded-lg text-center">
                                Create Category
                            </div>
                        </a>
                    </header>
                    <table class="w-full">
                        @foreach ($categories as $category)
                            <tr class="odd:bg-gray-100 flex w-full justify-between">
                                <td>
                                    <a href="/categories/{{ $category->slug }}">{!! $category->name !!}</a>
                                </td>
                                <td>
                                    <a href="/admin/categories/{{ $category->id }}/edit"
                                        class="hover:text-green-400">Edit</a> |
                                    <form method="POST" action="admin/categories/{{ $category->id }}/delete"
                                        class="inline hover:text-red-500"> @csrf @method('delete') <button
                                            type="submit">Delete</button></form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>
            <section class="px-10 h-full">
                <div
                    class="p-6 bg-white overflow-hidden shadow sm:rounded-lg max-w-2xl h-full flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center ">
                        <h2 class="text-6xl">{{ count($categories) }}</h2>
                        <p class="text-gray-600">categories</p>
                    </div>
                </div>
            </section>
        </div>

        {{--  --}}
        <div class="container mx-auto p-6 pb-0 grid grid-cols-1 md:grid-cols-[3fr,1fr]">
            <h2 class="text-xl px-10 uppercase">Tags</h2>
        </div>
        <div class="container mx-auto p-6 grid grid-cols-1 gap-2 md:grid-cols-[3fr,1fr]">
            <section class="px-10">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <header class="text-right mb-2">
                        <a href="/admin/tags/create" class="">
                            <div class="bg-teal-200 rounded-lg text-center">
                                Create Tag
                            </div>
                        </a>
                    </header>
                    <table class="w-full">
                        @foreach ($tags as $tag)
                            <tr class="odd:bg-gray-100 flex w-full justify-between">
                                <td>
                                    <a href="/projects/tags/{{ $tag->slug }}">{!! $tag->name !!}</a>
                                </td>
                                <td>
                                    <a href="/admin/tags/{{ $tag->id }}/edit"
                                        class="hover:text-green-400">Edit</a> |
                                    <form method="POST" action="admin/tags/{{ $tag->id }}/delete"
                                        class="inline hover:text-red-500"> @csrf @method('delete') <button
                                            type="submit">Delete</button></form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>
            <section class="px-10 h-full">
                <div
                    class="p-6 bg-white overflow-hidden shadow sm:rounded-lg max-w-2xl h-full flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center ">
                        <h2 class="text-6xl">{{ count($tags) }}</h2>
                        <p class="text-gray-600">tags</p>
                    </div>
                </div>
            </section>
        </div>

    </x-slot>
</x-layout>
