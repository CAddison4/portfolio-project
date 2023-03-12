<x-layout>
    <x-slot name="content">
        @if (isset($category))
            <div class=" bg-gray-100">
                <a href="/projects">&LeftArrow; Back to Projects</a>
            </div>
            <div class="flex justify-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $category->name }}</h1>
            </div>
        @endif
        <div class="items-center flex justify-center">
            <div class="flex flex-col justify-around">
                <div
                    class="relative flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    <div class="mt-6">

                        @if (count($projects) == 1)
                            <section class="grid grid-cols-1">
                                @foreach ($projects as $project)
                                    <x-projects.project-card :project="$project" />
                                @endforeach
                            </section>
                        @else
                            <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                @foreach ($projects as $project)
                                    <x-projects.project-card :project="$project" />
                                @endforeach
                            </section>
                        @endif
                    </div>
                </div>
                @if (count($projects))
                    <div class="text-xs w-full text-right">{{ count($projects) }} projects to peep.
                    </div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layout>
