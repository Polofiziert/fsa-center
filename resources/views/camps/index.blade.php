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
                                <div class="object-right">
                                    <p>Price Normal: {{ $camp->charge }}€ Price Reduced: {{ $camp->charge_reduced }}€</p>
                                    <p>From {{ $camp->age_start }} to {{ $camp->age_end }} Years</p>
                                </div>
                            </div>
                        @endforeach

                        <!-- New Project -->
                        <div class="border-2 border-inherit hover:border-indigo-500 rounded-md pl-2 pr-2 pt-1 pb-1 flex items-center">
                            <div class="justify-left ml-2 mr-3">
                                <a href="{{ route('createCamp', $project->id)  }}">
                                    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                </a>
                            </div>
                            <div class="justify-center">
                                <a class="font-bold" href="{{ route('createCamp', $project->id) }}">{{__("New Camp")}}</a>
                                <p>{{ __("Create a new Camp") }}</p>
                            </div>
                        </div> 
                        
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
