{{--{{dd($_SERVER)}}--}}
<?php

use Zerotoprod\AppLog\Http\Controllers\LogController;
use Zerotoprod\AppLog\Models\AppLog;

/** @see LogController */
/* @var AppLog $log */
$from = LogController::from;
$to = LogController::to;
?>
<x-applog::main>
    <div>
        <form action="{{route('logs')}}" class="flex px-4 mt-8">
            @csrf
            <div class="flex flex-col gap-4 w-full">
                <div class="mx-4 flex gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
                        <div class="flex rounded-md shadow-sm">
                            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 512 512">
                                        <path
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                    </svg>
                                </div>
                                <input value="{{request('search')}}" type="search" name="search" id="search"
                                       class="block w-full rounded-md border-0 py-2 pr-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       placeholder="Search">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="{{$from}}" class="block text-sm font-medium leading-6 text-gray-900">From</label>
                        <div class="flex rounded-md shadow-sm">
                            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                                <input value="{{request($from)}}" type="datetime-local" name="{{$from}}" id="{{$from}}"
                                       class="block w-full rounded-md border-0 p-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="{{$to}}" class="block text-sm font-medium leading-6 text-gray-900">To</label>
                        <div class="flex rounded-md shadow-sm">
                            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                                <input value="{{request($to)}}" type="datetime-local" name="{{$to}}" id="{{$to}}"
                                       class="block w-full rounded-md border-0 p-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div x-data="{
                            options: [{{implode(', ', $logs->unique(AppLog::level)->sortBy(AppLog::level)->pluck(AppLog::level)->map(function ($level) {return request($level->value) ? "'$level->value'": null;})->toArray())}}],
                            open: false,
                            params: [],
                            init() {
                                let urlParams = new URLSearchParams(window.location.search);
                                this.params.forEach(param => {
                                    if (urlParams.has(param) && urlParams.get(param) !== '') {
                                        this.options.push(param);
                                    }
                                });
                            },
                        }"
                         x-init="init()"
                         class="w-full relative">
                    <div @click="open = !open" class="p-3 rounded-lg flex gap-2 w-full border border-neutral-300 cursor-pointer truncate h-12 bg-white" x-text="options.length + ' items selected'">
                        </div>
                        <div class="p-3 rounded-lg flex gap-3 w-full shadow-lg x-50 absolute flex-col bg-white mt-3" x-show="open" x-trap="open" @click.outside="open = false" @keydown.escape.window="open = false" x-transition:enter=" ease-[cubic-bezier(.3,2.3,.6,1)] duration-200" x-transition:enter-start="!opacity-0 !mt-0" x-transition:enter-end="!opacity-1 !mt-3" x-transition:leave=" ease-out duration-200" x-transition:leave-start="!opacity-1 !mt-3" x-transition:leave-end="!opacity-0 !mt-0">
                            @foreach($logs->unique(AppLog::level)->sortBy(AppLog::level)->pluck(AppLog::level) as $level)
                                <div class="flex items-center">
                                    <input x-model="options" id="{{$level->value}}" name="{{$level->value}}" {{request($level->value) ? 'checked' : ''}} type="checkbox" value="{{$level->value}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="{{$level->value}}" class="ml-2 text-sm font-medium text-gray-900 flex-grow">{{$level->value}} {{$level->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-6">
                        <button
                            class="rounded-md bg-indigo-600 p-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Search
                        </button>
                    </div>
                </div>
                <div class="sm:px-6 lg:px-8">
                    <div class="bg-gray-900">
                        <div class="mx-auto max-w-7xl">
                            <div class="bg-gray-900 py-10">
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-base font-semibold leading-6 text-white">Logs</h1>
                                        </div>
                                    </div>
                                    <div class="mt-8 flow-root">
                                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                <table class="min-w-full divide-y divide-gray-700">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                            Level
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                                            Time
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                                            Message
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-800">
                                                    @foreach($logs as $log)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $log->level }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300"
                                                                title="{{$log->created_at}}">{{ $log->created_at->diffForHumans() }}</td>
                                                            <td class="px-3 py-4 text-sm text-gray-300 font-mono">
                                                                <a class=" px-3 py-2 w-full"
                                                                   href="{{route('logs.show', ['id' => $log->id], false)}}">{{ $log->message }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-applog::main>
