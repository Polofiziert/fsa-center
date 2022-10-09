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
                        <div class="grid grid-cols-4 gap-2">
                            <input type="text" placeholder=" {{ __("Search")}}" name="search_periods" id="search_periods"  value="{{ old('search_periods') }}" @error('search_periods') autofocus @enderror class="col-span-3 w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('search_periods') border-red-500 @enderror" >
                            <button onclick="document.getElementById('createPeriod').style.display = 'block';" class="col-span-1 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{__("Create Period")}}
                            </button>
                        </div>

                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div id="createPeriod" style="display:none">
                                <form method="post" action="{{ route('storePeriod', [$project->id, $camp->id]) }}">
                                    @csrf
                                    <div class="bg-zinc-100 px-4 py-5 sm:grid sm:grid-cols-7 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            <input type="text" placeholder=" {{ __("Title")}}" name="title" id="title"  value="{{ old('title') }}" @error('title') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('title') border-red-500 @enderror" >
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                            <input type="date" placeholder=" {{ __("Start Date")}}" name="start" id="start"  value="{{ old('start') }}" @error('start') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('start') border-red-500 @enderror" >
                                            <input type="date" placeholder=" {{ __("End Date")}}" name="end" id="end"  value="{{ old('end') }}" @error('end') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('end') border-red-500 @enderror" >
                                        </dd>
                                        <dd class="mt-1  text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                            <input type="text" placeholder=" {{ __("Minimal Age")}}" name="age_start" id="age_start"  value="{{ old('age_start') }}" @error('age_start') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('age_start') border-red-500 @enderror" >
                                            <input type="text" placeholder=" {{ __("Maximum Age")}}" name="age_end" id="age_end"  value="{{ old('age_end') }}" @error('age_end') autofocus @enderror class="w-full border-inherit rounded-md border-2 focus:border-indigo-500 @error('age_end') border-red-500 @enderror" >
                                        </dd>
                                        <button type="submit" class="col-span-1 inline-end justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            {{__("Create Period")}}
                                        </button>
                                        <div onclick="document.getElementById('createPeriod').style.display = 'none';" class="justify-center text-center cursor-pointer col-span-1 inline-end rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            {{__("Cancel")}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @foreach ($periods as $period)
                            <div class="@if($loop->odd) bg-white @else bg-zinc-100 @endif px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">{{$period->title}} {{$loop->even}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-1 sm:mt-0">From:{{ $period->start }} To:{{ $period->end }}</dd>
                                <dd class="mt-1  text-sm text-gray-900 sm:col-span-1 sm:mt-0">From:{{ $period->age_start }} To:{{ $period->age_end }}</dd>
                                <dd class="mt-1  text-sm text-gray-900 sm:col-span-1 sm:mt-0 justify-self-end">
                                    <svg onclick="document.getElementById('edit_period_showMore_div{{$loop->index}}').style.display = 'block'; document.getElementById('edit_period_showMore_icon{{$loop->index}}').style.display = 'none'; document.getElementById('edit_period_showLess_icon{{$loop->index}}').style.display = 'block';" id="edit_period_showMore_icon{{$loop->index}}" style="display:block" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="m12 15.375-6-6 1.4-1.4 4.6 4.6 4.6-4.6 1.4 1.4Z"/></svg>
                                    <svg onclick="document.getElementById('edit_period_showMore_div{{$loop->index}}').style.display = 'none'; document.getElementById('edit_period_showMore_icon{{$loop->index}}').style.display = 'block'; document.getElementById('edit_period_showLess_icon{{$loop->index}}').style.display = 'none';" id="edit_period_showLess_icon{{$loop->index}}" style="display:none" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="m7.4 15.375-1.4-1.4 6-6 6 6-1.4 1.4-4.6-4.6Z"/></svg>
                                </dd>
                                <dd id="edit_period_showMore_div{{$loop->index}}" style="display: none" class="mt-1  text-sm text-gray-900 sm:col-span-4 sm:mt-0">
                                    <h3>{{__("Workshops")}}:</h3>
                                    <div class="grid grid-cols-2 gap-4 auto-rows-max">
                                        hello 
                                    </div>
                                </dd>
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
