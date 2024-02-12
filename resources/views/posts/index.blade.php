<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('posts.store')}}">
                        @csrf
                        <textarea name="message" id="" cols="30" rows="3" 
                                  class="block w-full rounded-md border-gray-300 bg-white shadow-sm dark:bg-gray-800 dar:text-white  dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                                  placeholder="¿Qué tienes en mente?"
                                  >{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="my-2"></x-input-error>

                        <x-primary-button class="my-2">Enviar</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-3 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach($messages as $msg)
                <div class="p-6 flex space-x-2">
                    <svg class="h-6 w-6 text-gray-600 dark-text-gray-400 -scale-x-100" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">                            
                            <div>
                                <span class="text-gray-800 dark:text-gray-200">{{$msg->user->name}}</span>
                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $msg->created_at->diffForHumans() }}</small>
                                @if($msg->updated_at->eq($msg->created_at))                                    
                                <small class="text-sm text-gray-600 dark:text-gray-400"> &middot; {{ 'Editado' }}</small>
                                @endif    
                            </div>                                
                        </div>
                        <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{$msg->message}}</p>
                    </div>
                    @can ('update',$msg)
                    <a href="{{route('posts.edit',$msg)}}" class="ml-2 text-sm text-green-600 dark:text-green-400" >Editar</a>
                    <form method="POST" action="{{ route('posts.destroy',$msg)}} ">
                        @csrf @method('delete')
                        <a href="{{route('posts.destroy',$msg)}}" class="ml-2 text-sm text-red-600 dark:text-red-400" onclick="event.preventDefault(); this.closest('form').submit()">Eliminar</a>
                    </form>
                    @endcan
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>