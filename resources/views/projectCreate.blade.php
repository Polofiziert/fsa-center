<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('storeProject') }}" class="grid grid-cols-3 gap-4 ">
                        @csrf
                        <div class="col-span-1">
                            <label  class="font-bold"> {{ __("Name")}}</label >
                            <input type="text" placeholder=" {{ __("Title")}}" name="title" id="title"  value="{{ old('title') }}" @error('title') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('title') border-red-500 @enderror" >
                        </div>
                        <div class="col-span-2 col-start-1">
                            <label  class="font-bold"> {{ __("Descrition")}}</label >
                            <textarea type="text" placeholder=" {{ __("Descrition")}}" name="description" id="description" @error('descitpion') autofocus @enderror  rows=3 class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('description') border-red-500 @enderror" >{{ old('description') }}</textarea>
                        </div>
                        <div class="col-span-1 col-start-1">
                            <label  class="font-bold"> {{ __("Image")}}</label >
                            <input type="text" placeholder="{{ __("Image")}}" name="image" id="image" value="{{ old('image') }}" @error('image') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('image') border-red-500 @enderror" >
                        </div>
                        <div class="col-span-1">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{__("Create")}}
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
