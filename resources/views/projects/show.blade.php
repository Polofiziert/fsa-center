<x-app-layout :project=$project :camps=$camps> {{-- Pass project and camps down to app layout just so it can pass it futher down to sidebar layout --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
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
                        <div>
                            <h1>
                                <a href="#">{{ $project->title }}</a>
                            </h1>
                            <p>{{ $project->description}}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
