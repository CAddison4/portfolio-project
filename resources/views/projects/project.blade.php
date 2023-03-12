<x-layout>
    <x-slot name="content">
        <div class=" bg-gray-100"><a href="/projects">&LeftArrow; Back to Projects</a></div>
        <div
            class="relative flex flex-col items-top justify-center items-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <x-projects.project-card :project="$project" :showBody="true" :showExcerpt="false" :showImage="true"
                :showThumb="false" />

        </div>
    </x-slot>
</x-layout>
