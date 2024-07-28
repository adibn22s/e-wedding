<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course Videos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($catalogueImage->catalogue->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $catalogueImage->catalogue->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $catalogueImage->catalogue->category->name }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Teacher</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $catalogueImage->catalogue->vendor->user->name }}</h3>
                    </div>
                </div>

                <hr class="my-5">
                
                <form method="POST" action="{{ route('admin.catalogue_images.update', $catalogueImage) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $catalogueImage->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_image" :value="__('path image')" />
                        <img src="{{ Storage::url($catalogueImage->path_image) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="path_image" class="block mt-1 w-full" type="file" name="path_image" autofocus autocomplete="path_image" />
                        <x-input-error :messages="$errors->get('path_image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Video
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
