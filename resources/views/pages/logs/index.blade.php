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
            <div class="shadow p-4 ring-1 ring-black ring-opacity-5 sm:rounded-lg bg-gray-50">
                <div class="flex flex-col gap-4">
                    <fieldset>
                        <legend class="text-sm font-medium leading-6 text-gray-900">Level</legend>
                        <div class="space-y-2">
                            @foreach($logs->unique(AppLog::level)->sortBy(AppLog::level)->pluck(AppLog::level) as $level)
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input {{request($level->value) ? 'checked' : ''}} value="{{$level->value}}" id="{{$level->value}}"
                                               aria-describedby="{{$level->value}}" name="{{$level->value}}" type="checkbox"
                                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="{{$level->value}}" class="font-medium text-gray-900">{{$level->value}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>
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
                    <div class="mt-6">
                        <button
                            class="rounded-md bg-indigo-600 p-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Search
                        </button>
                    </div>
                </div>
                <div class="sm:px-6 lg:px-8">
                    <div class="flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle px-4">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="w-8 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Level
                                            </th>
                                            <th scope="col"
                                                class="w-4 px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Time
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Message
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach($logs as $log)
                                            <tr class="even:bg-gray-50">
                                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                                    {{ $log->level }}
                                                </td>
                                                <td class="whitespace-nowrap text-sm text-gray-900"
                                                    title="{{$log->created_at}}">{{ $log->created_at->diffForHumans() }}</td>
                                                <td class="px-3 py-2 text-xs text-gray-500 font-mono"><a
                                                        class=" px-3 py-2 w-full"
                                                        href="{{route('logs.show', ['id' => $log->id], false)}}">{{ $log->message }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="bg-gray-50 py-4">
                                        {{ $logs->links() }}
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
