<div class="container mx-auto mt-2">
    <x-flash />
    <div class="flex content-center p-2 m-2">
        <x-jet-button wire:click='showCreatePostModal' class="bg-blue-500">Create Post</x-jet-button>
    </div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Id</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Image</th>
                            <th scope="col" class="relative px-6 py-3">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr></tr>
                        @foreach ($posts as $post )
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($post->active )
                                active
                                @else
                                Not active
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/photos/'. $post->img1 ) }}" />
                            </td>
                            <td class="px-6 py-4 text-sm text-right">
                                <x-jet-button wire:click="showEditPostModal({{ $post->id }})" class="bg-green-500">Edit
                                </x-jet-button>
                                <x-jet-button wire:click="deletePost({{ $post->id}})" class="bg-red-800">Delete
                                </x-jet-button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="inline-block p-1 m-1 place-items-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- showModalForm --}}
    <x-jet-dialog-modal wire:model="showModalForm">
        <x-slot name="title">Create Post</x-slot>
        <x-slot name="content">
            <div class="w-auto mt-8 space-y-8 divide-y divide-gray-200">
                <form enctype="multipart/form-data">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
                        <div class="mt-1">
                            <input type="text" id="title" wire:model.lazy="title" name="title"
                                class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                        </div>
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-12">
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img1" class="block text-sm font-medium text-gray-700"> Image1 </label>
                                <div class="mt-1">
                                    <input type="file" id="img1" wire:model="img1" name="img1"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img1') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img1)
                                    Photo Preview:
                                    <img src="{{ $img1->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt1" class="block text-sm font-medium text-gray-700"> alt1 </label>
                              <div class="mt-1.5">
                                <input type="text" id="alt1" wire:model.lazy="alt1" name="alt1"
                                    class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                              </div>
                           </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img2" class="block text-sm font-medium text-gray-700"> Image2 </label>
                                <div class="mt-1">
                                    <input type="file" id="img2" wire:model="img2" name="img2"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img2') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img2)
                                    Photo Preview:
                                    <img src="{{ $img2->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt2" class="block text-sm font-medium text-gray-700"> alt2 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt2" wire:model.lazy="alt2" name="alt2"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img3" class="block text-sm font-medium text-gray-700"> Image3 </label>
                                <div class="mt-1">
                                    <input type="file" id="img3" wire:model="img3" name="img3"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img3') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img3)
                                    Photo Preview:
                                    <img src="{{ $img3->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt3" class="block text-sm font-medium text-gray-700"> alt3 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt3" wire:model.lazy="alt3" name="alt3"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img4" class="block text-sm font-medium text-gray-700"> Image4 </label>
                                <div class="mt-1">
                                    <input type="file" id="img4" wire:model="img4" name="img4"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img4') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img4)
                                    Photo Preview:
                                    <img src="{{ $img4->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt4" class="block text-sm font-medium text-gray-700"> alt4 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt4" wire:model.lazy="alt4" name="alt4"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img5" class="block text-sm font-medium text-gray-700"> Image5 </label>
                                <div class="mt-1">
                                    <input type="file" id="img5" wire:model="img5" name="img5"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img5') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img5)
                                    Photo Preview:
                                    <img src="{{ $img5->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt5" class="block text-sm font-medium text-gray-700"> alt5 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt5" wire:model.lazy="alt5" name="alt5"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img6" class="block text-sm font-medium text-gray-700"> Image6 </label>
                                <div class="mt-1">
                                    <input type="file" id="img6" wire:model="img6" name="img6"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img6') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img6)
                                    Photo Preview:
                                    <img src="{{ $img6->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt6" class="block text-sm font-medium text-gray-700"> alt6 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt6" wire:model.lazy="alt6" name="alt6"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img7" class="block text-sm font-medium text-gray-700"> Image7 </label>
                                <div class="mt-1">
                                    <input type="file" id="img7" wire:model="img7" name="img7"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img7') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img7)
                                    Photo Preview:
                                    <img src="{{ $img7->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt7" class="block text-sm font-medium text-gray-700"> alt7 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt7" wire:model.lazy="alt7" name="alt7"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img8" class="block text-sm font-medium text-gray-700"> Image8 </label>
                                <div class="mt-1">
                                    <input type="file" id="img8" wire:model="img8" name="img8"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img8') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img8)
                                    Photo Preview:
                                    <img src="{{ $img8->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt8" class="block text-sm font-medium text-gray-700"> alt8 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt8" wire:model.lazy="alt8" name="alt8"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img9" class="block text-sm font-medium text-gray-700"> Image9 </label>
                                <div class="mt-1">
                                    <input type="file" id="img9" wire:model="img9" name="img9"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img9') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img9)
                                    Photo Preview:
                                    <img src="{{ $img9->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt9" class="block text-sm font-medium text-gray-700"> alt9 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt9" wire:model.lazy="alt9" name="alt9"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div> 
                        <div class="flex flex-row">
                            <div class="basis-1/2 md:basis-1/2 mx-1">
                                <label for="img10" class="block text-sm font-medium text-gray-700"> Image10 </label>
                                <div class="mt-1">
                                    <input type="file" id="img10" wire:model="img10" name="img10"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                                @error('img10') <span class="error">{{ $message }}</span> @enderror
                                <div class="w-full p-2 m-2">
                                    @if ($newImage)
                                    Post Photo:
                                    <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                    @endif
                                    @if ($img10)
                                    Photo Preview:
                                    <img src="{{ $img10->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="basis-1/2 md:basis-1/2">
                                <label for="alt10" class="block text-sm font-medium text-gray-700"> alt10 </label>
                                <div class="mt-1.5">
                                    <input type="text" id="alt10" wire:model.lazy="alt10" name="alt10"
                                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="pt-5 sm:col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                        <div class="mt-1">
                            <textarea id="body" rows="3" wire:model.lazy="body"
                                class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-300 border-gray-400 rounded-md shadow-sm appearance-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        @error('body') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
        </x-slot>
        <x-slot name="footer">
            @if($postId)
            <x-jet-button wire:click="updatePost">Update</x-jet-button>
            @else
            <x-jet-button wire:click="storePost">Store</x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>


</div>