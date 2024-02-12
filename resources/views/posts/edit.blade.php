<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('posts.update',$post)}}">
                        @csrf @method('put')
                        <textarea name="message" id="" cols="30" rows="3" 
                                  class="block w-full rounded-md border-gray-300 bg-white shadow-sm dark:bg-gray-800 dar:text-white  dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                                  placeholder="¿Qué tienes en mente?"
                                  >{{ old('message',$post->message) }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="my-2"></x-input-error>
                        <x-primary-button class="my-2">Actualizar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
