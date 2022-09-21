<x-app-layout :project=$project>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Camps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Current Users Projects -->
                    <h3>{{__("This Project's Camps")}}:</h3>
                    <div class="grid grid-cols-2 gap-4 auto-rows-max">

                        @foreach ($camps as $camp)
                            <div class="border-2 border-inherit rounded-md pl-3 pr-3 pt-1 pb-1 hover:border-indigo-500">
                                <a class="font-bold" href="#">{{ $camp->title}}</a>
                                <p>{{ Str::limit($camp->description, 60)}}</p>
                            </div>
                        @endforeach


                        
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
