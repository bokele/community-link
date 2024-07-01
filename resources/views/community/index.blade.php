<x-app-layout>
    <div class="flex md:flex-row flex-col">
        <div class="basis-8/12 ">
            <section class="pt-10 m-4">

                <a href="{{ request()->url() }}" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Most Recent

                </a>
                <a href="?popular" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                    Most Popular

                </a>

                <div class="mt-6 space-y-2">
                    @foreach ($communityLinks as $link)
                        <x-community-link :link='$link' />
                    @endforeach

                </div>


            </section>
            <div class=" m-4">
                {{ $communityLinks->appends(request()->query())->links() }}
            </div>

        </div>
        <div class="basis-4/12 pt-10 mt-7">
            @livewire('community.create')
        </div>

    </div>





</x-app-layout>
