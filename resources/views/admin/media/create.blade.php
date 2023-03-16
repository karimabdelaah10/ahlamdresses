<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Create New Media
                        </h2>
                        <p class="mt-1 text-sm text-gray-600"></p>
                    </header>
                    <form id="create-media" method="post" action="{{ route('post.createMedia') }}" enctype="multipart/form-data"
                          class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <label class='block font-medium text-sm text-gray-700'>
                                Title ( max 20 character)
                                <input
                                    class='mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
                                    name="title"
                                    type="text" placeholder="Media Title"
                                    max="20"
                                    required
                                    autofocus>
                                <x-input-error class="mt-2" :messages="$errors->get('Title')" />

                            </label>

                        </div>
                        <div>
                            <label class='block font-medium text-sm text-gray-700'>
                                TYPE
                                <select name="type" required
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach($types as $type)
                                        <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>
                            </label>

                        </div>
                        <div>
                            <label class='block font-medium text-sm text-gray-700'>
                                Media ( 440 * 440 )
                                <input
                                    required
                                    class='mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
                                    name="path"
                                    type="file"
                                    placeholder="Media"
                                    autofocus>
                                <x-input-error class="mt-2" :messages="$errors->get('path')" />

                            </label>

                        </div>
                        <div>
                            <label class='block font-medium text-sm text-gray-700'>
                                URL
                                <input
                                    class='mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
                                    name="url"
                                    type="text" placeholder="Media URL"
                                    autofocus>
                            </label>

                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
