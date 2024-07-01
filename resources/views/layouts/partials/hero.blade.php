<!-- Hero -->
<div class="relative overflow-hidden">
    <div class="max-w-[85rem]  mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
        <div class="text-center">
            <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                <!-- Form -->
                <form>
                    <div
                        class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-gray-900/20">
                        <div class="flex-[1_0_0%] ">
                            <label for="hs-search-article-1"
                                class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                    class="sr-only">Search link</span></label>
                            <input type="email" name="hs-search-article-1" id="hs-search-article-1"
                                class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Search link">
                        </div>
                        <div class="flex-[0_0_auto] ">
                            <a class="size-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- End Form -->


            </div>

            <div class="mt-10 sm:mt-20">
                @foreach ($channels as $channel)
                    <a href="{{ route('channel.index', $channel->slug) }}"
                        class="{{ request()->is('channel/' . $channel->slug) ? 'bg-blue-600 text-white' : 'bg-white' }}   m-1 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200  text-gray-800 shadow-sm hover:bg-blue-600 hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">

                        {{ $channel->title }}
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!-- End Hero -->
