<x-app-layout :project=$project > {{-- Pass project down to app layout just so it can pass it futher down to sidebar layout --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }} -> {{__('General Settings')}}
        </h2>
    </x-slot>

  <x-modal :type="'warning'" :title="'Delete Project'" :description="'Are you shure you want to delete this Project?'">
      <form method="POST" action="{{ route('deleteProject', $project) }}">
        @csrf
        <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">{{__('Delete')}}</button>
    </form>
    <button type="button" onclick="document.getElementById('modal').style.display = 'none';" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">{{__('Cancel')}}</button>
    </x-modal>


  
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
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <form method="POST" action="{{ route('updateProject', $project) }}" class="grid grid-cols-3 gap-4 ">
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
                                        {{__("Update")}}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-span-1">
                            Test
                        </div>
                    </div>
                        <br>
                        <button type="button" onclick="document.getElementById('modal').style.display = 'block';" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                            {{__("Delete")}}
                        </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
