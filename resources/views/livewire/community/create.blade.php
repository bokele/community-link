   <div class="p-4 m-4 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
       <form method="POST" wire:submit="save">
           @csrf

           <div class="m-2">
               <x-label for="channel_id" value="{{ __('Channel') }}" />
               <select id="channel_id" class="block mt-1 w-full" type="text" wire:model="form.channel_id" autofocus>
                   <option value="">Select the channel</option>
                   @foreach ($channels as $channel)
                       <option value="{{ $channel->id }}" @selected($channel->id == old('channel_id'))>{{ $channel->title }}
                       </option>
                   @endforeach
               </select>
               <x-input-error for='channel_id' />
           </div>
           <div class="m-2">
               <x-label for="title" value="{{ __('Title') }}" />
               <x-input id="title" class="block mt-1 w-full" type="text" wire:model="form.title"
                   :value="old('title')" autofocus autocomplete="title" />
               <x-input-error for='title' />
           </div>
           <div class="m-2">
               <x-label for="url" value="{{ __('Url') }}" />
               <x-input id="url" class="block mt-1 w-full" type="url" wire:model="form.url" :value="old('url')"
                   autofocus autocomplete="url" />
               <x-input-error for='url' />
           </div>
           <div class="flex items-center justify-end mt-4">


               <x-button class="ms-4">
                   {{ __('Contrube Link') }}
               </x-button>
           </div>
       </form>
   </div>
