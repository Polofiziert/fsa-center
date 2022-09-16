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
                    <div class="grid grid-cols-3 gap-4 ">
                        <div class="col-span-1">
                            <label  class="font-bold"> {{ __("Name")}}</label >
                            <input type="text" placeholder=" {{ __("Name")}}" class="w-full border-inherit rounded-md border-2 focus:border-indigo-500" >
                        </div>
                        <div class="col-span-2 col-start-1">
                            <label  class="font-bold"> {{ __("Descrition")}}</label >
                            <textarea type="text" placeholder=" {{ __("Descrition")}}" rows=3 class="w-full border-inherit rounded-md border-2" ></textarea>
                        </div>
                        <div class="col-span-1 col-start-1">
                            <label  class="font-bold"> {{ __("Image")}}</label >
                            <input type="text" placeholder="{{ __("Image")}}" class="w-full border-inherit rounded-md border-2" >
                        </div>
                        <div class="col-span-1">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{__("Create")}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
