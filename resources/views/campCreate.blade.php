<x-app-layout :project=$project>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Camp') }}
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

                    <form method="POST" action="{{ route('storeCamp', $project->id) }}" class="">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
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
                            <div class="col-span-1 col-start-1">
                                <label  class="font-bold"> {{ __("Type")}}</label >
                                <input type="text" placeholder="{{ __("Type")}}" name="type" id="type" value="{{ old('type') }}" @error('type') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('type') border-red-500 @enderror" >
                            </div>
                            <div class="col-span-1 col-start-1">
                                <label  class="font-bold"> {{ __("Charge")}}</label >
                                <input type="text" placeholder="{{ __("Charge")}}" name="charge" id="charge" value="{{ old('charge') }}" @error('charge') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('charge') border-red-500 @enderror" >
                            </div>
                            <div class="col-span-1 col-start-1">
                                <label  class="font-bold"> {{ __("Reduced Charge")}}</label >
                                <input type="text" placeholder="{{ __("Reduced Charge")}}" name="charge_reduced" id="charge_reduced" value="{{ old('charge_reduced') }}" @error('charge_reduced') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('charge_reduced') border-red-500 @enderror" >
                            </div>
                            <div class="col-span-1 col-start-1">
                                <label  class="font-bold"> {{ __("Starting Age")}}</label >
                                <input type="text" placeholder="{{ __("Starting Age")}}" name="age_start" id="age_start" value="{{ old('age_start') }}" @error('age_start') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('age_start') border-red-500 @enderror" >
                            </div>
                            <div class="col-span-1 col-start-1">
                                <label  class="font-bold"> {{ __("End Age")}}</label >
                                <input type="text" placeholder="{{ __("End Age")}}" name="age_end" id="age_end" value="{{ old('age_end') }}" @error('age_end') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('age_end') border-red-500 @enderror" >
                            </div>
                            
                            <div class="col-span-1">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    {{__("Create")}}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
