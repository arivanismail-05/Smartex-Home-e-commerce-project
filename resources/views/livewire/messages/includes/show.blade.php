<x-admin-component.container class="gap-4 rounded=b-lg h-max">

           <div>
            <x-admin-component.search wire:model.live.debounce.500ms="search" label="Search" />
           </div>
                <div class="grid grid-cols-3 gap-3"  wire:poll>
                    @foreach ($messages as $message )
                        <x-admin-component.container class="rounded-lg ">
                            <h3 class="text-sm font-semibold text-gray-400">ID : {{ $message->id }}</h3>
                        <div class="space-y-2 ">
                            <h4 class="font-medium text-white text-md">Content : </h4>
                            <textarea class="font-semibold w-full text-[#F0F0F0] bg-[#424246] p-2 w-content field-sizing-content  rounded-md resize-none border-none focus:outline-none read-only" readonly disabled>{{ $message->content }}</textarea>
                        </div>
                        <div class="text-sm text-gray-300">Sending by : <span class="font-semibold text-[#D97850]"> {{ $message->user->name }}</span></div>

                        <div>
                            <h4 class="font-medium text-white text-md">Sent at : </h4>
                            <p class="font-semibold text-gray-300">{{ $message->created_at->format('d M Y, h:i A') }}</p>
                        </div>

                         <div class="flex items-center justify-between mt-4">
                            @if($message->is_read)
                                <span class="px-3 py-2 text-sm font-medium text-green-400 border border-green-600 rounded bg-green-600/20">Read</span>
                            @else
                                <span class="px-3 py-2 text-sm font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Not Read</span>
                            @endif

                            <label class="inline-flex items-center cursor-pointer" title="Toggle Is Read">
                                @if ($message->is_read)
                                    <input wire:click="toggleIsRead({{ $message->id }})" type="checkbox" class="sr-only peer" checked>
                                @else
                                    <input wire:click="toggleIsRead({{ $message->id }})" type="checkbox" class="sr-only peer">
                                @endif
                                <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button wire:click="delete({{ $message->id }})" type="button" class="items-center py-3 px-8 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                                Delete
                            </button>
                                
                        </div>
                        </x-admin-component.container>
                    @endforeach
                    

                </div>
</x-admin-component.container>