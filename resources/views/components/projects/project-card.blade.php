@props(['project', 'showExcerpt' => true, 'showBody' => false, 'showImage' => false, 'showThumb' => true, 'homeCard' => false])

@if (!$homeCard)
    <div class="p-6  bg-white overflow-hidden shadow rounded-lg max-w-2xl">
    @else
        <div class="p-6  bg-white overflow-hidden shadow rounded-lg max-w-lg flex flex-col space-y-1 h-full w-full">
@endif
<div class="flex justify-center">
    @if ($showImage)
        @if ($project->image)
            <img src="{{ url('storage/' . $project->image) }}" class="w-96 h-96 rounded-lg mb-5" />
        @else
            <img src="{{ url('storage/images/sample-image.jpg') }}" class="w-96 h-96 rounded-lg mb-5" />
        @endif
    @endif
</div>
@if (!$homeCard)
    <div class="text-xl font-bold">
        <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
    </div>
@else
    <div class="flex flex-col justify-top items-center">
        @if ($project->thumb)
            <img src="{{ url('storage/' . $project->thumb) }}" class="w-20 h-20 rounded-lg mb-5" />
        @else
            <img src="{{ url('storage/images/sample-thumb.jpg') }}" class="w-20 h-20 rounded-lg mb-5" />
        @endif
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        </div>
        @if ($project->category)
            <span class="text-xs">Category: <a
                    href="/projects/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
        @else
            <span class="text-xs text-white">Categories</span>
        @endif

        @if (count($project->tags))
            <span class="text-xs">Tags:
                @foreach ($project->tags as $tag)
                    <a href="/projects/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </span>
        @else
            <span class="text-xs text-white">Tags</span>
        @endif
    </div>
@endIf
@if (!$homeCard)
    <div class="flex items-center gap-4">
    @else
        <div>
@endif
@if ($showThumb && !$homeCard)
    @if ($project->thumb)
        <img src="{{ url('storage/' . $project->thumb) }}" class="w-12 h-12 rounded-lg mb-5" />
    @else
        <img src="{{ url('storage/images/sample-thumb.jpg') }}" class="w-12 h-12 rounded-lg mb-5" />
    @endif

@endif
@if ($showExcerpt)
    @if (!$homeCard)
        <div class="h-full">{!! $project->excerpt !!}</div>
        {{-- @else
        <div class="">
            <div class="">{!! $project->excerpt !!}</div>
        </div> --}}
    @endif
@endif

@if ($showBody)
    <div class="space-y-5">{!! $project->body !!}</div>
@endif
</div>
@if (!$homeCard)
    <footer>
        @if ($project->category)
            <span class="text-xs">Category: <a
                    href="/projects/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
        @endif

        @if (count($project->tags))
            <span class="text-xs">Tags:
                @foreach ($project->tags as $tag)
                    <a href="/projects/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </span>
        @endif
    </footer>
@endIf

@if ($homeCard)
    <div>
        @if ($showExcerpt)
            <div class="flex flex-col items-end">
                <div class="">{!! $project->excerpt !!}</div>
            </div>
        @endif
    </div>
@endIf

</div>
