<x-app-layout :project=$project :camps=$camps> {{-- Pass project and camps down to app layout just so it can pass it futher down to sidebar layout --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>
  
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
