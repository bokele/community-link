@props(['link'])
{{--
<x-panel class="flex  ">
    <div class="flex flex-col justify-center ">
        @livewire('vote', ['link' => $link])

    </div>

    <div class="flex flex-row justify-between ">
        <div class="flex flex-col ml-4">

            <a href="{{ $link->url }}" target="_blank"
                class=" hover:text-blue-800 text-xl font-bold transition-colors duration-300 dark:hover:text-gray-300">
                {{ $link->title }}
            </a>

            <span class="mt-2"> </span>
            <span>
                Posted {{ $link->created_at->diffForHumans() }}
            </span>

        </div>

        <div class="flex justify-center">
            <a href="{{ route('channel.index', $link->channel->slug) }}"
                class="px-12 py-4 bg-{{ $link->channel->color }}-600">
                {{ $link->channel->title }}
            </a>
        </div>
    </div>



</x-panel> --}}



<x-panel class="flex gap-x-6">
    <div>
        @livewire('vote', ['link' => $link])
    </div>

    <div class="flex-1 flex flex-col">


        <a href="{{ $link->url }}" target="_blank"
            class=" hover:text-blue-800 text-xl font-bold transition-colors duration-300 dark:hover:text-gray-300">
            {{ $link->title }}
        </a>

        <p class="text-sm text-gray-600 mt-auto ark:text-gray-100">Contributed By {{ $link->user->name }}</p>
        <p class="text-sm text-gray-600 mt-auto ark:text-gray-100">Posted {{ $link->created_at->diffForHumans() }}</p>
    </div>
    <div>
        <a href="{{ route('channel.index', $link->channel->slug) }}"
            class="px-4 py-2 rounded-md text-white bg-{{ $link->channel->color }}-600">
            {{ $link->channel->title }}
        </a>
    </div>
</x-panel>
