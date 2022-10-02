<x-app-layout :project=$project :camps=$camps>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Camp') }}: {{$camp->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Period Listing -->
                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{__("Camp's Periods")}}:</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{__("Search Periods")}}:</p>
                        <input type="text" placeholder=" {{ __("Search")}}" name="search_periods" id="search_periods"  value="{{ old('search_periods') }}" @error('search_periods') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('search_periods') border-red-500 @enderror" >


                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            @foreach ($periods as $period)
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">{{$period->title}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-1 sm:mt-0">From:{{ $period->start }} To:{{ $period->end }}</dd>
                                <dd class="mt-1  text-sm text-gray-900 sm:col-span-1 sm:mt-0">From:{{ $period->start }} To:{{ $period->end }}</dd>
                            </div>
                            @endforeach
                        </dl>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
