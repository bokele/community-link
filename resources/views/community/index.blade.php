<x-app-layout>
    <div class="flex md:flex-row flex-col">
        <div class="basis-8/12 ">
            <section class="pt-10 m-4">



                <div class="mt-6 space-y-2">
                    @foreach ($communityLinks as $link)
                        <x-community-link :link='$link' />
                    @endforeach

                </div>


            </section>
            <div class=" m-4">
                {{ $communityLinks->links() }}
            </div>

        </div>
        <div class="basis-4/12 pt-10 mt-7">
            @livewire('community.create')
        </div>

    </div>





</x-app-layout>
