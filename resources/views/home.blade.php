<x-layout>
    <x-slot name="content">
        <div
            class="relative flex flex-col items-top justify-center items-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- <div class=" bg-gray-100"><a href="/projects">View All Projects &RightArrow;</a></div> --}}
            {{-- <div class=" bg-gray-100"><a href="/projects">&LeftArrow; Back to Projects</a></div> --}}
            @foreach ($projects as $project)
                @if ($project->id == 1)
                    <div
                        class="relative flex flex-col items-top justify-center items-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

                        <x-projects.project-card :project="$project" :showBody="true" :showExcerpt="false" :showImage="true"
                            :showThumb="false" />
                    </div>
                @endif
            @endforEach
            <div class="max-w-2xl md:grid md:grid-cols-3 md:gap-2">
                @foreach ($projects as $project)
                    @if ($project->id == 2 || $project->id == 3 || $project->id == 5)
                        <div class="bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            <x-projects.project-card :project="$project" :showBody="false" :showExcerpt="true"
                                :showImage="false" :showThumb="true" :homeCard="true" />
                        </div>
                    @endif
                @endforEach
                <div class=" bg-gray-100 flex justify-end mr-10 col-start-3"><a href="/projects">View All Projects
                        &RightArrow;</a>
                </div>
            </div>

        </div>

    </x-slot>
</x-layout>
