<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Catalogue') }}
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
                
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="websie_name" :value="__('Website Name')" />
                        <x-text-input id="websie_name" class="block mt-1 w-full" type="text" name="websie_name" :value="old('website_name', $setting->website_name)" required autofocus autocomplete="websie_name" />
                        <x-input-error :messages="$errors->get('websie_name')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="phone_number1" :value="__('Phone Number 1')" />
                        <x-text-input id="phone_number1" class="block mt-1 w-full" type="text" name="phone_number1" :value="old('phone_number1', $setting->phone_number1)" required autofocus autocomplete="phone_number1" />
                        <x-input-error :messages="$errors->get('phone_number1')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="phone_number2" :value="__('Phone Number 2')" />
                        <x-text-input id="phone_number2" class="block mt-1 w-full" type="text" name="phone_number2" :value="old('phone_number2', $setting->phone_number2)" required autofocus autocomplete="phone_number2" />
                        <x-input-error :messages="$errors->get('phone_number2')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="email1" :value="__('Email 1')" />
                        <x-text-input id="email1" class="block mt-1 w-full" type="text" name="email1" :value="old('email1', $setting->email1)" required autofocus autocomplete="email1" />
                        <x-input-error :messages="$errors->get('email1')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="email2" :value="__('Email 2')" />
                        <x-text-input id="email2" class="block mt-1 w-full" type="text" name="email2" :value="old('email2', $setting->email2)" required autofocus autocomplete="email2" />
                        <x-input-error :messages="$errors->get('email2')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $setting->address)" required autofocus autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="maps" :value="__('Maps')" />
                        <x-text-input id="maps" class="block mt-1 w-full" type="text" name="maps" :value="old('maps', $setting->maps)" required autofocus autocomplete="maps" />
                        <x-input-error :messages="$errors->get('maps')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo_path" :value="__('Logo Path')" />
                        <img src="{{ Storage::url($setting->logo_path) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="logo_path" class="block mt-1 w-full" type="file" name="logo_path" autofocus autocomplete="logo_path" />
                        <x-input-error :messages="$errors->get('logo_path')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="instagram_url" :value="__('Instagram URL')" />
                        <x-text-input id="instagram_url" class="block mt-1 w-full" type="text" name="instagram_url" :value="old('instagram_url', $setting->instagram_url)" required autofocus autocomplete="instagram_url" />
                        <x-input-error :messages="$errors->get('instagram_url')" class="mt-2" />
                    </div>

                    <div class ="mt-4">
                        <x-input-label for="youtube_url" :value="__('Youtube URL')" />
                        <x-text-input id="youtube_url" class="block mt-1 w-full" type="text" name="youtube_url" :value="old('youtube_url', $setting->youtube_url)" required autofocus autocomplete="youtube_url" />
                        <x-input-error :messages="$errors->get('youtube_url')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Settings
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
